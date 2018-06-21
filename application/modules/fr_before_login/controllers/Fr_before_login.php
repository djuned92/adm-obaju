<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_before_login extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->slice->view('v_fr_before_login');	
	}

}

/* End of file Fr_before_login.php */
/* Location: ./application/modules/fr_before_login/controllers/Fr_before_login.php */