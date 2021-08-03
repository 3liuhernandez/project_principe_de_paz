<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

    function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect(base_url());
		}
	}

    public function index() {
        $this->load->view('home_view');
    }
}