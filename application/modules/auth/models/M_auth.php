<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function check_login($username)
	{
		$query = $this->db->select('u.*, p.fullname')
						->from('users as u')
						->join('profiles as p','p.user_id = u.id','LEFT')
						->where('username',$username)
						->get();
		
		if($query->num_rows() > 0)
            $result = $query->row_array();
        else
            $result = array();

        return $result;

	}
}

/* End of file M_auth.php */
/* Location: ./application/modules/auth/models/M_auth.php */