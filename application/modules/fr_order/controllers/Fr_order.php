<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_order extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$user_id = $this->session->user_id;
		$data['order'] = $this->global->getCond('tx_transaksi','*',['user_id'=>$user_id])->result_array();
		// dd($data);
		$this->slice->view('v_fr_order',$data);	
	}

	public function detail($id)
	{
		$data['order'] = $this->global->getCond('tx_transaksi','*',['id'=>$id])->row_array();
		$json_decode = json_decode($data['order']['detail_produk'], TRUE);
		// dd($json_decode);
		$this->slice->view('detail_fr_order',$data);
	}

	public function cetak($id)
	{
		$data['order'] = $this->global->getCond('tx_transaksi','*',['id'=>$id])->row_array();
		$json_decode = json_decode($data['order']['detail_produk'], TRUE);
		// dd($json_decode);
		$this->load->view('cetak',$data);
	}

}

/* End of file Fr_order.php */
/* Location: ./application/modules/fr_order/controllers/Fr_order.php */