<?php
class Staff_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_user($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        if ($query = $this->db->get()) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
?>