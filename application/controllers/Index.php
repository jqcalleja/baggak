<?php
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
    }

    public function get_images()
    {
        $directory = FCPATH.'assets\\images\\carousel\\';

        if (is_dir($directory)) {
            $imageFiles = array();
            $files = scandir($directory);

            foreach ($files as $file) {
                $filePath = $directory.$file;
                // Check if the file is a regular file and an image
                if (is_file($filePath) && in_array(pathinfo($file, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
                    $imageFiles[] = $file;
                    
                }
            }

            if (count($imageFiles) > 0) {
                return $imageFiles;
            }
        }
    }

    public function index()
    {
        $data['title']  = "Baggak Resort Resarvation System";
        $data['page']   = 'home';
        $data['images'] = $this->get_images();
        $this->load->view('include/header', $data);
        $this->load->view('index', $data);
        $this->load->view('include/footer');
    }

    public function login()
    {
        $data = array(
            'title' => "Baggak Resort Resarvation System - Login",
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
            redirect(base_url('Index/dashboard'));
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect(base_url('Index/login'));
        }
    }

    public function dashboard(){
        $data = array(
            'breadcrumb' => array(
                'Home' => '#',
                'Transaction' => '#'
            ),
            'title' => "Baggak Resort Resarvation System - Dashboard"
        );

        $this->load->view('include/header', $data);
        $this->load->view('include/nav_costumer');
        $this->load->view('client/client_dashboard', $data);
        $this->load->view('include/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect(base_url('Index'));
    }

    public function register()
    {
        $data = array(
            'title' => "Baggak Resort Resarvation System - Registration"
        );

        $this->load->view('include/header', $data);
        $this->load->view('client/registration', $data);
        $this->load->view('include/footer');
    }

    public function dd($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
