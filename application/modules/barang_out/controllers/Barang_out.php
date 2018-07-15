<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_out extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->slice->view('v_barang_out');	
	}

}

/* End of file Barang_out.php */
/* Location: ./application/modules/barang_out/controllers/Barang_out.php */