<?php

class Model_kategori extends CI_Model
{
	public function data_electrical()
	{
		return $this->db->get_where("tb_jasa", array('kategori' => 'Electrical'));
	}


	public function data_elektronik()
	{
		return $this->db->get_where("tb_jasa", array('kategori' => 'elektronik'));
	}


	public function data_perkakas()
	{
		return $this->db->get_where("tb_jasa", array('kategori' => 'perkakas'));
	}


	public function data_bangunan()
	{
		return $this->db->get_where("tb_jasa", array('kategori' => 'tukang bangunan'));
	}


	public function data_ledeng()
	{
		return $this->db->get_where("tb_jasa", array('kategori' => 'tukang ledeng'));
	}
}
