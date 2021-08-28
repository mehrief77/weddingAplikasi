<?php

class Model_invoice extends CI_Model
{
	public function index()
	{
		// mensetig terlebih  zona waktu dahulu.
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$metode = $this->input->post('metode');

		$invoice = array(
			'nama' 		  => $nama,
			'alamat' 	  => $alamat,
			'tgl_pesan'   => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
			'metode' 	  => $metode,
			'status_pembayaran' => 'Menunggu Pembayaran',
			'id_customer' => $this->session->userdata('id_customer')
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'email' => $this->session->email,
				'id_invoice' => $id_invoice,
				'id_tkg'	 => $item['id'],
				// 'nama_tkg' 	 => $item['name'],
				'jumlah'	 => $item['qty'],
				'harga_tkg'	 => $item['price'],
			);
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;
	}


	public function tampil_data()
	{
		$result = $this->db->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}


	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function ambil_id_tkg($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->limit(1)->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function ambil_id_invoice_test($id_invoice)
	{
		$this->db->select('tb_invoice_detail.id_invoice, tb_invoice_detail.id_tkg,  tb_jasa.nama_tkg, tb_invoice_detail.status_jasa, tb_pesanan.harga_tkg, tb_pesanan.jumlah, tb_pesanan.email');
		$this->db->from('tb_invoice_detail');
		$this->db->join('tb_jasa', 'tb_invoice_detail.id_tkg = tb_jasa.id_tkg');
		$this->db->join('tb_pesanan', 'tb_invoice_detail.id_invoice = tb_pesanan.id_invoice');
		$this->db->where('tb_invoice_detail.id_invoice', $id_invoice);
		$this->db->group_by('tb_invoice_detail.id_tkg');
		$query = $this->db->get();
		return $query->result();
	}

	public function ambil_id_pesanan($id_invoice)
	{
		// $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
		// if ($result->num_rows() > 0) {
		// 	return $result->result();
		// } else {
		// 	return false;
		// }
		$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg', 'left');
		$this->db->where('tb_pesanan.id_invoice', $id_invoice);
		// $this->db->where('tb_pesanan.id_invoice');
		return $this->db->get()->result();
		$query = $this->db->get();
		return $query->result();
	}

	public function ambil_id_transaksi($id_invoice, $email)
	{
		// $this->db->where('id_invoice', $id_invoice);
		// $result = $this->db->where('email', $email)->get('tb_pesanan');
		// if ($result->num_rows() > 0) {
		// 	return $result->result();
		// } else {
		// 	return false;
		// }
		$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg', 'left');
		$this->db->where('tb_pesanan.id_invoice', $id_invoice);
		return $this->db->get()->result();
		$query = $this->db->get();
		return $query->result();
	}


	public function ambil_invoice()
	{
		$email = $this->db->where('email', $this->session->userdata('email'))->get('tb_user')->row_array();
		$customer_test = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();
		// $result = $this->db->where('id_customer', $email['id'])->get('tb_invoice');
		$result = $this->db->where('id_customer', $customer_test['id_customer'])->get('tb_invoice');

		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}


	public function ambil_id_pembayaran()
	{
		$email = $this->db->where('email', $this->session->userdata('email'))->get('tb_user')->row_array();
		$result = $this->db->where('id_customer', $email['id'])->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tb_invoice');
		$this->db->like('id_invoice', $keyword);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('tgl_pesan', $keyword);
		$this->db->or_like('batas_bayar', $keyword);
		$this->db->or_like('status_pembayaran', $keyword);
		return $this->db->get()->result();
	}
}
