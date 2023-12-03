<?php
class customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('url');
    }

    public function index()
    {
        if($this->session->userdata('user_id') != null){
            redirect(base_url('Customer/dashboard'));
        }else{
            $this->login();
        }
    }

    public function login()
    {
        $data = array(
            'title' => "Baggak Resort Reservation System - Login",
            'page' => 'login'
        );

        $this->load->view('include/header', $data);
        $this->load->view('customer/login', $data);
        $this->load->view('include/footer');
    }

    public function login_user()
    {
        $this->load->model('Customer_model', 'customer');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->customer->login_user($email, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user['customer_id']);
            redirect(base_url('Customer/dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect(base_url('Customer/login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Customer'));
    }

    public function dashboard()
    {
        $data = array(
            'breadcrumb' => array(
                'Home' => '#',
                'Transaction' => '#'
            ),
            'title' => "Baggak Resort Reservation System - Dashboard"
        );

        $this->load->view('include/header', $data);
        $this->load->view('include/nav_customer');
        $this->load->view('customer/customer_dashboard', $data);
        $this->load->view('include/footer');
    }

    public function register()
    {
        $data = array(
            'title' => "Baggak Resort Reservation System - Registration"
        );

        $this->load->view('include/header', $data);
        $this->load->view('customer/registration', $data);
        $this->load->view('include/footer');
    }

    public function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
