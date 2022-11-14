<?php

class Model_invoice extends CI_Model
{
	public function index()
	{
		// mensetig terlebih  zona waktu dahulu.
		date_default_timezone_set('Asia/Jakarta');
		$nama      = $this->input->post('nama');
		$alamat    = $this->input->post('lokasi_acara');
		$customer  = $this->input->post('id_customer');
		$tgl_acara = $this->input->post('tgl_acara');

		foreach ($this->cart->contents() as $item) {
			$data = array(
				'id_customer' 	 => $customer,
				'id_paket'	     => $item['id'],
				'tgl_pesan'   	 => date('Y-m-d H:i:s'),
				'tgl_acara'      => $tgl_acara,
				'lokasi_acara' 	 => $alamat,
				'total'	         => $item['qty'],
			);
			$this->db->insert('tb_pesanan', $data);
		}

		$result = $this->db->where('id_customer', $customer)->limit(1)->order_by('id', 'DESC')->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			$idPesanan = $result->result()[0]->id;
			// var_dump($idPesanan);
			// die;
		}

		$metode = $this->input->post('id_bankapp');

		$invoice = array(
			'id_bankapp'        => $metode,
			'id_pesan'          => $idPesanan,
			'batas_bayar'       => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
			'status_pembayaran' => 'Menunggu Pembayaran'
		);

		// var_dump($invoice);
		// die();

		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		return TRUE;
	}

	public function getBank()
	{
		$result = $this->db->get('tb_bankapp');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}


	public function ambil_id_invoice($id_invoice)
	{
		$this->db->select('tb_invoice.id as id_invoice,tb_pesanan.id as id_pesan, tb_pesanan.id_paket,tb_customer.nama as nama_customer, tb_wo.nama_wo as nama_wo, tb_wo.id as id_wo,tb_wo.no_rek, tb_pesanan.tgl_pesan, tb_paket.harga,tb_paket.nama as nama_paket, tb_pesanan.total');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_customer', 'tb_customer.id = tb_pesanan.id_customer', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}


	public function ambil_id_invoice_cstmr($id_invoice)
	{
		$this->db->select('tb_invoice.id as id_invoice,tb_pesanan.id as id_pesan, tb_pesanan.id_paket, tb_pesanan.tgl_pesan, tb_invoice.batas_bayar as batas_bayar, tb_invoice.status_pembayaran, tb_pesanan.total, tb_paket.nama,tb_paket.harga, tb_wo.nama_wo');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}


	public function ambil_invoice_stts_t($id_customer)
	{
		$this->db->select('tb_invoice.id as id_invoice,tb_pesanan.tgl_pesan as tgl_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->where('tb_pesanan.id_customer', $id_customer);
		$this->db->limit(1);
		$this->db->order_by('tb_pesanan.id DESC');
		return $this->db->get()->result();
	}


	public function ambil_invoice_stts_c($id_customer)
	{
		$this->db->select('tb_invoice.id as id_invoice,tb_pesanan.tgl_pesan as tgl_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->where('tb_pesanan.id_customer', $id_customer);
		$this->db->limit(1);
		$this->db->order_by('tb_pesanan.id DESC');
		return $this->db->get()->result();
	}


	public function ambil_id_invoice_d_s($id_invoice)
	{
		$this->db->select('tb_invoice.id as id_invoice, tb_wo.id as id_wo, tb_wo.nama_wo as nama_wo, tb_paket.id as id_paket,tb_paket.nama, tb_wo.email, tb_pesanan.status_pesananbywo');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}


	public function ambil_id_invoice_d_p_c($id_invoice)
	{
		$this->db->select('tb_pesanan.id as id_pesan, tb_invoice.id as id_invoice, tb_wo.id as id_wo, tb_wo.nama_wo as nama_wo, tb_wo.status, tb_paket.id as id_paket,tb_paket.nama, tb_wo.email');


		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	public function ambil_id_invoice_s_dr_c($id_invoice)
	{
		$this->db->select('tb_invoice.id as id_invoice,tb_pesanan.id as id_pesan, tb_pesanan.id_paket, tb_pesanan.tgl_pesan, tb_invoice.batas_bayar as batas_bayar, tb_invoice.status_pembayaran, tb_pesanan.total, tb_pesanan.status_pesanbycs, tb_paket.nama,tb_paket.harga, tb_wo.nama_wo');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}


	public function ambil_id_invoice_s_t_d($id_invoice)
	{
		$this->db->select('tb_invoice.id as id_invoice, tb_pesanan.id_paket, tb_wo.id as id_wo, tb_paket.nama, tb_wo.nama_wo, tb_customer.no_telp, tb_customer.email, tb_paket.harga, tb_pesanan.tgl_pesan, tb_pesanan.id as id_pesan');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}


	public function ambil_id_invoice_c_bkt($id_invoice)
	{
		$this->db->select('tb_pembayaran.id as id_pembayaran, tb_pembayaran.tgl_bayar, tb_pembayaran.bkt_transaksi, tb_pembayaran.nominal_tf, tb_bankapp.nama as nama_bank, tb_bankapp.no_rekening, tb_invoice.id as id_invoice');

		// $this->db->from('tb_invoice');
		// $this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		// $this->db->join('tb_customer', 'tb_customer.id = tb_pesanan.id_customer', 'left');
		// $this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		// $this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		// $this->db->where('tb_invoice.id', $id_invoice);
		// $this->db->limit(1);
		// return $this->db->get()->row_array();

		$this->db->from('tb_pembayaran');
		$this->db->join('tb_invoice', 'tb_pembayaran.id_invoice = tb_invoice.id', 'left');
		$this->db->join('tb_bankapp', 'tb_invoice.id_bankapp = tb_bankapp.id', 'left');
		// $this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		// $this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);
		$this->db->limit(1);
		return $this->db->get()->row_array();
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

	public function ambil_id_pesanan1()
	{
		$result = $this->db->where('id')->limit(1)->get('tb_invoice');
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
		$this->db->select('*');
		$this->db->from('tb_paket');
		$this->db->join('tb_pesanan', 'tb_paket.id = tb_pesanan.id_paket', 'left');
		$this->db->where('tb_paket.id', $id_invoice);
		return $this->db->get()->result();
		$query = $this->db->get();
		return $query->result();
	}

	public function ambil_id_transaksi($id_invoice, $email)
	{
		$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg', 'left');
		$this->db->where('tb_pesanan.id_invoice', $id_invoice);
		return $this->db->get()->result();
		$query = $this->db->get();
		return $query->result();
	}


	public function ambil_invoice($id_customer)
	{
		$this->db->select('tb_invoice.id as id_invoice,  tb_invoice.id_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran, tb_pesanan.tgl_pesan');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->where('tb_pesanan.id_customer', $id_customer);
		$this->db->limit(1);
		$this->db->order_by('tb_pesanan.id DESC');
		return $this->db->get()->result();
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


	public function ambil_id_invoice_wo($id_invoice, $email)
	{
		$this->db->select('*');
		$this->db->from('tb_pesanan');
		$this->db->join('tb_invoice', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->where('tb_pesanan.id', $id_invoice);
		return $this->db->get()->result();
		$query = $this->db->get();
		return $query->result();
	}

	public function tampil_data()
	{
		$this->db->select('tb_customer.id, tb_customer.nama, tb_customer.alamat, tb_pesanan.tgl_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id', 'left');
		$this->db->where('tb_invoice.status_pembayaran', 'Lunas');
		return $this->db->get()->result();
		$query = $this->db->get();
		return $query->result();
	}


	public function tampil_data_cus($id_customer)
	{
		$this->db->select('tb_invoice.id as id_invoice,  tb_invoice.id_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran, tb_pesanan.tgl_pesan');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		// $this->db->where('tb_invoice.status_pembayaran', 'Lunas');
		// return $this->db->get()->result();
		// $query = $this->db->get();
		// return $query->result();

		$this->db->where('tb_pesanan.id_customer', $id_customer);
		$this->db->limit(1);
		$this->db->order_by('tb_pesanan.id DESC');
		return $this->db->get()->result();
	}


	public function get_keyword_inv($keyword)
	{

		$this->db->select('tb_invoice.id as id_invoice, tb_invoice.id_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran, tb_invoice.id_bankapp, tb_customer.id as id_customer, tb_customer.nama, tb_customer.alamat, tb_pesanan.tgl_pesan');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id');
		$this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id');
		// $this->db->like('id', $keyword);
		$this->db->or_like('id_pesan', $keyword);
		$this->db->or_like('batas_bayar', $keyword);
		$this->db->or_like('status_pembayaran', $keyword);
		$this->db->or_like('id_bankapp', $keyword);


		$this->db->or_like('nama', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('tgl_pesan', $keyword);
		$this->db->or_like('id_customer', $keyword);
		return $this->db->get()->result();
	}
}
