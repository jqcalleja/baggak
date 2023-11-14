<?php
class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('user_id') != null) {
            $data = array(
                'title' => "Baggak Resort Resarvation System - Dashboard"
                );

            $this->load->view('include/header_admin', $data);
            if($this->session->userdata('role') == '1'):
                $this->load->view('include/nav_admin');
            else:
                $this->load->view('include/nav_staff');
            endif;
            $this->load->view('staff/staff_dashboard', $data);
            $this->load->view('include/footer');
        } else {
            redirect(base_url('Staff/login'));
        }
    }

    public function login(){
        $data = array(
            'title' => "Baggak Resort Resarvation System - Login"
        );

        $this->load->view('include/header_admin', $data);
        $this->load->view('staff/staff_login', $data);
        $this->load->view('include/footer');
    }

    public function login_user(){
        $this->load->model('Staff_model', 'staff');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->staff->login_user($email);
        if ($user) {
            if(password_verify($password, $user['password'])){
                $this->session->set_userdata('user_id', $user['staff_id']);
                $this->session->set_userdata('fname', $user['first_name'] . ' ' . $user['last_name']);
                $this->session->set_userdata('role', $user['role']);
                redirect(base_url('Staff'));
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect(base_url('Staff/login'));
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect(base_url('Staff/login'));
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Staff'));
    }

    public function register(){
        $data = array(
            'title' => "Baggak Resort Resarvation System - Registration"
        );

        $this->load->view('include/header_admin', $data);
        $this->load->view('staff/staff_registration', $data);
        $this->load->view('include/footer');
    }

    public function dd($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
