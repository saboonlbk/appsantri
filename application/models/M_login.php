<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function get_user($username, $password)
	{
		return $this->db->get_where('user',array('username'=>$username, 'password'=>$password));
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */