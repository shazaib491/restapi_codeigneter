<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("carouselModel", "carousel");
	}
	public function index()
	{
		$this->load->view('admission_message', array('error' => ' '));
	}



	public function create()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('image');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'image' => $this->upload->data('file_name'),
			];

			if ($this->carousel->insert($data)) {
				$data = array('success' => 'Image Added.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'Image not Added....',

				);
				echo json_encode($data);
			}
		}
	}


	public function store()
	{

		$data = $this->carousel->get();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$data = $this->carousel->getid($id);
		echo json_encode($data);
	}


	public function update($id)
	{
		$config['upload_path']= './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('image');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'image' => $this->upload->data('file_name'),
			];

			if ($this->carousel->update($data, $id)) {
				$data = array('success' => 'Image updated.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'Image not updated.....',
				);
				echo json_encode($data);
			}
		}
	}

	public function delete($id)
	{
		try {
			$response = $this->carousel->delete($id);

			$data = array(
				'message' => 'Image deleted.....',
				'response' => $response
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'Image not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
