<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_product extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['kategori'] 	= $this->get_kategori()->result_array();
		$data['total_produk'] = $this->db->count_all('tm_produk');
		$data['produk'] 	= $this->global->get('tm_produk','*',['produk'=>'ASC'])->result_array();

		$this->slice->view('v_fr_product',$data);
	}

	public function kategori($id)
	{
		$data['kategori'] 	= $this->get_kategori()->result_array();
		$data['total_produk'] = $this->db->count_all('tm_produk');
		$data['produk'] 	= $this->global->getCond('tm_produk','*',['kategori_id'=>$id],['produk'=>'ASC'])->result_array();

		$this->slice->view('v_fr_product',$data);
	}

	public function detail($id)
	{
		$data['kategori'] 	= $this->get_kategori()->result_array();
		$data['total_produk'] = $this->db->count_all('tm_produk');
		$data['produk'] = $this->global->getCond('tm_produk','*',['id'=>$id])->row_array();
		$this->slice->view('v_fr_product_detail',$data);	
	}

	public function get_kategori()
	{
		$q = $this->db->select('k.*, COUNT(p.kategori_id) as total_produk_kategori')
						->from('tm_kategori as k')
						->join('tm_produk as p','k.id = p.kategori_id','LEFT')
						->group_by('p.kategori_id')
						->order_by('k.kategori','ASC')
						->get();
		return $q;
	}

}

/* End of file Fr_product.php */
/* Location: ./application/modules/fr_product/controllers/Fr_product.php */