<?php

class  galleryModel extends CI_Model
{

	public function insert($data)
	{

		return $this->db->insert("gallery", $data);
		// print_r($this->db->error());
		// exit;
	}


	public function get()
	{
		$employee = $this->db->get("gallery");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("gallery", ['id' => $id]);
		return $admission->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("gallery", $data, ['id' => $id]);
	}
	public function delete($id)
	{
		if ($this->db->delete("gallery", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
