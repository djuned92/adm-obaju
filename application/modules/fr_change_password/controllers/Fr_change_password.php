<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_change_password extends MX_Controller {

	public function index()
	{
		$this->slice->view('v_fr_change_password');
	}

	public function update()
	{
		$this->form_validation->set_rules('old_password', 'old_password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$user_id = $this->session->user_id;
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');

			$options = [
			    'cost' => 11,
			    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
			];
			$password_hash = password_hash($old_password, PASSWORD_BCRYPT, $options);
			$user = $this->global->getCond('users','*',['id'=>$user_id])->row_array();

			if(password_verify($old_password, $user['password'])) {
				$data_user = [
					'password'	=> $password_hash,
				];
				
				$this->global->update('users',$data_user, ['id'=>$user_id]);

				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success updated password!';
			} else {
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Failed updated password!';
			}

	        echo json_encode($result);
		}
	}
}

/* End of file Fr_change_password.php */
/* Location: ./application/modules/fr_change_password/controllers/Fr_change_password.php */