<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_level extends CI_Model {

	public function get_level()
  {
      $data_level= $this->db->get('level')->result();
      return $data_level;
  }

}

/* End of file m_level.php */
/* Location: ./application/models/m_level.php */