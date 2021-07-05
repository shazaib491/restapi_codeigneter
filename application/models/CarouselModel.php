<?php

class  carouselModel extends CI_Model
{

	public function insert($data)
	{

		return $this->db->insert("carousel", $data);
		// print_r($this->db->error());
		// exit;
	}


	public function get()
	{
		$employee = $this->db->get("carousel");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("carousel", ['id' => $id]);
		return $admission->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("carousel", $data, ['id' => $id]);
	}
	public function delete($id)
	{
		if ($this->db->delete("carousel", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
