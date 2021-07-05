<?php

class  AdmissionModel extends CI_Model
{

	public function insertAdmission($data)
	{

		return $this->db->insert("admission", $data);
	}


	public function getdata()
	{
		$employee = $this->db->get("admission");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("admission", ['id' => $id]);
		return $admission->row();
	}

	public function updateAdmission($data, $id)
	{
		return $employee = $this->db->update("admission", $data, ['id' => $id]);
	}
	public function deleteAdmission($id)
	{
		if ($this->db->delete("admission", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
