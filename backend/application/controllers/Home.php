<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	public function index()
	{
		if($this->session->userdata('login_status') == TRUE){

		$data['content_view'] = 'v_content';
		$this->load->model('m_home');
		$this->load->view('v_dashboard', $data);
	} 
	else
	{
		redirect('index.php/login');
	}
}
}