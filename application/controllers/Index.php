<?php
class Index extends CI_Controller
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

        $this->load->library('session');
        $this->load->helper('url');
    }

    // Get all images from the carousel folder
    public function get_images()
    {
        $directory = FCPATH . 'assets\\images\\carousel\\';

        if (is_dir($directory)) {
            $imageFiles = array();
            $files = scandir($directory);

            foreach ($files as $file) {
                $filePath = $directory . $file;
                // Check if the file exists and if it is an image file
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

    public function foods()
    {
        $this->load->database();
        $this->load->model('Foods_model', 'foods');
        $data = array(
            'page'   => 'home',
            'title' => "Baggak Resort Reservation System - Foods and Beverages",
            'foods' => $this->foods->get_foods_index()
        );

        $this->load->view('include/header', $data);
        $this->load->view('foodsinfo', $data);
        $this->load->view('include/footer');
        $this->db->close();
    }

    public function amenities()
    {
        $this->load->database();
        $this->load->model('Amenities_model', 'amenities');
        $data = array(
            'page'   => 'home',
            'title' => "Baggak Resort Reservation System - Amenities",
            'amenities' => $this->amenities->get_amenities_index()
        );

        $this->load->view('include/header', $data);
        $this->load->view('amenitiesinfo', $data);
        $this->load->view('include/footer');
        $this->db->close();
    }

    public function rooms()
    {
        $this->load->database();
        $this->load->model('Rooms_model', 'rooms');
        $data = array(
            'page'   => 'home',
            'title' => "Baggak Resort Reservation System - Rooms",
            'rooms' => $this->rooms->get_rooms_index()
        );

        $this->load->view('include/header', $data);
        $this->load->view('roomsinfo', $data);
        $this->load->view('include/footer');
        $this->db->close();
    }

    public function viewimage($folder, $image)
    {
        $image_file = base_url('assets/images/') . $folder . '/' . $image;
        $data = array(
            'title' => 'Baggak Resort Reservation System - View Amenity Image',
            'image' => $image_file,
            'alt' => $image
        );
        $this->load->view('image_viewer', $data);
        $this->load->view('include/footer');
    }
}
