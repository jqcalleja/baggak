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

    public function get_users($limit = 15, $offset = 0, $search = '')
    {
        $this->load->database();
        // Check if search is empty
        if ($search != '') {
            $this->db->like('firstname', $search);
            $this->db->or_like('lastname', $search);
        }
        $this->db->limit($limit, $offset);
        $this->db->order_by('status', 'DESC');
        $this->db->order_by('lastname');
        $this->db->order_by('firstname');
        return $this->db->get('staff')->result_array();
    }

    public function get_users_count($search = '')
    {
        $this->load->database();
        // Check if search is empty
        if ($search != '') {
            $this->db->like('firstname', $search);
            $this->db->or_like('lastname', $search);
        }
        return $this->db->count_all_results('staff');
    }

    public function get_user($id)
    {
        $this->load->database();
        $this->db->where('staffid', $id);
        return $this->db->get('staff')->row_array();
    }

    public function update_user($id, $data)
    {
        $this->load->database();
        $this->db->where('staffid', $id);
        $this->db->update('staff', $data);
    }

    public function add_user($data)
    {
        $this->load->database();
        $this->db->insert('staff', $data);
    }

    public function get_user_by_token($token)
    {
        $this->load->database();
        $this->db->where('token', $token);
        return $this->db->get('staff')->row_array();
    }

    public function activate_user($id)
    {
        $this->load->database();
        $this->db->where('staffid', $id);
        $this->db->update('staff', array('status' => 1));
    }

    public function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
