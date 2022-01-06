<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( "User_model" );
    }

    public function get_all_users() {
        $users = $this->User_model->get_users_by_role('');
        $data['list_users'] = $users;
        echo "<pre>";
        print_r($users);
        echo "</pre>";
        return $data;
    }

    public function get_users_by_role($role = '') {
        //$role = $this->input->post("role");

        $list_users = $this->User_model->get_users_by_role($role);
        $data['list_users'] = $list_users;
        return $data;
    }
}