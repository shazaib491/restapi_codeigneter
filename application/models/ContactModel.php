<?php

class  ContactModel extends CI_Model
{

	public function insert($data)
	{
		return $this->db->insert("contactus", $data);
	}


	public function get()
	{
		$employee = $this->db->get("contactus");
		return $employee->result();
	}
	public function getid($id)
	{
		$contactus = $this->db->get_where("contactus", ['id' => $id]);
		return $contactus->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("contactus", $data, ['id' => $id]);
	}
	public function delete($id)
	{
		if ($this->db->delete("contactus", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
