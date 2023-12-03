<?php
class Amenities_model extends CI_Model
{
    // FIELDS: name, description, image, type, status
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_amenities($limit = null, $start = null, $search = null)
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
        $query = $this->db->get('amenities');
        return $query->result_array();
    }

    public function get_amenities_count($search = null)
    {
        $this->load->database();

        if($search != null){
            $this->db->like('name', $search);
        }
        $query = $this->db->get('amenities');
        return $query->num_rows();
    }

    public function add_amenity($data)
    {
        $this->load->database();
        $this->db->insert('amenities', $data);
    }

    public function get_amenity($id)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $query = $this->db->get('amenities');
        return $query->row_array();
    }

    public function update_amenity($id, $data)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('amenities', $data);
    }
}
?>