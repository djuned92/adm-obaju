<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_payment extends MX_Controller {

	public function index()
	{
		$user_id = $this->session->user_id;
		$data['total_harga'] = $this->get_total_harga($user_id);
		$this->slice->view('v_fr_payment',$data);
	}

	public function add()
	{
		$this->load->library('upload');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->db->trans_begin();
			
			$config['upload_path'] 		= './assets/images/transfer/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']      	= 1024 * 3;
			$config['encrypt_name']		= TRUE;

			$this->upload->initialize($config);
			if(! $this->upload->do_upload()) {
				$result['error'] = $this->upload->display_errors();
			} else {
				$user_id = $this->session->user_id;
				$profile = $this->global->getCond('profiles','*',['user_id'=>$user_id])->row_array();
				$keranjang = $this->global->getCond('keranjang','*',['user_id'=>$user_id])->row_array();

				$produk = $this->global->getCondJoin('tm_produk', 'tm_produk.*, tm_kategori.kategori',['tm_produk.id'=>$keranjang['produk_id']],['tm_kategori'=>'tm_produk.kategori_id = tm_kategori.id'])->row_array();

				$data_detail_pembayaran = [
					'nama'				=> $this->input->post('nama'),
					'tgl_transfer'		=> $this->input->post('tgl_transfer'),
					'bukti_transfer'	=> $this->upload->data('file_name'),
				];

				$data_detail_produk = [
					'kategori' => $produk['kategori'],
					'produk'	=> $produk['produk'],
					'detail_produk' => $produk['detail_produk'],
				];

				$data_transaksi = [
					'detail_produk' 	=> json_encode($data_detail_produk),
					'detail_pembayaran' => json_encode($data_detail_pembayaran),
					'fullname'			=> $profile['fullname'],
					'address'			=> $profile['address'],
					'phone'				=> $profile['phone'],
					'email'				=> $profile['email'],
					'created_at'		=> date('Y-m-d H:i:s'),
				];
				// dd($data_transaksi);
				$this->global->create('tx_transaksi',$data_transaksi);
				$this->global->delete('keranjang',['user_id'=>$user_id]);
			}

			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Payment fail to created!';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Payment success to created!';
	        }
			
			echo json_encode($result);
		}
	}

	public function get_total_harga($user_id) 
	{
		$q = $this->global->getCond('keranjang','*',['user_id'=>$user_id]);

		$total_harga = 0;
		foreach($q->result_array() as $key => $value) {
			if(empty($value['disc'])) {
				$total_harga += $value['jumlah'];
			} else {
				$total_harga += $value['jumlah'] * $value['disc'];
			}
		}
		return $total_harga;	
	}

}

/* End of file Fr_payment.php */
/* Location: ./application/modules/fr_payment/controllers/Fr_payment.php */