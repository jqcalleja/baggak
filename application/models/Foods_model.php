<?php
class Foods_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_foods($limit = null, $start = null, $search = null)
    {
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
        $query = $this->db->get('foods');
        return $query->result_array();
    }

    public function get_foods_count($search = null)
    {
        $this->load->database();

        if($search != null){
            $this->db->like('name', $search);
        }
        $query = $this->db->get('foods');
        return $query->num_rows();
    }

    public function add_food($data)
    {
        $this->load->database();
        $this->db->insert('foods', $data);
    }

    public function get_food($id)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $query = $this->db->get('foods');
        return $query->row_array();
    }

    public function update_food($id, $data)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('foods', $data);
    }

    public function get_foods_index()
    {
        $this->load->database();
        $this->db->where('status', '1');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('foods');
        return $query->result_array();
    }
}
?>