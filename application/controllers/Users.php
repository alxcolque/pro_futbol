<?php
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('TorneoModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }
    public function index() {
        $this->login();
    }
    public function register() {
        $this->form_validation->set_rules('nombre','First Name','trim|required');
        $this->form_validation->set_rules('apellido','Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('clave', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[clave]|md5');
        $data['title'] = 'Registrar';
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/estilos', $data);
            $this->load->view('users/register');
            $this->load->view('templates/scripts');
        } else {
            if ($this->UserModel->set_user()) {
                $this->session->set_flashdata('msg_success', 'Registro exitosos!');
                redirect('users/login');
            } else {
                $this->session->set_flashdata('msg_error', 'Error! Por favor intente de nuevo');
                $currentClass = $this->router->fetch_class(); // class = controller
                $currentAction = $this->router->fetch_method(); // action = function
                redirect("$currentClass/$currentAction");
            }
        }
    }
    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        $data['title'] = 'Login';
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/estilos', $data);
            $this->load->view('users/login');
            $this->load->view('templates/scripts');
        } else {
            if ($user = $this->UserModel->get_user_login($email, $password)) {
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('user_id', $user['user_id']);
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_flashdata('msg_success', 'Inicio exitoto!');
                redirect('Torneo');
            } else {
                $this->session->set_flashdata('msg_error', 'Los credenciales no son correctos!');
                $currentClass = $this->router->fetch_class(); // class = controller
                $currentAction = $this->router->fetch_method(); // action = function
                redirect("$currentClass/$currentAction");
            }
        }
    }
    public function logout() {
        if ($this->session->userdata('is_logged_in')) {
            //$this->session->unset_userdata(array('email' => '', 'is_logged_in' => ''));
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('user_id');
        }
        redirect('users/login');
    }
}
