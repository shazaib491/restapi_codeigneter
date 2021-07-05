<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admission extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model("admissionModel", "admit");
	}
	public function index()
	{
		$this->load->view('admission_message', array('error' => ' '));
	}

	

	public function create()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$this->load->library('upload', $config);

		$this->upload->do_upload('photo');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'uname' => $this->input->post('uname'),
				'gender' => $this->input->post('gender'),
				'photo' => $this->upload->data('file_name'),
				'ftname' => $this->input->post('ftname'),
				'dob' => $this->input->post('dob'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'country' => $this->input->post('country'),
				'10percent' => $this->input->post('10percent'),
				'12percent' => $this->input->post('12percent'),
				'phone' => $this->input->post('phone'),
				'admissions' => $this->input->post('admissions'),
			];

			if ($this->admit->insertAdmission($data)) {
				$data = array('success' => 'Admission Created.....');
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'Admission not Created.....',

				);
				echo json_encode($data);
			}
		}
	}


	public function store()
	{

		$data = $this->admit->getdata();
		echo json_encode($data);
	}

	public function edit($id)
	{
		$data = $this->admit->getid($id);
		echo json_encode($data);
	}


	public function update($id)
	{
		$config['upload_path']  = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = 100;
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		$data = array('upload_data' => $this->upload->data());
		if (!$this->upload->do_upload('photo')) {
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			$data = [
				'uname' => $this->input->post('uname'),
				'gender' => $this->input->post('gender'),
				'photo' => $this->upload->data('file_name'),
				'ftname' => $this->input->post('ftname'),
				'dob' => $this->input->post('dob'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'country' => $this->input->post('country'),
				'10percent' => $this->input->post('10percent'),
				'12percent' => $this->input->post('12percent'),
				'phone' => $this->input->post('phone'),
				'admissions' => $this->input->post('admissions'),
			];

			if ($this->admit->updateAdmission($data, $id)) {
				$data = array('success' => 'Admission updated.....');
				print_r($_FILES);exit;
				echo json_encode($data);
			} else {
				$data = array(
					'error' => 'Admission not updated.....',
				);
				echo json_encode($data);
			}
		}
	}

	public function delete($id)
	{
		try {
			$response = $this->admit->deleteAdmission($id);

			$data = array(
				'message' => 'Admission deleted.....',
				'response'=>$response
			);
			echo json_encode($data);
		} catch (Exception $exception) {
			$data = array(
				'message' => 'Admission not deleted.....',
			);
			echo json_encode($data);
		}
	}
}
