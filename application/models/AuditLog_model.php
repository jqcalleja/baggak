<?php
class AuditLog_model extends CI_Model {
    public function get_auditlog($limit = 25, $offset = 0, $search = '', $from = '', $to = '') {
        $this->load->database();
        $search = $this->input->get('search');
        $this->db->join('staff', 'staff.staffid = auditlog.staffid');
        $filter = '';

        // Check if search is empty
        if ($search != '') {
            $filter .= "(staff.firstname LIKE '%" . $search . "%' OR staff.lastname LIKE '%" . $search . "%' OR activity LIKE '%" . $search . "%')";
        }
        
        // Check if from and to is empty and set where clause using between
        if ($from != '' && $to != '') {
            if ($filter != '') {
                $filter .= ' AND ';
            }
            $filter .= "(date BETWEEN '" . date('Y-m-d', strtotime($from)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($to)) . "')";
        }
        
        if ($filter != '') {
            $this->db->where($filter);
        }
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('auditlog', $limit, $offset);
        //$this->dd($filter);
        return $query->result_array();
    }

    public function get_audit_count($search = '', $from = '', $to = '') {
        $this->load->database();
        $this->db->join('staff', 'staff.staffid = auditlog.staffid');
        $filter = '';

        // Check if search is empty
        if ($search != '') {
            $filter .= "staff.firstname LIKE '%" . $search . "%' OR staff.lastname LIKE '%" . $search . "%' OR activity LIKE '%" . $search . "%'";
        }
        
        // Check if from and to is empty and set where clause using between
        if ($from != '' && $to != '') {
            if ($filter != '') {
                $filter .= ' AND ';
            }
            $filter .= "date BETWEEN '" . date('Y-m-d', strtotime($from)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($to)) . "'";
        }

        if ($filter != '') {
            $this->db->where($filter);
        }
        return $this->db->count_all_results('auditlog');
    }

    public function for_print($search = '', $from = '', $to = ''){
        $this->load->database();
        $this->db->join('staff', 'staff.staffid = auditlog.staffid');
        $filter = '';

        // Check if search is empty
        if ($search != '') {
            $filter .= "staff.firstname LIKE '%" . $search . "%' OR staff.lastname LIKE '%" . $search . "%' OR activity LIKE '%" . $search . "%'";
        }
        
        // Check if from and to is empty and set where clause using between
        if ($from != '' && $to != '') {
            if ($filter != '') {
                $filter .= ' AND ';
            }
            $filter .= "date BETWEEN '" . date('Y-m-d', strtotime($from)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($to)) . "'";
        }

        if ($filter != '') {
            $this->db->where($filter);
        }

        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('auditlog');
        return $query->result_array();
    }

    public function add_log($data) {
        $this->load->database();
        $this->db->insert('auditlog', $data);
    }

    public function dd($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}
?>