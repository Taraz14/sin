<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    private static $tb_user = 'tb_user';

    public function check($username, $pass)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $pass);
		return $this->db->get(self::$tb_user);
	}

}

/* End of file M_auth.php */
