<?php

class Model_kategori extends CI_Model
{
	public function data_elegant()
	{
		return $this->db->get_where("tb_paket", array('nama' => 'elegant'));
	}


	public function data_best()
	{
		return $this->db->get_where("tb_paket", array('nama' => 'best'));
	}


	public function data_glamour()
	{
		return $this->db->get_where("tb_paket", array('nama' => 'glamour'));
	}


	public function data_exclusive()
	{
		return $this->db->get_where("tb_paket", array('nama' => 'exclusive'));
	}
}
