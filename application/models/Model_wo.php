<?php

class Model_wo extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_wo');
    }

    // public function tampil_data2()
    // {
    //     $this->db->select('tb_wo.gambar, tb_wo.nama_wo, tb_pesanan.status_pesananbywo');

    //     $this->db->from('tb_wo');
    //     $this->db->join('tb_pesanan', 'tb_paket.id = tb_pesanan.id_paket', 'left');
    //     $this->db->join('tb_paket', 'tb_wo.id = tb_paket.id_wo', 'left');
    //     $this->db->where('tb_wo.id', '');
    //     return $this->db->get()->result();
    // }

    public function tambah_jasa($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function edit_wo($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    public function update_wo($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }


    public function hapus_wo($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_wo($id)
    {
        $result = $this->db->where('id', $id)->get('tb_wo');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function detail_kelas_paket($id)
    {
        $result = $this->db->where('id_wo', $id)->get('tb_paket');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function detail_wo_admin($id)
    {
        $result = $this->db->where('id', $id)->get('tb_wo');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function find($id)
    {
        $result = $this->db->where('id', $id)
            ->limit(1)
            ->get('tb_jasa');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function update_status_t($id_invoice, $id_tkg, $status)
    {
        $builder = $this->db->table('tb_invoice_detail');
        $data = [
            'status' => $status,
        ];

        $builder->where('id_invoice', $id_invoice);
        $builder->where('id_tkg', $id_tkg);
        $builder->update($data);
    }


    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_wo');
        $this->db->like('nama_wo', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('akun_ig', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get()->result();
    }
}
