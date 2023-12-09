<?php
class Reservations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Set default time zone used by date functions
        date_default_timezone_set('Asia/Manila');

        // Set the default time zone used in the database
        $this->load->database();
        $this->db->query("SET time_zone='+08:00'");
        $this->db->close();

        $this->load->library(array('session', 'form_validation', 'pagination', 'email'));
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('userid') != null) {
            $this->load->model('Reservations_model', 'reservations');
            $search = '';
            if ($this->input->get('search') != null) {
                $search = $this->input->get('search');
            }

            // Set date range, range is for the whole month
            if($this->input->get('from') != null && $this->input->get('to') != null) {
                $from = $this->input->get('from');
                $to = $this->input->get('to');
            } else {
                $from = date('Y-m-01');
                $to = date('Y-m-t');
            }
            
            // Set pagination
            $config['base_url'] = base_url('Foods/index');
            $config['total_rows'] = $this->reservations->get_reservations_count($search, $from, $to);
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


            $reservations = $this->reservations->get_reservations($config['per_page'], $page, $search, $from, $to);
            $names = array();
            foreach ($reservations as $reservation) {
                $names[$reservation['customerid']] = $this->reservations->get_customer($reservation['customerid']);
            }
            $items = array();
            foreach ($reservations as $reservation) {
                $items[$reservation['reservationid']] = $this->get_items($reservation['reservationid']);
            }

            $data = array(
                'title' => "Baggak Resort Resarvation System - Reservations",
                'reservationlist' => $reservations,
                'links' => $this->pagination->create_links(),
                'from' => $from,
                'to' => $to,
                'names' => $names,
                'items' => $items,
            );

            // $this->dd($data);

            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/reservations', $data);
            $this->load->view('include/footer');
        } else {
            redirect('Staff/login');
        }
    }

    public function get_items($reservationid)
    {
        $this->load->database();
        $this->db->select('itemtype, itemid');
        $this->db->where('reservationid', $reservationid);
        $query = $this->db->get('reservations');
        $items = $query->result_array();
        $reserveditems = array();
        foreach ($items as $item) {
            if ($item['itemtype'] == 1) {
                $amenity = $this->reservations->get_amenity_name($item['itemid']);
                $reserveditems[] =  $amenity['name'];
            } elseif ($item['itemtype'] == 2) {
                $room = $this->reservations->get_room_name($item['itemid']);
                $reserveditems[] =  $room['name'];
            }
        }
        // $this->dd($reserveditems);
        return $reserveditems;
    }

    public function new()
    {
        if ($this->session->userdata('userid') != null) {
            $this->load->model('Reservations_model', 'reservations');
            $data = array(
                'title' => "Baggak Resort Resarvation System - Reservations",
                'reservations' => $this->reservations->get_reservations(),
                'amenities' => $this->reservations->get_amenities(),
                'rooms' => $this->reservations->get_rooms(),
                'customers' => $this->reservations->get_customers(),
            );

            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/add_reservation', $data);
            $this->load->view('include/footer');
        } else {
            redirect('Staff/login');
        }
    }

    public function insert()
    {
        if ($this->session->userdata('userid') != null) {
            $this->load->model('Reservations_model', 'reservations');
            $this->form_validation->set_rules('customerid', 'Customer', 'required');
            $this->form_validation->set_rules('startdate', 'Start Date', 'required');
            $this->form_validation->set_rules('enddate', 'End Date', 'required');
            $this->form_validation->set_rules('item[]', 'Item', 'required', array('required' => 'No item found in the reservation list.'));
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('Reservations/new');
            } else {
                // Check if start date is conflict with other reservations, loop through all items in the table
                $i = 0;
                $items  = $this->input->post('item[]');
                
                foreach ($items as $item) {
                    $conflict = $this->reservations->check_conflict($this->input->post('startdate'), $this->input->post('enddate'), $this->input->post('type[]')[$i], $item[$i]);
                    if (count($conflict) > 0) {
                        $this->session->set_flashdata('error', 'Conflict with other reservations.');
                        redirect('Reservations/new');
                    }
                    $i++;
                }

                $data = array(
                    // Generate random reservation id
                    'reservationid' => rand(000000, 999999),
                    'customerid' => $this->input->post('customerid'),
                    'startdate' => $this->input->post('startdate'),
                    'enddate' => $this->input->post('enddate'),
                    'status' => 0,
                    'datecreated' => date('Y-m-d H:i:s'),
                );
                
                // Loop through all items in the table
                $i = 0;
                foreach ($items as $item) {
                    $data['itemtype'] = $this->input->post('type[]')[$i++];
                    $data['itemid'] = $item;
                    $this->reservations->add_reservations($data);
                }
                // Add entry to the logs
                $log = array(
                    'staffid' => $this->session->userdata('userid'),
                    'activity' => 'Updated food/beverage (' . $this->input->post('name') . ')',
                    'date' => date('Y-m-d H:i:s')
                );
                $this->load->model('AuditLog_model', 'logs');
                $this->logs->add_log($log);
                
                // Send email to the customer
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => $this->config->item('email'),
                    'smtp_pass' => $this->config->item('password'),
                    'mailtype' => 'html',
                    'newline' => "\r\n",
                    'wordwrap' => TRUE,
                    'smtp_crypto' => 'ssl',
                );
                $this->email->initialize($config);
                $customer = $this->reservations->get_customer($this->input->post('customerid'));
                $this->email->from($this->config->item('email'), 'Baggak Resort');
                $this->email->to($customer['email']);
                $this->email->subject('Reservation');
                $this->email->message('Your reservation has been made. Please pay the reservation fee within 24 hours to confirm your reservation. Thank you.<br><br>Baggak Resort');
                if($this->email->send()){
                    $this->email->print_debugger();
                    die();
                }
                $this->session->set_flashdata('success', 'Reservation added successfully.');
                redirect('Reservations');
            }
        } else {
            redirect('Staff/login');
        }
    }

    public function view($reservationid)
    {
        if ($this->session->userdata('userid') != null) {
            $this->load->model('Reservations_model', 'reservations');
            $reservation = $this->reservations->get_reservation($reservationid);
            $data = array(
                'title' => "Baggak Resort Resarvation System - Reservations",
                'reservation' => $reservation,
                'customer' => $this->reservations->get_customer($reservation[0]['customerid']),
                'items' => $this->get_items($reservationid),
            );
            // $this->dd($data);
            $this->load->view('include/header_staff', $data);
            $this->load->view('include/nav_staff');
            $this->load->view('staff/view_reservation', $data);
            $this->load->view('include/footer');
        } else {
            redirect('Staff/login');
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
