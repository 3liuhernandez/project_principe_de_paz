<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function index() {
        $this->session->sess_destroy();
        $this->login();
	}

    public function login() {
        $this->load->view('login/login');
    }

    public function validate_login() {
        $email = $this->input->post('email');
        $pswd = $this->input->post('pswd');

        $validate = array();

        function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			$data = mb_strtolower($data);
			return $data;
		}

        $email = test_input($email);
        $pswd = test_input($pswd);

        $validate['datos'] = $email. " - ". $pswd;

        if(empty($email)){
            $validate['email'] = "E-mail Inválido";
            print json_encode($validate);
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = "E-mail Inválido";
        }

        $user_data = $this->Login_model->get_user_by_login(strtolower($email), $pswd);

        if(!is_array($user_data)) {
            $validate['email'] = "E-mail Inválido";
            $validate['msj'] = $user_data;
            print json_encode($validate);
            exit();

        } else {
            /**
             * loggin successfull
             */
            $validate['loggin'] = true;
            $validate['user_data'] = $user_data;

            $this->session->set_userdata('username', $user_data[0]->email);
            $this->session->set_userdata('user_id', $user_data[0]->id);
            $this->session->set_userdata('last_login', $user_data[0]->updated_at);
            $this->session->set_userdata('role', $user_data[0]->role);
            $this->session->set_userdata('logged_in', TRUE);

        }
        print json_encode($validate);
    }

    public function redirect() {
        $role = $this->session->userdata('role');
        
        if($role == 1) {
            redirect(base_url('admin'));
        } else if($role == 2) {
            redirect(base_url('usuario'));
        }
    }

    public function logout() {

        $logout = $this->Login_model->logout();

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('role');

        $this->session->sess_destroy();

        redirect(base_url('login'));
    }
}