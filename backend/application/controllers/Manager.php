<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function index()
	{
		$data['content_view']="v_manager";
        $this->load->model('m_manager');
		$data['data_admin']=$this->m_manager->get_admin(3);
		$this->load->model('m_level');
		$data['data_level']=$this->m_level->get_level();
		$this->load->view('v_dashboard', $data, FALSE);
	}
	public function tambah_manager()
	{
        $this->form_validation->set_rules('username', 'Username', 'trim|required',
        array('required' => 'Username harus diisi'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required',
        array('required' => 'Password harus diisi'));
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required',
        array('required' => 'nama admin harus diisi'));
		$this->form_validation->set_rules('id_level', 'Id Level', 'trim|required',
        array('required' => 'Id Level harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('m_manager', 'lvl');
			$masuk=$this->lvl->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Manager'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Manager'), 'refresh');
		}
	}
		public function get_detail_admin($id_admin='')
		{
			$this->load->model('m_manager');
			$data_detail=$this->m_manager->detail_admin($id_admin);
			echo json_encode($data_detail);
		}

		public function update_manager()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required');
            $this->form_validation->set_rules('id_level', 'Id Level', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Manager'), 'refresh');
			} else{
				$this->load->model('m_manager');
				$proses_update=$this->m_manager->update_manager();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Manager'), 'refresh');
			} 
		}

		public function hapus_manager($id_admin)
	{
		$this->load->model('m_manager');
		$this->m_manager->hapus_manager($id_admin);
		redirect(base_url('index.php/Manager'), 'refresh');
	}
}
