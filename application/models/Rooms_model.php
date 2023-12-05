<?php
class Rooms_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_rooms($limit, $start, $search) {
        $this->load->database();

        if($search != null){
            $this->db->like('name', $search);
            $this->db->or_like('description', $search);
        }
        if($limit != null){
            $this->db->limit($limit, $start);
        }
        $this->db->order_by('status', 'DESC');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('rooms');
        return $query->result_array();
    }

    public function get_rooms_count($search = null)
    {
        $this->load->database();

        if($search != null){
            $this->db->like('name', $search);
        }
        $query = $this->db->get('amenities');
        return $query->num_rows();
    }

    public function add_room($data)
    {
        $this->load->database();
        $this->db->insert('rooms', $data);
    }

    public function get_room($id)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $query = $this->db->get('rooms');
        return $query->row_array();
    }

    public function update_room($id, $data)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('rooms', $data);
    }

    public function get_rooms_Index()
    {
        $this->load->database();
        $this->db->where('status', 1);
        $query = $this->db->get('rooms');
        return $query->result_array();
    }
}
?>