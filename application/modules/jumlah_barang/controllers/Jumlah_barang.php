<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlah_barang extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->slice->view('v_jumlah_barang');	
	}

}

/* End of file Jumlah_barang.php */
/* Location: ./application/modules/jumlah_barang/controllers/Jumlah_barang.php */