<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manager extends CI_Model {

	public function get_admin($parameter = null)
    {
      $this->db->join('level', 'level.id_level = admin.id_level');
      if(!empty($parameter)) {
        $this->db->where('admin.id_level', $parameter);
      }
      return $this->db->get('admin')->result();

    }

     public function masuk_db()
  {
    $data_admin=array(
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'nama_admin'=>$this->input->post('nama_admin'),
      'id_level'=>$this->input->post('id_level'),
    );
    $ql_masuk=$this->db->insert('admin', $data_admin);
    return $ql_masuk;
  }
  public function detail_admin($id_admin='')
  {
  return $this->db->where('id_admin', $id_admin)->get('admin')->row();
  }

   public function update_manager()
  {
    $dt_up_manager=array(
     'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'nama_admin'=>$this->input->post('nama_admin'),
      'id_level'=>$this->input->post('id_level'),

    );
  return $this->db->where('id_admin',$this->input->post('id_admin'))->update('admin', $dt_up_manager);
  }
  public function hapus_manager($id_admin)
  {
    $this->db->where('id_admin', $id_admin);
     return $this->db->delete('admin');
  }

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */