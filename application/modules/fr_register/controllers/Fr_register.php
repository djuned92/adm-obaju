<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_register extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->slice->view('v_register');
	}

	public function add()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->slice->view('v_register');
		} else {
			$this->db->trans_begin();
		
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$options = [
			    'cost' => 11,
			    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password_hash = password_hash($password, PASSWORD_BCRYPT, $options);
			
			$data = [
				'username'	=> $username,
				'password'	=> $password_hash,
				'role_id'	=> 2,
				'created_at'=> date('Y-m-d H:i:s'),
			];

			$user_id = $this->global->create('users', $data, TRUE);

			$data_profile = [
				'user_id'	=> $user_id,
				'fullname'	=> $this->input->post('fullname'),
				'address'	=> $this->input->post('address'),
				'phone'		=> $this->input->post('phone'),
				'email'		=> $this->input->post('email'),
				'gender'	=> $this->input->post('gender'),
				'created_at'=> date('Y-m-d H:i:s'),
			];

			$this->global->create('profiles', $data_profile);
			
			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Failed registered!';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success registered!';
	        }
	        echo json_encode($result);
		}
	}

}

/* End of file Fr_register.php */
/* Location: ./application/modules/fr_register/controllers/Fr_register.php */