<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("galleryModel", "gallery");
	}
	public function index()
	{
		$this->load->view('admission_message', array('error' => ' '));
	}



	public function create()
	{
		$config['upload_path']= './uploads/';
		$config['allowed_types']= 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'photo' => $this->upload->data('file_name'),
				'videourl' => $this->input->post('videourl'),
			];
			if ($this->gallery->insert($data)) {
				$data = array('success' => 'gallery Added.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'gallery not Added....',

				);
				echo json_encode($data);
			}
		}
	}


	public function store()
	{

		$data = $this->gallery->get();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$data = $this->gallery->getid($id);
		echo json_encode($data);
	}


	public function update($id)
	{
		$config['upload_path']= './uploads/';
		$config['allowed_types']= 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'photo' => $this->upload->data('file_name'),
				'videourl' => $this->input->post('videourl'),
			];

			if ($this->gallery->update($data, $id)) {
				$data = array('success' => 'gallery updated.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'gallery not updated.....',
				);
				echo json_encode($data);
			}
		}
	}

	public function delete($id)
	{
		try {
			$response = $this->gallery->delete($id);

			$data = array(
				'message' => 'gallery deleted.....',
				'response' => $response
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'gallery not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
