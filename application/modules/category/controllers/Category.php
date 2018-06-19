<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->functions->is_login();
	}

	public function index()
	{
		$this->functions->check_access($this->session->role_id, $this->uri->segment(1)); // access read
		$data['priv']		= $this->functions->check_priv($this->session->role_id, $this->uri->segment(1)); // for button show and hide
		
		$data['kategori'] = $this->global->get('tm_kategori','*',['id'=>'ASC'])->result_array();
		$this->slice->view('v_kategori', $data);
	}

	public function add()
	{
		$this->functions->check_access2($this->session->role_id, $this->uri->segment(1), $this->uri->segment(2));
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->slice->view('f_kategori');
		} else {
			$data = [
				'kategori' => $this->input->post('kategori'),
				'created_at'=> date('Y-m-d H:i:s'),
			];

			$create = $this->global->create('tm_kategori',$data);
			if($create == FALSE) {
				$result['error'] 	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Kategori fail to created!'; 
			} else {
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Kategori success to created!';
			}
			echo json_encode($result);
		}	
	}

	public function update()
	{
		$this->functions->check_access2($this->session->role_id, $this->uri->segment(1), $this->uri->segment(2));
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$id 						= decode($this->uri->segment(3));
			$data['kategori'] 	= $this->global->getCond('tm_kategori', '*', ['id' => $id])->row_array();
			(isset($data['kategori'])) ? $data['kategori'] : show_404();

			$this->slice->view('f_kategori',$data);
		} else {
			$this->db->trans_begin();
			
			$data = [
				'kategori'	=> $this->input->post('kategori'),
			];
			$id = decode($this->input->post('id'));

			$this->global->update('tm_kategori', $data, ['id' => $id]);

			if ($this->db->trans_status() === FALSE) {
	            $this->db->trans_rollback();
				$result['error']	= TRUE;
				$result['type']		= 'error';
				$result['message']	= 'Kategori fail to updated!';
	        } else {
	        	$this->db->trans_commit();
				$result['error']	= FALSE;
				$result['type']		= 'success';
				$result['message']	= 'Kategori success to upated!';
	        }
			echo json_encode($result);
		}
	}	

	public function delete()
	{
		$this->functions->check_access2($this->session->role_id, $this->uri->segment(1), $this->uri->segment(2));
		
		$id = decode($this->input->post('id'));
		$this->global->getCond('tm_kategori','*',['id'=>$id])->row_array();

		if(!empty($id)) {
			$result['error']	= FALSE;
			$result['type']		= 'success';
			$result['message']	= 'Kategori has been deleted!';
			$this->global->delete('tm_kategori', array('id' => $id));
		} else {
			$result['error']	= TRUE;
			$result['type']		= 'success';
			$result['message']	= 'Kategori fail to delete!';	
		}
		echo json_encode($result);
	}
}

/* End of file Category.php */
/* Location: ./application/modules/category/controllers/Category.php */