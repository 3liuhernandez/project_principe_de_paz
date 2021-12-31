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

	public function users() {
		$this->load->view('admin/users');
	}

	public function users_admin() {
		$this->load->view('admin/users/admin');
	}

	public function users_normal() {
		$this->load->view('admin/users/normal/index');
	}
	
	public function members() {
		$this->load->view('admin/members/general');
	}
	
	public function leaders() {
		$this->load->view('admin/members/leaders');
	}

	public function discipleship($nivel) {
		$data = [];
		$data['nivel'] = $nivel;

		$this->load->view('admin/discipleship/level',$data);
	}

	public function teams() {
		$this->load->view('admin/teams');
	}
}