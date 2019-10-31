<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_login extends CI_Model
  {
    public function user_check()
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $query = $this->db->join('level', 'level.id_level = admin.id_level')
                        ->where('username', $username)
                        ->where('password', $password)
                        ->get('admin');

      if($query->num_rows() > 0)
      {
        $data_login = $query->row();
        $data_session = array(
                          'username'  => $username,
                          'id_level'     => $data_login->id_level,
                          'login_status'  => TRUE

                        );

        $this->session->set_userdata($data_session);

        return true;
      }
      else
      {
        return false;
      }
    }
  }
?>
