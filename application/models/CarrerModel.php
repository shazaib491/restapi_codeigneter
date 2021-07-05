<?php

class  carrerModel extends CI_Model
{

	public function insert($data)
	{

		return $this->db->insert("career", $data);
		// print_r($this->db->error());
		// exit;
	}


	public function get()
	{
		$employee = $this->db->get("career");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("career", ['id' => $id]);
		return $admission->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("career", $data, ['id' => $id]);
	}
	public function delete($id)
	{
		if ($this->db->delete("career", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
