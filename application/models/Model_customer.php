<?php

class Model_customer extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_customer');
    }

    public function tambah_customer($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_customer($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_customer($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }


    public function detail_customer($id_customer)
    {
        $result = $this->db->where('id_customer', $id_customer)->get('tb_customer');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }



    public function detail_customer_admin($id)
    {
        $result = $this->db->where('id_customer', $id)->get('tb_customer');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }


    public function update_status_c()
    {
        $status = $this->input->post('status_jasa');

        $getNama = $this->session->userdata('name');
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->where('nama', $getNama);
        $resultData = $this->db->get()->row_array();
        // $resultData = $this->input->post('id_invoice'); 
        // var_dump($resultData['id_invoice']);
        // var_dump($getNama);
        // var_dump($status);
        // die();
        $coba = array(
            'status_jasa'   => $status,
        );

        $this->db->where('id_invoice', $resultData['id_invoice']);
        // $this->db->where('tb_invoice', $coba);
        $this->db->update('tb_invoice', $coba);
    }

    public function update_status_cc($id_invoice, $id_tkg, $status_jasa)
    {
        $this->db->insert('tb_invoice_detail', ['status_jasa' => $status_jasa, 'id_invoice' => $id_invoice, 'id_tkg' => $id_tkg], ['id_invoice' => $id_invoice]);

        // sintak opsional jika insert dan update
        // $this->db->update('tb_invoice_detail', ['status_jasa' => $status_jasa, 'id_invoice' => $id_invoice, 'id_tkg' => $id_tkg], ['id_invoice' => $id_invoice]);
    }


    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_customer');
        $this->db->like('nama', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get()->result();
    }

    public function ambil_id_invoice_test($id_invoice)
    {
        // $this->db->select('*');
        // $this->db->from('tb_pesanan a');
        // // $this->db->join('tb_invoice b', 'a.id_invoice = b.id_invoice', 'left');
        // $this->db->where('a.id_invoice', $id_invoice);
        // $get = $this->db->get()->result();
        // return $get;

        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_invoice.id_invoice = tb_pesanan.id_invoice', 'left');
        $this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);
        $get = $this->db->get()->result();
        return $get;


        // $this->db->select('*');
        // $this->db->from('tbrakyat');
        // $this->db->join('tbsekolah','tbsekolah.id=tbrakyat.id');
        // $this->db->join('tbstatus','tbstatus.idpendidikan=tbsekolah.idpendidikan');
        // $this->db->where($aktif);
        // $query = $this->db->get();
        // return $query->result();

    }
}
