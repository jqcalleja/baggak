<?php
class AuditLog_model extends CI_Model {
    public function get_auditlog($limit = 25, $offset = 0, $search = '') {
        $this->load->database();
        $search = $this->input->get('search');
        $this->db->join('staff', 'staff.staffid = auditlog.staffid');
        // Check if search is empty
        if ($search != '') {
            $this->db->like('staff.firstname', $search);
            $this->db->or_like('staff.lastname', $search);
            $this->db->or_like('activity', $search);
            $this->db->or_like('date', $search);
        }
        
        $this->db->limit($limit, $offset);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('auditlog');
        return $query->result_array();
    }

    public function get_audit_count($search = '') {
        $this->load->database();
        $this->db->join('staff', 'staff.staffid = auditlog.staffid');
        // Check if search is empty
        if ($search != '') {
            $this->db->like('staff.firstname', $search);
            $this->db->or_like('staff.lastname', $search);
            $this->db->or_like('activity', $search);
            $this->db->or_like('date', $search);
        }
        return $this->db->count_all_results('auditlog');
    }

    public function add_log($data) {
        $this->load->database();
        $this->db->insert('auditlog', $data);
    }
}
?>