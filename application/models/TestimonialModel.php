<?php

class  testimonialModel extends CI_Model
{

	public function insert($data)
	{

		return $this->db->insert("testimonial", $data);
		// print_r($this->db->error());
		// exit;
	}


	public function get()
	{
		$employee = $this->db->get("testimonial");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("testimonial", ['id' => $id]);
		return $admission->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("testimonial", $data, ['id' => $id]);
	}

	
	public function delete($id)
	{
		if ($this->db->delete("testimonial", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
