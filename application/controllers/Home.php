<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$data_header['active'] = 'user';
    	// $this->load->view('template/header', $data_header);
        $this->load->view('login');
        // $this->load->view('template/footer');
    }
}