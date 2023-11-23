<?php
class AuditLog extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->library(array('session', 'pagination'));
    }
    public function index() {
        $this->load->model('AuditLog_model', 'audit');

        $search = '';
        if ($this->input->get('search') != null) {
            $search = $this->input->get('search');
        }

        // Set pagination
        $config['base_url'] = base_url('AuditLog/index');
        $config['total_rows'] = $this->audit->get_audit_count($search);
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'page-link');
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = '<i class="bi bi-chevron-bar-left"></i>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="bi bi-chevron-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</a></li>';
        $config['next_link'] = '<i class="bi bi-chevron-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_link'] = '<i class="bi bi-chevron-bar-right"></i>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data = array(
            'title' => 'Baggak Resort Resarvation System - Audit Log',
            'auditlog' => $this->audit->get_auditlog($config['per_page'], $page, $search),
            'links' => $this->pagination->create_links()
        );
        $this->load->view('include/header_staff', $data);
        $this->load->view('include/nav_staff');
        $this->load->view('staff/auditlog', $data);
        $this->load->view('include/footer');
    }

    public function clear() {
        $this->load->model('AuditLog_model', 'audit');
        $data['title'] = 'Baggak Resort Resarvation System - Audit Log';
        $data['auditlog'] = $this->audit->get_auditlog();
        $this->load->view('include/header_staff', $data);
        $this->load->view('include/nav_staff');
        $this->load->view('staff/auditlog', $data);
        $this->load->view('include/footer');
    }

    
}
?>