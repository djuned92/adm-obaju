<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_pembayaran extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->is_login();
	}

	public function index()
	{
		$this->functions->check_access($this->session->role_id, $this->uri->segment(1)); // access read
		$data['priv'] = $this->functions->check_priv($this->session->role_id, $this->uri->segment(1)); // for button show and hide
		$data['transaksi'] = $this->global->get('tx_transaksi')->result_array();
		// dd(json_decode($data['transaksi'][0]['detail_pembayaran']));
		// dd(json_decode($data['transaksi'][0]['detail_pembayaran'], TRUE));
		$this->slice->view('v_validasi_pembayaran',$data);
	}

	public function update()
	{
		// dd($_POST);
		$id = $this->input->post('id');

		$data_transaksi = [
			'status' => $this->input->post('status'),
		];

		$this->global->update('tx_transaksi', $data_transaksi, ['id'=>$id]);
		// dd($update);
		$result['error']	= FALSE;
		$result['type']		= 'success';
		$result['message']	= 'Validasi pembayaran success to updated!';

		echo json_encode($result);
	}

}

/* End of file Validasi_pembayaran.php */
/* Location: ./application/modules/validasi_pembayaran/controllers/Validasi_pembayaran.php */