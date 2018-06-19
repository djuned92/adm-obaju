<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->slice->view('v_fr_home');	
	}

}

/* End of file Fr_home.php */
/* Location: ./application/modules/fr_home/controllers/Fr_home.php */