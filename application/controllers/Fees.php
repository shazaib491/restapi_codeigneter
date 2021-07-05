<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("feesModel", "fees");
	}

	public function create()
	{
		header('Content-type: application/json');
		$data = json_decode(file_get_contents('php://input'), true);
		
		$data = [
			'coursename' => $data['coursename'],
			'duration' => $data['duration'],
			'price' => $data['price'],
			'date' => $data['date'],
			'short_description' => $data['short_description']
		];

		if ($this->fees->insert($data)) {
			$data = array('success' => 'fees Created.....');
			echo json_encode($data);
		} else {
			$data = array('error' => 'fees not Created.....');
			echo json_encode($data);
		}
	}

	public function store()
	{
		$data = $this->fees->get();
		echo json_encode($data);
	}


	public function edit($id)
	{
		$data = $this->fees->getid($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		header('Content-type: application/json');
		$data = json_decode(file_get_contents('php://input'), true);
		$data = [
			'coursename' => $data['coursename'],
			'duration' => $data['duration'],
			'price' => $data['price'],
			'date' => $data['date'],
			'short_description' => $data['short_description']
		];
		if ($this->fees->update($data, $id)) {
			$response = array('success' => 'fees Updated.....');
			echo json_encode($response);
		} else {
			$response = array('error' => 'fees not Updated.....');
			echo json_encode($response);
		}
	}
	public function delete($id)
	{
		try {
			$response = $this->fees->delete($id);
			$data = array(
				'message' => 'fees deleted.....',
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'fees not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
