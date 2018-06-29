<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_contact extends MX_Controller {

	public function index()
	{
		$this->slice->view('v_fr_contact');
	}

}

/* End of file Fr_contact.php */
/* Location: ./application/modules/fr_contact/controllers/Fr_contact.php */