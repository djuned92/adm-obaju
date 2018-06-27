<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_keranjang extends MX_Controller {

	public function index()
	{
		$user_id = $this->session->user_id;
		$data['keranjang'] = $this->global->getCondJoin('keranjang','keranjang.*, tm_produk.produk, tm_produk.image',
			['user_id'=>$user_id],
			['tm_produk' => 'tm_produk.id = keranjang.produk_id'])->result_array();
		$data['total_keranjang'] = $this->get_keranjang_by_user($user_id);
		$data['total_harga'] = $this->get_total_harga($user_id);
		// dd($data);
		$this->slice->view('v_fr_keranjang',$data);
	}

	public function add()
	{
		$this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$result['error'] = TRUE;
			$result['message'] = 'Woops';
		} else {
			$this->db->trans_begin();
			
			$produk_id = $this->input->post('produk_id');
			$produk = $this->global->getCondJoin('tm_produk','tm_produk.*, tm_kategori.kategori',['tm_produk.id'=>$produk_id],['tm_kategori'=>'tm_kategori.id = tm_produk.kategori_id'])->row_array();

			$data_keranjang = [
				'user_id' 	=> $this->input->post('user_id'),
				'produk_id' => $produk_id,
				'kategori'	=> $produk['kategori'],
				'produk'	=> $produk['produk'],
				'detail_produk' => $produk['detail_produk'],
				'harga' 	=> $this->input->post('harga'),
				'qty' 		=> $this->input->post('qty'),
				'disc' 		=> empty($this->input->post('disc')) ? NULL : $this->input->post('disc'),
				'jumlah' 	=> empty($this->input->post('disc')) ? $this->input->post('harga') * $this->input->post('qty') : $this->input->post('harga') * $this->input->post('qty') * $this->input->post('disc'),
				'created_at'=> date('Y-m-d H:i:s')
			];

			$this->global->create('keranjang',$data_keranjang);

			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Add to cart fail!';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Success add to chart!';
	        }

		}
		echo json_encode($result);
	}

	public function delete($id)
	{
		$keranjang = $this->global->getCond('keranjang','*',['id'=>$id]);

		if($keranjang->num_rows() > 0) {
			$this->global->delete('keranjang', ['id' => $id]);

			$result['error']	= FALSE;
			$result['type']		= 'success';
			$result['message']	= 'Keranjang has been deleted!';
		} else {
			$result['error']	= TRUE;
			$result['type']		= 'success';
			$result['message']	= 'Keranjang fail to delete!';	
		}
		echo json_encode($result);
	}

	public function count_keranjang($user_id)
	{
		$total = $this->get_keranjang_by_user($user_id);

		$response['html'] = '<a href="'.base_url("fr_keranjang").'" class="btn btn-primary btn-xs">
								<i class="fa fa-shopping-cart"><span class="hidden-sm"> '.$total['total'].' items in cart</span></i>
							</a>';
		echo json_encode($response);
	}

	public function get_keranjang_by_user($user_id) 
	{
		$q = $this->db->select('count(user_id) as total')
					->from('keranjang')
					->where('user_id',$user_id)
					->get();
		return $q->row_array();
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

/* End of file Fr_keranjang.php */
/* Location: ./application/modules/fr_keranjang/controllers/Fr_keranjang.php */