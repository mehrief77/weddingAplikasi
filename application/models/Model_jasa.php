<?php

class Model_jasa extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_jasa');
    }


    public function tambah_jasa($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function edit_jasa($where, $table)
    {
        return $this->db->get_where($table, $where);
    }


    // public function update_data($where, $data, $table)
    public function update_jasa($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }


    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_jasa($id)
    {
        $result = $this->db->where('id', $id)->get('tb_jasa');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function detail_jasa_admin($id)
    {
        $result = $this->db->where('id', $id)->get('tb_jasa');
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
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('akun_ig', $keyword);
        $this->db->or_like('gambar', $keyword);
        $this->db->or_like('no_ktp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }


    public function ambil_id_invoice_p_t($id_wo)
    {
        $this->db->select('tb_invoice.id as id_invoice, tb_customer.nama, tb_customer.alamat, tb_customer.no_telp, tb_customer.email, tb_paket.harga, tb_pesanan.tgl_acara, tb_pembayaranwo.nominal_tf, tb_pembayaran.bkt_transaksi, tb_pembayaranwo.id_pesan');

        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
        $this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
        $this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id', 'left');
        $this->db->join('tb_pembayaran', 'tb_invoice.id = tb_pembayaran.id_invoice', 'left');
        $this->db->join('tb_pembayaranwo', 'tb_pesanan.id = tb_pembayaranwo.id_pesan', 'left');
        $this->db->where('tb_paket.id_wo', $id_wo);
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }
}
