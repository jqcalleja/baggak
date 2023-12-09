<?php
class Amenities extends CI_Controller
{
    // FIELDS: name, description, image, type, status
    public function __construct()
    {
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
    
    public function index()
    {
        if($this->session->userdata('userid') != null){
            $this->load->model('Amenities_model', 'amenities');
            $search = '';
            if ($this->input->get('search') != null) {
                $search = $this->input->get('search');
            }
            // Set pagination
            $config['base_url'] = base_url('Amenities/index');
            $config['total_rows'] = $this->amenities->get_amenities_count($search);
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
                'title' => 'Baggak Resort Resarvation System - Amenities List',
                'amenities' => $this->amenities->get_amenities($config['per_page'], $page, $search),
                'links' => $this->pagination->create_links()
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/amenities', $data);
            $this->load->view('include/footer');
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function addamenity()
    {
        if($this->session->userdata('userid') != null){
            $data = array(
                'title' => 'Baggak Resort Reservation System - Add Amenity'
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/add_amenities', $data);
            $this->load->view('include/footer');
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function insert_amenity(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Amenities_model', 'amenities');
            $this->form_validation->set_rules('name', 'Amenity Name', 'required|is_unique[amenities.name]|trim');
            $this->form_validation->set_rules('price', 'Amenity Price', 'required|numeric|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $data = array(
                    'title' => 'Baggak Resort Reservation System - Add New Amenity'
                );
                $this->load->view('include/header', $data);
                $this->load->view('include/nav_staff');
                $this->load->view('staff/add_amenities');
                $this->load->view('include/footer');
            } else {
                $filename = $this->upload_image();

                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    // The price is formatted to 2 decimal places
                    'price' => number_format($this->input->post('price'), 2, '.', ''),
                    'type' => $this->input->post('type'),
                    'image' => $filename,
                    'status' => $this->input->post('status')
                );
                $this->amenities->add_amenity($data);
                
                $this->session->set_flashdata('success', 'New amenity has been added.');
                // Add log activity
                $log = array(
                    'staffid' => $this->session->userdata('userid'),
                    'activity' => 'Added a new amenity (' . $this->input->post('name') . ')',
                    'date' => date('Y-m-d H:i:s')
                );
                $this->load->model('AuditLog_model', 'logs');
                $this->logs->add_log($log);
                redirect('Amenities');
            }
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function viewamenity(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Amenities_model', 'amenities');
            $data = array(
                'title' => 'Baggak Resort Reservation System - View Amenity',
                'amenity' => $this->amenities->get_amenity($this->uri->segment(3))
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/view_amenity', $data);
            $this->load->view('include/footer');
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function editamenity(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Amenities_model', 'amenities');
            $data = array(
                'title' => 'Baggak Resort Reservation System - Edit Amenity',
                'amenity' => $this->amenities->get_amenity($this->uri->segment(3))
            );
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/edit_amenities', $data);
            $this->load->view('include/footer');
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function update_amenity(){
        if($this->session->userdata('userid') != null){
            $this->load->model('Amenities_model', 'amenities');
            $this->form_validation->set_rules('name', 'Amenity Name', 'required|trim');
            $this->form_validation->set_rules('price', 'Amenity Price', 'required|numeric|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $data = array(
                    'title' => 'Baggak Resort Reservation System - Edit Amenity',
                    'amenity' => $this->amenities->get_amenity($this->input->post('id'))
                );
                $this->load->view('include/header_staff', $data);
                $this->load->view('include/nav_staff');
                $this->load->view('staff/edit_amenities', $data);
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
                        unlink('./assets/images/amenities/' . $this->input->post('oldimage'));
                        unlink('./assets/images/amenities/thumbs/' . $this->input->post('oldimage'));
                    }
                }
                $data = array(
                    'name' => $this->input->post('name'),
                    'description' => $this->input->post('description'),
                    // The price is formatted to 2 decimal places
                    'price' => number_format($this->input->post('price'), 2, '.', ''),
                    'type' => $this->input->post('type'),
                    'image' => $filename,
                    'status' => $this->input->post('status')
                );

                $this->amenities->update_amenity($id, $data);
                
                $this->session->set_flashdata('success', 'Amenity has been updated.');
                // Add log activity
                $log = array(
                    'staffid' => $this->session->userdata('userid'),
                    'activity' => 'Updated amenity (' . $this->input->post('name') . ')',
                    'date' => date('Y-m-d H:i:s')
                );
                $this->load->model('AuditLog_model', 'logs');
                $this->logs->add_log($log);
                redirect('Amenities');
            }
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function viewimage($image)
    {
        if($this->session->userdata('userid') != null){
            $image_file = base_url('./assets/images/amenities/') . $image;
            $data = array(
                'title' => 'Baggak Resort Reservation System - View Amenity Image',
                'image' => $image_file,
                'alt' => 'Amenity Image'
            );
            $this->load->view('image_viewer', $data);
            $this->load->view('include/footer');
        }else{
            $this->session->set_flashdata('warning', 'You have been logged out. Please login again.');
            redirect('Staff');
        }
    }

    public function upload_image(){
        // Upload image
        $config['upload_path'] = './assets/images/amenities';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // Set max size to 10MB
        $config['max_size'] = 10240;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        // Set file name to the current timestamp
        $config['file_name'] = 'amenity_'.time();
        $this->upload->initialize($config);
        if($this->upload->do_upload('image')){
            // Create thumbnail
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/images/amenities/' . $this->upload->data('file_name');
            $config['new_image'] = './assets/images/amenities/thumbs/' . $this->upload->data('file_name');
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

    public function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
?>