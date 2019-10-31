<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
  }

	public function proses(){
    $this->load->model('m_login');
    $username = $this->input->get('username');
    		$password = $this->input->get('password');
    		$where = array(
    			'username' => $username,
    			'password' => $password
    			);
    		$cek = $this->m_login->cek_login("pelanggan",$where)->num_rows();
    		if($cek > 0){

    			$data_session = array(
    				'username' => $username,
    				'status' => "login"
    				);

    			$this->session->set_userdata($data_session);

    			redirect(base_url("index.php/Home"));
    		}else{
    			$this->session->set_flashdata('pesan', 'Password atau Username Tidak Benar!');
          		redirect('Home');
    		}
  }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */