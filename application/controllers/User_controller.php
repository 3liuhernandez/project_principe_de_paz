<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function index() {
        $this->session->sess_destroy();
        $this->login();
	}

    public function login() {
        $this->load->view('login_view');
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

        $validate['datos'] = $email. " - ". $psw;

        if(empty($email)){
            $validate['email'] = "E-mail Inválido";
            print json_encode($validate);
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = "E-mail Inválido";
        }

        $user_data = $this->User_model->get_user_by_login(strtolower($email), $pswd);
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

            $this->session->set_userdata('username', $user_data[0]->username);
            $this->session->set_userdata('user_id', $user_data[0]->id);
            $this->session->set_userdata('last_login', $user_data[0]->updated_at);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('categories', $this->Category_model->get_categories());
            $this->session->set_userdata('sub_categories', $this->Sub_category_model->get_subcategories());

        }
        print json_encode($validate);
    }

    public function logout() {

        $logout = $this->User_model->logout();

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');

        $this->session->sess_destroy();

        redirect(base_url('login'));
    }
}