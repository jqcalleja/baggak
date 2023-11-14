<?php
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('url');
    }

    public function login()
    {
        $data = array(
            'title' => "Baggak Resort Reservation System - Login",
            'page' => 'login'
        );

        $this->load->view('include/header', $data);
        $this->load->view('client/login', $data);
        $this->load->view('include/footer');
    }

    public function login_user()
    {
        $this->load->model('Client_model', 'client');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->client->login_user($email, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user['customer_id']);
            redirect(base_url('Client/dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect(base_url('Client/login'));
        }
    }

    public function logout()
    {
        $this->session->session_destroy();
        redirect(base_url('Client'));
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
        $this->load->view('include/nav_costumer');
        $this->load->view('client/client_dashboard', $data);
        $this->load->view('include/footer');
    }

    public function register()
    {
        $data = array(
            'title' => "Baggak Resort Reservation System - Registration"
        );

        $this->load->view('include/header', $data);
        $this->load->view('client/registration', $data);
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
