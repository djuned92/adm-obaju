<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_in extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->slice->view('v_barang_in');	
	}

	public function add()
	{
		$this->form_validation->set_rules('produk', 'Produk', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->slice->view('f_barang_in');
		} else {
			$result['error']	= FALSE;
			$result['type']		= 'success';
			$result['message']	= 'Barang in success to created!';

			echo json_encode($result);
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('produk', 'Produk', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->slice->view('f_barang_in');
		} else {
			$result['error']	= FALSE;
			$result['type']		= 'success';
			$result['message']	= 'Barang in success to created!';

			echo json_encode($result);
		}
	}

	public function delete()
	{
		$result['error']	= FALSE;
		$result['type']		= 'success';
		$result['message']	= 'Barang in has been deleted!';

		echo json_encode($result);
	}
}

/* End of file Barang_in.php */
/* Location: ./application/modules/barang_in/controllers/Barang_in.php */