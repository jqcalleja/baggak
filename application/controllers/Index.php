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
        $directory = FCPATH . 'assets\\images\\carousel\\';

        if (is_dir($directory)) {
            $imageFiles = array();
            $files = scandir($directory);

            foreach ($files as $file) {
                $filePath = $directory . $file;
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
        $data = array(
            'title'  => "Baggak Resort Reservation System",
            'page'   => 'home',
            'images' => $this->get_images(),
        );
        $this->load->view('include/header', $data);
        $this->load->view('index', $data);
        $this->load->view('include/footer');
    }

    public function about()
    {
        $data = array(
            'page'   => 'home',
            'title' => "Baggak Resort Reservation System - About Us"
        );

        $this->load->view('include/header', $data);
        $this->load->view('about', $data);
        $this->load->view('include/footer');
    }
}
