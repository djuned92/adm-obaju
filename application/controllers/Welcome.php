<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// function get
		$data = $this->global->get('roles')->result_array();
		
		// function getCond 
		$data = $this->global->getCond('menus','*',
							// ['id'=>[8,9,20]]) // where_in
							['id'=>(object)['<', 9]]) // opreator <
							// ['menu'=>(object)['LIKE','Menu']]) // opreator LIKE
							// ['menu'=>'List User']) // where
							->result_array();
		
		// function getJoin
		$data = $this->global->getJoin(
								'users as u',
								'u.username, p.fullname, p.gender, p.address', 
								['profiles as p'=>'p.user_id = u.id'],
								['u.id'=>'ASC'])->result_array();
		
		// function getLastRecord
		// $data = $this->global->getLastRecord('menus')->row_array();
		
		dd($data);
	}

	public function test_array()
	{
		$array_1 = [
			'0'	=> ['in'=>'test 1'],
			'1'	=> ['in'=>'test 2'],
		];

		$array_2 = [
			'0'	=> [
				'title' => 'Ini title 1',
				'content'=> 'ini content 1'
			],
			'1'	=> [
				'title' => 'ini title 2',
				'content'=> 'ini title 2'
			],
		];

		$data = [];
		foreach($array_2 as $key => $value)
		{
			foreach ($array_1 as $key1 => $value1) {
				if($key == $key1) {
					$data[$key]['title'] = $value['title'];
					$data[$key]['content'] = $value['content'];
					$data[$key]['in'] = $value1['in'];
				}
			}
		}

		dd($array_1, $array_2,$data);
	}

	public function obaju()
	{
		$this->slice->view('obaju');
	}
}
