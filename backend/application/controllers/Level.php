<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	public function index()
	{
		$data['content_view']="v_level";
    	$this->load->model('m_level');
    	$data['data_level']=$this->m_level->get_level();
		$this->load->view('v_dashboard', $data);
	}

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */