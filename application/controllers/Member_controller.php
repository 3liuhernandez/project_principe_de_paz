<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model( "Member_model" );
    }

    public function get_all_members() {
        $list_members = $this->Member_model->get_members_by_type();
        echo json_encode( $list_members );
    }

    public function get_members_by_type($type = '') {
        //$role = $this->input->post("role");

        $list_members = $this->Member_model->get_members_by_type($type);
        $data['list_members'] = $list_members;
        return $data;
    }
}