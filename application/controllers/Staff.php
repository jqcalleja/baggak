<?php
class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(array('session', 'form_validation'));
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('userid') != null) {
            $data = array(
                'title' => "Baggak Resort Resarvation System - Dashboard"
            );

            $this->load->view('include/header_admin', $data);
            if ($this->session->userdata('role') == '1') :
                $this->load->view('include/nav_admin');
            else :
                $this->load->view('include/nav_staff');
            endif;
            $this->load->view('staff/staff_dashboard', $data);
            $this->load->view('include/footer');
        } else {
            redirect(base_url('Staff/login'));
        }
    }

    public function login()
    {
        $data = array(
            'title' => "Baggak Resort Resarvation System - Login"
        );

        $this->load->view('include/header_admin', $data);
        $this->load->view('staff/staff_login', $data);
        $this->load->view('include/footer');
    }

    public function login_user()
    {
        $this->load->model('Staff_model', 'staff');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->staff->login_user($email);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Check if the account is active
                if ($user['status'] == 0) {
                    $this->session->set_flashdata('error', 'Your account is inactive. Please contact an administrator.');
                    redirect(base_url('Staff/login'));
                }
                $this->session->set_userdata('userid', $user['staffid']);
                $this->session->set_userdata('fname', $user['firstname'] . ' ' . $user['lastname']);
                $this->session->set_userdata('role', $user['role']);
                redirect(base_url('Staff'));
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect(base_url('Staff/login'));
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect(base_url('Staff/login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Staff'));
    }

    public function register()
    {
        $data = array(
            'title' => "Baggak Resort Resarvation System - Registration"
        );

        $this->load->view('include/header_admin', $data);
        $this->load->view('staff/staff_registration', $data);
        $this->load->view('include/footer');
    }

    public function myprofile()
    {
        $this->load->model('Staff_model', 'staff');
        $data = array(
            'title' => "Baggak Resort Resarvation System - My Profile",
            'profile' => $this->staff->get_user($this->session->userdata('userid'))
        );

        // Check if the account status is active
        if ($data['profile']['status'] == 0) {
            $this->session->set_flashdata('warning', 'You have changed your account status to inactive. Please contact an administrator.');
            redirect(base_url('Staff'));
        }

        $this->load->view('include/header_admin', $data);
        if ($this->session->userdata('role') == '1') :
            $this->load->view('include/nav_admin');
        else :
            $this->load->view('include/nav_staff');
        endif;
        $this->load->view('staff/view_profile', $data);
        $this->load->view('include/footer');
    }

    public function users()
    {
        $this->load->model('Staff_model', 'staff');
        $data = array(
            'title' => "Baggak Resort Resarvation System - Users",
            'users' => $this->staff->get_users()
        );

        $this->load->view('include/header_admin', $data);
        if ($this->session->userdata('role') == '1') :
            $this->load->view('include/nav_admin');
        else :
            $this->load->view('include/nav_staff');
        endif;
        $this->load->view('staff/users', $data);
        $this->load->view('include/footer');
    }

    public function user($id)
    {
        $this->load->model('Staff_model', 'staff');
        $data = array(
            'title' => "Baggak Resort Resarvation System - View User",
            'profile' => $this->staff->get_user($id)
        );

        $this->load->view('include/header_admin', $data);
        if ($this->session->userdata('role') == '1') :
            $this->load->view('include/nav_admin');
        else :
            $this->load->view('include/nav_staff');
        endif;
        $this->load->view('staff/view_user', $data);
        $this->load->view('include/footer');
    }

    public function editprofile()
    {
        $this->load->model('Staff_model', 'staff');
        $data = array(
            'title' => "Baggak Resort Resarvation System - Edit Profile",
            'profile' => $this->staff->get_user($this->session->userdata('userid'))
        );

        $this->session->set_userdata('email', $data['profile']['email']);
        $this->load->view('include/header_admin', $data);
        if ($this->session->userdata('role') == '1') :
            $this->load->view('include/nav_admin');
        else :
            $this->load->view('include/nav_staff');
        endif;
        $this->load->view('staff/edit_profile', $data);
        $this->load->view('include/footer');
    }

    public function update_profile()
    {
        $this->load->database();
        // Validate the entered data in the form
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => 'The {field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.'
        ));
        $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'regex_match' => '{field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.',
        ));
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.'
        ));
        $this->form_validation->set_rules('address', 'Address', 'trim|required|regex_match[/^[0-9A-Za-z\s\.,#-]+$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain alphabet characters, numbers, spaces, dashes, periods, apostrophes, and special characters (#, (), \', and .).'
        ));
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|regex_match[/^[0-9\-\+]*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain numbers, dashes, and plus signs.'
        ));
        // Check if the email entered is is not the same with the current email
        $is_unique = '';
        if ($this->input->post('email') != $this->session->userdata('email')) {
            $is_unique = '|is_unique[staff.email]';
        }
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email' . $is_unique, array(
            'required' => 'Please provide your {field}.',
            'valid_email' => 'Please provide a valid {field}.',
            'is_unique' => 'This {field} is already used by another user.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).+$/]', array(
            'required' => 'Please provide your {field}.',
            'min_length' => '{field} must be at least 8 characters long.',
            'max_length' => '{field} must not exceed 30 characters long.',
            'regex_match' => '{field} must contain at least one uppercase letter, one lowercase letter, one number, and one special character.'
        ));
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'trim|required|matches[password]', array(
            'required' => '{field} must not be blank.',
            'matches' => 'The {field} does not match the password.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('Staff/editprofile'));
        } else {
            $this->load->model('Staff_model', 'staff');
            $id = $this->session->userdata('userid');
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'lastname' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'role' => $this->input->post('role')
            );
            if ($this->input->post('password') != null) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            //$this->dd($data);

            $this->staff->update_user($id, $data);
            $this->session->set_flashdata('success', 'Profile updated successfully');
            $this->session->unset_userdata('email');
            redirect(base_url('Staff/myprofile'));
        }
    }

    public function edituser($id)
    {
        $this->load->model('Staff_model', 'staff');
        $data = array(
            'title' => "Baggak Resort Resarvation System - Edit User",
            'profile' => $this->staff->get_user($id)
        );

        $this->session->set_userdata('email', $data['profile']['email']);
        $this->load->view('include/header_admin', $data);
        if ($this->session->userdata('role') == '1') :
            $this->load->view('include/nav_admin');
        else :
            $this->load->view('include/nav_staff');
        endif;
        $this->load->view('staff/edit_user', $data);
        $this->load->view('include/footer');
    }

    public function update_user()
    {
        $this->load->database();
        // Validate the entered data in the form
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => 'The {field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.'
        ));
        $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'regex_match' => '{field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.',
        ));
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.'
        ));
        $this->form_validation->set_rules('address', 'Address', 'trim|required|regex_match[/^[0-9A-Za-z\s\.,#-]+$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain alphabet characters, numbers, spaces, dashes, periods, apostrophes, and special characters (#, (), \', and .).'
        ));
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|regex_match[/^[0-9\-\+]*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain numbers, dashes, and plus signs.'
        ));
        // Check if the email entered is is not the same with the current email
        $is_unique = '';
        if ($this->input->post('email') != $this->session->userdata('email')) {
            $is_unique = '|is_unique[staff.email]';
        }
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email' . $is_unique, array(
            'required' => 'Please provide your {field}.',
            'valid_email' => 'Please provide a valid {field}.',
            'is_unique' => 'This {field} is already used by another user.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).+$/]', array(
            'required' => 'Please provide your {field}.',
            'min_length' => '{field} must be at least 8 characters long.',
            'max_length' => '{field} must not exceed 30 characters long.',
            'regex_match' => '{field} must contain at least one uppercase letter, one lowercase letter, one number, and one special character.'
        ));
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'trim|required|matches[password]', array(
            'required' => '{field} must not be blank.',
            'matches' => 'The {field} does not match the password.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('Staff/edituser/'.$this->session->userdata('userid')));
        } else {
            $this->load->model('Staff_model', 'staff');
            $id = $this->session->userdata('userid');
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'lastname' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'role' => $this->input->post('role')
            );
            if ($this->input->post('password') != null) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            //$this->dd($data);

            $this->staff->update_user($id, $data);
            $this->session->set_flashdata('success', 'User account updated successfully');
            $this->session->unset_userdata('email');
            redirect(base_url('Staff/users'));
        }
    }

    public function adduser()
    {
        $data = array(
            'title' => "Baggak Resort Resarvation System - Add User"
        );

        $this->load->view('include/header_admin', $data);
        if ($this->session->userdata('role') == '1') :
            $this->load->view('include/nav_admin');
        else :
            $this->load->view('include/nav_staff');
        endif;
        $this->load->view('staff/add_user', $data);
        $this->load->view('include/footer');
    }

    public function add_user()
    {
        $this->load->database();
        // Validate the entered data in the form
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => 'The {field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.'
        ));
        $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'regex_match' => '{field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.',
        ));
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|regex_match[/^[a-zA-Z\s\-\.\']*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain alphabet characters, spaces, dashes, periods, and apostrophes.'
        ));
        $this->form_validation->set_rules('address', 'Address', 'trim|required|regex_match[/^[0-9A-Za-z\s\.,#-]+$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain alphabet characters, numbers, spaces, dashes, periods, apostrophes, and special characters (#, (), \', and .).'
        ));
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|regex_match[/^[0-9\-\+]*$/]', array(
            'required' => 'Please provide your {field}.',
            'regex_match' => '{field} may only contain numbers, dashes, and plus signs.'
        ));
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[staff.email]', array(
            'required' => 'Please provide your {field}.',
            'valid_email' => 'Please provide a valid {field}.',
            'is_unique' => 'This {field} is already used by another user.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).+$/]', array(
            'required' => 'Please provide your {field}.',
            'min_length' => '{field} must be at least 8 characters long.',
            'max_length' => '{field} must not exceed 30 characters long.',
            'regex_match' => '{field} must contain at least one uppercase letter, one lowercase letter, one number, and one special character.'
        ));
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'trim|required|matches[password]', array(
            'required' => '{field} must not be blank.',
            'matches' => 'The {field} does not match the password.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('Staff/adduser'));
        } else {
            $this->load->model('Staff_model', 'staff');
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'lastname' => $this->input->post('lastname'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'role' => $this->input->post('role'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
            //$this->dd($data);

            $this->staff->add_user($data);
            $this->session->set_flashdata('success', 'User added successfully');
            redirect(base_url('Staff/adduser'));
        }
    }

    public function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}
