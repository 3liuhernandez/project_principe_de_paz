<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}

        if($this->session->userdata('role') > 1){
			redirect(base_url());
		}
	}

    public function index() {
        $this->load->view('admin/index');
    }
}