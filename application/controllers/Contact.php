<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("contactModel", "contact");
	}

	public function create()
	{
		header('Content-type: application/json');
		$data = json_decode(file_get_contents('php://input'), true);
		
		$data = [
			'fname' => $data['fname'],
			'lname' => $data['lname'],
			'email' => $data['email'],
			'message' => $data['message']
		];

		if ($this->contact->insert($data)) {
			$data = array('success' => 'contact Created.....');
			echo json_encode($data);
		} else {
			$data = array('error' => 'contact not Created.....');
			echo json_encode($data);
		}
	}

	public function store()
	{
		$data = $this->contact->get();
		echo json_encode($data);
	}


	public function edit($id)
	{
		$data = $this->contact->getid($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		header('Content-type: application/json');
		$data = json_decode(file_get_contents('php://input'), true);
		$data = [
			'fname' => $data['fname'],
			'lname' => $data['lname'],
			'email' => $data['email'],
			'message' => $data['message']
		];
		if ($this->contact->update($data, $id)) {
			$response = array('success' => 'contact Updated.....');
			echo json_encode($response);
		} else {
			$response = array('error' => 'contact not Updated.....');
			echo json_encode($response);
		}
	}
	public function delete($id)
	{
		try {
			$response = $this->contact->delete($id);
			$data = array(
				'message' => 'contact deleted.....',
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'contact not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
