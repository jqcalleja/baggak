<?php
class Staff_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_user($email)
    {
        $this->load->database();
        $this->db->where('email', $email);
        return $this->db->get('staff')->row_array();
    }

    public function get_user($id)
    {
        $this->load->database();
        $this->db->where('staffid', $id);
        return $this->db->get('staff')->row_array();
    }

    public function dd($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
?>