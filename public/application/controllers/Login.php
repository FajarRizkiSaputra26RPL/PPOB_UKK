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
    $username = $this->input->post('username');
    		$password = $this->input->post('password');
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
    			$dt['status']=1;
				echo json_encode($dt);
    			// redirect(base_url("index.php/Home"));
    		}else{
    			// $this->session->set_flashdata('pesan', 'Password atau Username Tidak Benar!');
       //    		redirect('Home');
    			$dt['status']=0;
				echo json_encode($dt);
    		}
  }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */