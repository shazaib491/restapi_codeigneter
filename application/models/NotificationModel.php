<?php

class  notificationModel extends CI_Model
{

	public function insert($data)
	{

		return $this->db->insert("notification", $data);
	}


	public function get()
	{
		$employee = $this->db->get("notification");
		return $employee->result();
	}
	public function getid($id)
	{
		$admission = $this->db->get_where("notification", ['id' => $id]);
		return $admission->row();
	}

	public function update($data, $id)
	{
		return $employee = $this->db->update("notification", $data, ['id' => $id]);
	}
	public function delete($id)
	{
		if ($this->db->delete("notification", ["id" => $id])) {
			return true;
		} else {
			return false;
		}
	}
}
