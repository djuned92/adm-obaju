<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->is_login();
		$this->load->library('upload');
	}

	private function unlink_image($id)
	{
		$image = $this->global->getCond('tm_produk','*',['id' => $id])->row_array();
		foreach (json_decode($image['image']) as $key => $value) {
			$path_image = $_SERVER['DOCUMENT_ROOT']. '/adm-obaju/assets/images/product/' . $value;
			// dd($path_image);
			if(file_exists($path_image)) {
				unlink($path_image);
			}
		}
	}

	public function index()
	{
		$this->functions->check_access($this->session->role_id, $this->uri->segment(1)); // access read
		$data['priv'] = $this->functions->check_priv($this->session->role_id, $this->uri->segment(1)); // for button show and hide
		
		$data['produk'] = $this->global->getJoin('tm_produk','tm_produk.*, tm_kategori.kategori',
			['tm_kategori'=>'tm_produk.kategori_id = tm_kategori.id'])->result_array();

		$this->slice->view('v_produk', $data);	
	}

	public function add()
	{
		$this->functions->check_access2($this->session->role_id, $this->uri->segment(1), $this->uri->segment(2));
		$this->form_validation->set_rules('produk', 'Produk', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$kategori = $this->global->get('tm_kategori','tm_kategori.id, tm_kategori.kategori as text',
									['text'=>'ASC'])->result_array();
			$data['kategori'] = json_encode($kategori);
			$this->slice->view('f_produk',$data);
		} else { 
			$this->db->trans_begin();
			
			$count_foto = count(array_filter($_FILES['userfiles']['name']));
			for($i = 0; $i < $count_foto; $i++) {
				$_FILES['userfile']['name']     = $_FILES['userfiles']['name'][$i];
                $_FILES['userfile']['type']     = $_FILES['userfiles']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['userfiles']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['userfiles']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['userfiles']['size'][$i];

				$config['upload_path'] 		= './assets/images/product/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['max_size']      	= 1024 * 3;
				$config['encrypt_name']		= TRUE;

				$this->upload->initialize($config);
				if($this->upload->do_upload('userfile')) {
					$data_foto[$i]	= $this->upload->data('file_name');
				}
			}

			$data_produk = [
				'kategori_id'	=> $this->input->post('kategori_id'),
				'produk'		=> $this->input->post('produk'),
				'detail_produk'	=> $this->input->post('detail_produk'),
				'image'			=> json_encode($data_foto),
				'harga'			=> $this->input->post('harga'),
				'disc'			=> (!empty($this->input->post('disc'))) ? $this->input->post('disc') : NULL,
				'created_at'	=> date('Y-m-d H:i:s')
			];

			$this->global->create('tm_produk',$data_produk);

			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Produk fail to created!';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Produk success to created!';
	        }

			echo json_encode($result);
		}
	}

	public function update()
	{
		$this->functions->check_access2($this->session->role_id, $this->uri->segment(1), $this->uri->segment(2));
		$this->form_validation->set_rules('produk', 'Produk', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$id = decode($this->uri->segment(3));
			
			$kategori = $this->global->get('tm_kategori','tm_kategori.id, tm_kategori.kategori as text',
									['text'=>'ASC'])->result_array();
			$data['kategori'] = json_encode($kategori);
			
			$data['produk'] = $this->global->getCondJoin('tm_produk','tm_produk.*, tm_kategori.kategori',
							['tm_produk.id'=>$id],
							['tm_kategori'=>'tm_produk.kategori_id = tm_kategori.id'])->row_array();
			$this->slice->view('f_produk',$data);
		} else {
			$this->db->trans_begin();

			$id = decode($this->input->post('id'));
			$image = count(array_filter($_FILES['userfiles']['name']));
			if(empty($image)) {
				$data_produk = [
					'kategori_id'	=> $this->input->post('kategori_id'),
					'produk'		=> $this->input->post('produk'),
					'detail_produk'	=> $this->input->post('detail_produk'),
					'harga'			=> $this->input->post('harga'),
					'disc'			=> (!empty($this->input->post('disc'))) ? $this->input->post('disc') : NULL,
					'created_at'	=> date('Y-m-d H:i:s')
				];

				$this->global->update('tm_produk',$data_produk,['id'=>$id]);
			} else {
				$count_foto = count(array_filter($_FILES['userfiles']['name']));
				// dd($count_foto);
				for($i = 0; $i < $count_foto; $i++) {
					$_FILES['userfile']['name']     = $_FILES['userfiles']['name'][$i];
	                $_FILES['userfile']['type']     = $_FILES['userfiles']['type'][$i];
	                $_FILES['userfile']['tmp_name'] = $_FILES['userfiles']['tmp_name'][$i];
	                $_FILES['userfile']['error']    = $_FILES['userfiles']['error'][$i];
	                $_FILES['userfile']['size']     = $_FILES['userfiles']['size'][$i];

					$config['upload_path'] 		= './assets/images/product/';
					$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
					$config['max_size']      	= 1024 * 3;
					$config['encrypt_name']		= TRUE;

					$this->upload->initialize($config);
					if($this->upload->do_upload('userfile')) {
						$data_foto[$i]	= $this->upload->data('file_name');
					}
				}

				$data_produk = [
					'kategori_id'	=> $this->input->post('kategori_id'),
					'produk'		=> $this->input->post('produk'),
					'detail_produk'	=> $this->input->post('detail_produk'),
					'image'			=> json_encode($data_foto),
					'harga'			=> $this->input->post('harga'),
					'disc'			=> (!empty($this->input->post('disc'))) ? $this->input->post('disc') : NULL,
					'created_at'	=> date('Y-m-d H:i:s')
				];
				$this->unlink_image($id);
				$this->global->update('tm_produk',$data_produk,['id'=>$id]);
			}

			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Produk fail to updated!';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Produk success to upated!';
	        }

	        echo json_encode($result);

		}
	}

	public function delete()
	{
		$this->functions->check_access2($this->session->role_id, $this->uri->segment(1), $this->uri->segment(2));
		
		$id = decode($this->input->post('id'));

		if(!empty($id)) {
			$this->unlink_image($id);
			$this->global->delete('tm_produk', ['id' => $id]);

			$result['error']	= FALSE;
			$result['type']		= 'success';
			$result['message']	= 'Produk has been deleted!';
		} else {
			$result['error']	= TRUE;
			$result['type']		= 'success';
			$result['message']	= 'Produk fail to delete!';	
		}
		echo json_encode($result);
	}

}

/* End of file Product.php */
/* Location: ./application/modules/product/controllers/Product.php */