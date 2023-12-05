<?php
class Rooms extends CI_Controller {
    // FIELDS: `id`, `category`, `name`, `description`, `short`, `twelve`, `overnight`, `whole`, `hour`, `occupied`, `status`, `image`, `datecreate`
    public function __construct() {
        parent::__construct();
        
        // Set default time zone used by date functions
        date_default_timezone_set('Asia/Manila');

        // Set the default time zone used in the database
        $this->load->database();
        $this->db->query("SET time_zone='+08:00'");
        $this->db->close();

        $this->load->library(array('session', 'form_validation', 'pagination', 'upload', 'image_lib'));
        $this->load->helper('url');
    }

    public function index() {
        if($this->session->userdata('userid') == null) {
            redirect('Staff');
        }

        $this->load->model('Rooms_model', 'rooms');
        $search = '';
        if ($this->input->get('search') != null) {
            $search = $this->input->get('search');
        }
        
        // Set pagination
        $config['base_url'] = base_url('Rooms/index');
        $config['total_rows'] = $this->rooms->get_rooms_count($search);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = '<i class="bi bi-chevron-bar-left"></i>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="bi bi-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</a></li>';
        $config['next_link'] = '<i class="bi bi-chevron-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_link'] = '<i class="bi bi-chevron-bar-right"></i>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data = array(
            'title' => 'Baggak Resort Resarvation System - Rooms List',
            'rooms' => $this->rooms->get_rooms($config['per_page'], $page, $search),
            'links' => $this->pagination->create_links()
        );
        $this->load->view('include/header_staff', $data);
        $this->load->view('include/nav_staff');
        $this->load->view('staff/rooms', $data);
        $this->load->view('include/footer');
    }

    public function addroom()
    {
        if($this->session->userdata('userid') != null){
            $data = array(
                'title' => 'Baggak Resort Reservation System - Add Room'
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/add_rooms', $data);
            $this->load->view('include/footer');
        }else{
            redirect('Staff');
        }
    }

    public function insert_room()
    {
        if($this->session->userdata('userid') != null){
            $this->load->model('Rooms_model', 'rooms');

            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('name', 'Room Name', 'required|is_unique[rooms.name]');
            $this->form_validation->set_rules('description', 'Room Description', 'required');
            $this->form_validation->set_rules('short', 'Room Price for Short-time', 'required|numeric');
            $this->form_validation->set_rules('twelve', 'Room Price for Twelve Hours', 'required|numeric');
            $this->form_validation->set_rules('overnight', 'Room Price for Overnight', 'required|numeric');
            $this->form_validation->set_rules('whole', 'Room Price for Whole Day', 'required|numeric');
            $this->form_validation->set_rules('hour', 'Room Price for Per Hour', 'required|numeric');
            $this->form_validation->set_rules('status', 'Room Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('Rooms/addroom');
            } else {
                $filename = $this->upload_image();
                $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'category' => $this->input->post('category'),
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'short' => $this->input->post('short'),
                    'twelve' => $this->input->post('twelve'),
                    'overnight' => $this->input->post('overnight'),
                    'whole' => $this->input->post('whole'),
                    'hour' => $this->input->post('hour'),
                    'status' => $this->input->post('status'),
                    'image' => $filename
                );
                $this->rooms->add_room($data);
                $this->session->set_flashdata('success', 'New room has been added.');
                // Add log activity
                $log = array(
                    'staffid' => $this->session->userdata('userid'),
                    'activity' => 'Added a new room (' . $this->input->post('name') . ')',
                    'date' => date('Y-m-d H:i:s')
                );
                $this->load->model('AuditLog_model', 'logs');
                $this->logs->add_log($log);
                redirect('Rooms');
            }
        }else{
            redirect('Staff');
        }
    }

    public function viewroom(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Rooms_model', 'rooms');
            $data = array(
                'title' => 'Baggak Resort Reservation System - View Amenity',
                'room' => $this->rooms->get_room($this->uri->segment(3))
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/view_room', $data);
            $this->load->view('include/footer');
        }else{
            redirect('Staff');
        }
    }

    public function editroom(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Rooms_model', 'rooms');
            $data = array(
                'title' => 'Baggak Resort Reservation System - Edit Room',
                'room' => $this->rooms->get_room($this->uri->segment(3))
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/edit_rooms', $data);
            $this->load->view('include/footer');
        }else{
            redirect('Staff');
        }
    }

    public function update_room(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Rooms_model', 'rooms');

            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('name', 'Room Name', 'required');
            $this->form_validation->set_rules('description', 'Room Description', 'required');
            $this->form_validation->set_rules('short', 'Room Price for Short-time', 'required|numeric');
            $this->form_validation->set_rules('twelve', 'Room Price for Twelve Hours', 'required|numeric');
            $this->form_validation->set_rules('overnight', 'Room Price for Overnight', 'required|numeric');
            $this->form_validation->set_rules('whole', 'Room Price for Whole Day', 'required|numeric');
            $this->form_validation->set_rules('hour', 'Room Price for Per Hour', 'required|numeric');
            $this->form_validation->set_rules('status', 'Room Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $data = array(
                    'title' => 'Baggak Resort Reservation System - Edit Room',
                    'room' => $this->amenities->get_room($this->input->post('id'))
                );
                $this->load->view('include/header_staff', $data);
                $this->load->view('include/nav_staff');
                $this->load->view('staff/edit_rooms', $data);
                $this->load->view('include/footer');
            } else {
                $filename = $this->upload_image();
                $id = $this->input->post('id');
                if($this->input->post('oldimage') != null && $filename == null){
                    $filename = $this->input->post('oldimage');
                }
                if($filename != null){
                    // Delete old image
                    if($this->input->post('oldimage') != null){
                        unlink('./assets/images/rooms/' . $this->input->post('oldimage'));
                        unlink('./assets/images/rooms/thumbs/' . $this->input->post('oldimage'));
                    }
                }
                $data = array(
                    'category' => $this->input->post('category'),
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    'short' => $this->input->post('short'),
                    'twelve' => $this->input->post('twelve'),
                    'overnight' => $this->input->post('overnight'),
                    'whole' => $this->input->post('whole'),
                    'hour' => $this->input->post('hour'),
                    'status' => $this->input->post('status'),
                    'image' => $filename
                );

                $this->rooms->update_room($id, $data);
                $this->session->set_flashdata('success', 'Room updated successfully.');
                // Add log activity
                $log = array(
                    'staffid' => $this->session->userdata('userid'),
                    'activity' => 'Updated room (' . $this->input->post('name') . ')',
                    'date' => date('Y-m-d H:i:s')
                );
                $this->load->model('AuditLog_model', 'logs');
                $this->logs->add_log($log);
                redirect('Rooms');
            }
        }else{
            redirect('Staff');
        }
    }

    public function viewimage($image)
    {
        if($this->session->userdata('userid') != null){
            $image_file = base_url('./assets/images/rooms/') . $image;
            $data = array(
                'title' => 'Baggak Resort Reservation System - View Room Image',
                'image' => $image_file,
                'alt' => 'Room Image'
            );
            $this->load->view('image_viewer', $data);
            $this->load->view('include/footer');
        }else{
            redirect('Staff');
        }
    }

    public function upload_image(){
        // Upload image
        $config['upload_path'] = './assets/images/rooms';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // Set max size to 10MB
        $config['max_size'] = 10240;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        // Set file name to the current timestamp
        $config['file_name'] = 'room_'.time();
        $this->upload->initialize($config);
        if($this->upload->do_upload('image')){
            // Create thumbnail
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/images/rooms/' . $this->upload->data('file_name');
            $config['new_image'] = './assets/images/rooms/thumbs/' . $this->upload->data('file_name');
            $config['create_thumb'] = TRUE;
            $config['thumb_marker'] = '';
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 200;
            $config['height'] = 200;
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            return $this->upload->data('file_name');
        }else{
            return null;
        }
    }
}
?>