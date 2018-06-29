<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_about extends MX_Controller {

	public function index()
	{
		$this->slice->view('v_fr_about');
	}

}

/* End of file Fr_about.php */
/* Location: ./application/modules/fr_about/controllers/Fr_about.php */