<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_profile extends MX_Controller {

	public function index()
	{
		$user_id = $this->session->user_id;
		$data['profile'] = $this->global->getCond('profiles','*',['user_id'=>$user_id])->row_array();
		$this->slice->view('v_fr_profile', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$user_id = $this->session->user_id;

			$data_profile = [
				'fullname'	=> $this->input->post('fullname'),
				'address'	=> $this->input->post('address'),
				'phone'		=> $this->input->post('phone'),
				'email'		=> $this->input->post('email'),
				'gender'	=> $this->input->post('gender')
			];

			$update = $this->global->update('profiles',$data_profile,['user_id'=>$user_id]);

			if ($update == FALSE) {
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Failed update profile!';
	        } else {
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success update profile!';
	        }
	        echo json_encode($result);
		}
	}

}

/* End of file Fr_profile.php */
/* Location: ./application/modules/fr_profile/controllers/Fr_profile.php */