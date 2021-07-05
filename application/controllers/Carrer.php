<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("carrerModel", "carrer");
	}

	public function create()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|csv|docx|doc';
		$this->load->library('upload', $config);
		$this->upload->do_upload('resume');
		if (!$this->upload->do_upload('resume')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'dob' => $this->input->post('dob'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'alternatemobile' => $this->input->post('alternatemobile'),
				'qualification' => $this->input->post('qualification'),
				'cstatus' => $this->input->post('cstatus'),
				'location' => $this->input->post('location'),
				'resume' => $this->upload->data('file_name'),
			];

			if ($this->carrer->insert($data)) {
				$data = array('success' => 'Carrer Created.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'Carrer not Created.....',

				);
				echo json_encode($data);
			}
		}
	}


	public function store()
	{

		$data = $this->carrer->get();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$data = $this->carrer->getid($id);
		echo json_encode($data);
	}


	public function update($id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf|csv|docx|doc';
		$this->load->library('upload', $config);
		$this->upload->do_upload('resume');
		if (!$this->upload->do_upload('resume')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'dob' => $this->input->post('dob'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'alternatemobile' => $this->input->post('alternatemobile'),
				'qualification' => $this->input->post('qualification'),
				'cstatus' => $this->input->post('cstatus'),
				'location' => $this->input->post('location'),
				'resume' => $this->upload->data('file_name'),
			];

			if ($this->carrer->update($data, $id)) {
				$data = array('success' => 'Carrer updated.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'Carrer not updated.....',

				);
				echo json_encode($data);
			}
		}
	}

	public function delete($id)
	{
		try {
			$response = $this->carrer->delete($id);

			$data = array(
				'message' => 'Carrer deleted.....',
				'response' => $response
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'Carrer not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
