<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("notificationModel", "notify");
	}

	public function create()
	{
		header('Content-type: application/json');
		$data = json_decode(file_get_contents('php://input'), true);
		
		$data = [
			'title' => $data['title'],
			'content' => $data['content']
		];
		if ($this->notify->insert($data)) {
			$data = array('success' => 'notification Created.....');
			echo json_encode($data);
		} else {
			$data = array('error' => 'notification not Created.....');
			echo json_encode($data);
		}
	}

	public function store()
	{
		$data = $this->notify->get();
		echo json_encode($data);
	}


	public function edit($id)
	{
		$data = $this->notify->getid($id);
		echo json_encode($data);
	}

	public function update($id)
	{
		header('Content-type: application/json');
		$data = json_decode(file_get_contents('php://input'), true);
		$data = [
			'title' => $data['title'],
			'content' => $data['content']
		];
		if ($this->notify->update($data, $id)) {
			$response = array('success' => 'notification Updated.....');
			echo json_encode($response);
		} else {
			$response = array('error' => 'notification not Updated.....');
			echo json_encode($response);
		}
	}
	public function delete($id)
	{
		try {
			$response = $this->notify->delete($id);

			$data = array(
				'message' => 'notify deleted.....',
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'notify not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
