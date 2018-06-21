<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_keranjang extends MX_Controller {

	public function index()
	{
		$this->slice->view('v_fr_keranjang');
	}

	public function add()
	{
		$this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$result['error'] = TRUE;
			$result['message'] = 'Woops';
		} else {
			$this->db->trans_begin();
		}
	}

	public function delete()
	{

	}

}

/* End of file Fr_keranjang.php */
/* Location: ./application/modules/fr_keranjang/controllers/Fr_keranjang.php */