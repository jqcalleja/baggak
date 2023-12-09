<?php
class Reservations_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->load->database();
        $query = $this->db->get('reservations');
        return $query->result_array();
    }

    public function get_reservations($limit = 10, $offset = 0, $search = '', $from = '', $to = '')
    {
        $this->load->database();
        $search = $this->input->get('search');
        $filter = '';

        // Check if search is empty
        if ($search != '') {
            $filter .= "(customers.firstname LIKE '%" . $search . "%' OR customers.lastname LIKE '%" . $search . "%')";
        }
        
        // Check if from and to is empty and set where clause using between
        if ($from != '' && $to != '') {
            if ($filter != '') {
                $filter .= ' AND ';
            }
            $filter .= "(startdate BETWEEN '" . date('Y-m-d', strtotime($from)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($to)) . "')";
        }
        
        $this->db->select('DISTINCT(reservations.reservationid), reservations.customerid, reservations.startdate, reservations.enddate, reservations.status, customers.firstname, customers.lastname');
        $this->db->join('customers', 'reservations.customerid = customers.customerid');
        if ($filter != '') {
            $this->db->where($filter);
        }
        $this->db->order_by('reservations.startdate', 'ASC');
        $query = $this->db->get('reservations', $limit, $offset);
        //$this->dd($filter);
        return $query->result_array();
    }

    public function get_reservations_count($search = '', $from = '', $to = '')
    {
        $this->load->database();
        $search = $this->input->get('search');
        $filter = '';

        // Check if search is empty
        if ($search != '') {
            $filter .= "(customers.firstname LIKE '%" . $search . "%' OR customers.lastname LIKE '%" . $search . "%')";
        }
        
        // Check if from and to is empty and set where clause using between
        if ($from != '' && $to != '') {
            if ($filter != '') {
                $filter .= ' AND ';
            }
            $filter .= "(startdate BETWEEN '" . date('Y-m-d', strtotime($from)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($to)) . "')";
        }
        
        $this->db->select('DISTINCT(reservations.reservationid), reservations.customerid, reservations.startdate, reservations.enddate, reservations.status, customers.firstname, customers.lastname');
        $this->db->join('customers', 'reservations.customerid = customers.customerid');
        if ($filter != '') {
            $this->db->where($filter);
        }
        return $this->db->count_all_results('reservations');
    }

    public function get_reservation($reservationid)
    {
        $this->load->database();
        $this->db->where('reservationid', $reservationid);
        $query = $this->db->get('reservations');
        return $query->result_array();
    }

    public function get_amenities()
    {
        $this->load->database();
        $this->db->where('status', '1');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('amenities');
        return $query->result_array();
    }

    public function get_amenity_name($amenityid)
    {
        $this->load->database();
        $this->db->where('id', $amenityid);
        $query = $this->db->get('amenities');
        return $query->row_array();
    }

    public function get_rooms()
    {
        $this->load->database();
        $this->db->where('status', '1');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('rooms');
        return $query->result_array();
    }

    public function get_room_name($roomid)
    {
        $this->load->database();
        $this->db->where('id', $roomid);
        $query = $this->db->get('rooms');
        return $query->row_array();
    }

    public function get_customers()
    {
        $this->load->database();
        $this->db->where('status', '1');
        $this->db->order_by('firstname', 'ASC');
        $query = $this->db->get('customers');
        return $query->result_array();
    }

    public function get_customer($customerid)
    {
        $this->load->database();
        $this->db->where('customerid', $customerid);
        $query = $this->db->get('customers');
        return $query->row_array();
    }

    public function check_conflict($startdate, $enddate, $type, $itemid)
    {
        $this->load->database();
        $this->db->where("((startdate BETWEEN '" . date('Y-m-d', strtotime($startdate)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($enddate)) . "') OR (enddate BETWEEN '" . date('Y-m-d', strtotime($startdate)) . "' AND '" . date('Y-m-d 23:59:59.999', strtotime($enddate)) . "')) AND itemtype = '" . $type . "' AND itemid = '" . $itemid . "'");
        $query = $this->db->get('reservations');
        return $query->result_array();
    }

    public function add_reservations($data)
    {
        $this->load->database();
        $this->db->insert('reservations', $data);
    }
}
?>