<?php

class Model_paket extends CI_Model
{
    public function tampil_data($id_wo)
    {
        return $this->db->where('id_wo', $id_wo)->get('tb_paket');
    }

    public function tambah_paket($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function detail_paket($id)
    {
        $result = $this->db->where('id', $id)->get('tb_paket');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function edit_paket($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_paket($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }


    public function hapus_paket($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function find($id)
    {
        $result = $this->db->where('id', $id)
            ->limit(1)
            ->get('tb_paket');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
