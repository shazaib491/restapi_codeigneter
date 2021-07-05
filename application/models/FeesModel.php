<?php

class  feesModel extends CI_Model
{

	public function insert($data)
	{

		return $this->db->insert("feesStructure", $data);
	}


	public function get()
	{
		$employee = $this->db->get("feesStructure");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("feesStructure", ['id' => $id]);
		return $admission->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("feesStructure", $data, ['id' => $id]);
	}
	public function delete($id)
	{
		if ($this->db->delete("feesStructure", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
