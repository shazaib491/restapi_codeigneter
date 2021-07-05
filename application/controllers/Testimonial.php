<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("testimonialModel", "testimonial");
	}
	public function index()
	{
		$this->load->view('admission_message', array('error' => ' '));
	}



	public function create()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'photo' => $this->upload->data('file_name'),
				'content' => $this->input->post('content'),
				'name' => $this->input->post('name'),
			];
			if ($this->testimonial->insert($data)) {
				$data = array('success' => 'testimonial Added.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'testimonial not Added....',

				);
				echo json_encode($data);
			}
		}
	}


	public function store()
	{

		$data = $this->testimonial->get();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$data = $this->testimonial->getid($id);
		echo json_encode($data);
	}


	public function update($id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'photo' => $this->upload->data('file_name'),
				'content' => $this->input->post('content'),
				'name' => $this->input->post('name'),
			];

			if ($this->testimonial->update($data, $id)) {
				$data = array('success' => 'testimonail updated.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'testimonail not updated.....',
				);
				echo json_encode($data);
			}
		}
	}

	public function delete($id)
	{
		try {
			$response = $this->testimonial->delete($id);

			$data = array(
				'message' => 'testimonail deleted.....',
				'response' => $response
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'testimonail not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
