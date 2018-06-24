<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_payment extends MX_Controller {

	public function index()
	{
		$this->slice->view('v_fr_payment');
	}

}

/* End of file Fr_payment.php */
/* Location: ./application/modules/fr_payment/controllers/Fr_payment.php */