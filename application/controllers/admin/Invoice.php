<?php

class Invoice extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI

		if ($this->session->userdata('id_role') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}


	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id_pesan = $this->Model_invoice->ambil_id_pesanan1();

		$getNama = $this->session->userdata('nama');

		$this->db->select('tb_invoice.id as invoice_id, tb_pesanan.id, tb_customer.id,tb_customer.nama as nama_customer, tb_customer.alamat as alamat, tb_pesanan.tgl_pesan, tb_invoice.batas_bayar, tb_invoice.status_pembayaran');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id');
		$this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id');
		// // $this->db->where('tb_invoice.id', 93);
		// $this->db->where('status_pembayaran', 'Menunggu Pembayaran'); 

		$data['invoice'] = $this->db->get()->result();

		// var_dump($data['invoice']);
		// die();

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Invoice', $data);
		$this->load->view('templatesadmin/Footer');
	}


	public function detail($id_invoice)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);

		// var_dump($data['invoice']);
		// die();

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Detail_invoice', $data);
		$this->load->view('templatesadmin/Footer');
	}

	public function cek_bukti($id_invoice)
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// $data['tb_pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_invoice' => $id_invoice])->row_array();

		$data['tb_pembayaran'] = $this->Model_invoice->ambil_id_invoice_c_bkt($id_invoice);

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Bukti_pembayaran', $data);
		$this->load->view('templatesadmin/Footer');
	}

	public function proses_bayar($id_invoice)
	{
		$data_inv = array(
			'status_pembayaran' => $this->input->post('status_pembayaran')
		);
		$this->db->where('id', $id_invoice);
		$this->db->update('tb_invoice', $data_inv);
		// redirect('admin/Invoice');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update status_pembayaran Success !</div>');
		redirect('admin/Invoice/');
	}


	public function status_c($id_invoice)
	{
		$data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);
		$getInvoice = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
		$getStatus = $this->db->get_where('tb_invoice', ['id_invoice' => $getInvoice['id_invoice']])->row_array();

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('admin/Status_c_v', $data);
		$this->load->view('templatesadmin/Footer');
	}


	public function status_dr_c($id_invoice)
	{
		$data['title'] = 'Detail Status Wedding';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['invoice'] = $this->Model_invoice->ambil_id_invoice_s_dr_c($id_invoice);

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Status_dr_c_new', $data);
		$this->load->view('templatesadmin/Footer');
	}

	public function transper_k_ven($id_invoice)
	{
		$data['title'] = 'Transfer Ke Vendor';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->db->select('tb_invoice.id as id_invoice ,tb_pesanan.id as id_pesan ,tb_wo.id as id_wo, tb_wo.nama_wo, tb_wo.no_rek, tb_paket.id as id_paket, tb_paket.nama as nama_paket, tb_paket.harga, tb_invoice.id as id_invoice, tb_pembayaran.id as id_pembayarancs, tb_pembayaran.nominal_tf');

		$this->db->from('tb_invoice');
		$this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
		$this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id', 'left');
		$this->db->join('tb_paket', 'tb_pesanan.id_paket = tb_paket.id', 'left');
		$this->db->join('tb_wo', 'tb_paket.id_wo = tb_wo.id', 'left');
		$this->db->join('tb_pembayaran', 'tb_invoice.id = tb_pembayaran.id_invoice', 'left');
		// $this->db->join('tb_pembayaran', 'tb_invoice.id = tb_pembayaran.id_invoice', 'left');
		// $this->db->join('tb_bankapp', 'tb_invoice.id_bankapp = tb_bankapp.id', 'left');
		$this->db->where('tb_invoice.id', $id_invoice);

		$data['invoice'] = $this->db->get()->result_array();


		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Transper_k_ven', $data);
		$this->load->view('templatesadmin/Footer');
	}


	public function proses_bayar_wo()
	{
		$data = array(      // mengirim data pesanan ke invoice
			// 'id_invoice' => $this->input->post('id_invoice'),
			// 'id_customer' => $this->input->post('id_customer'),
			'id_pesan' => $this->input->post('id_pesan'),
			'id_pembayarancs' => $this->input->post('id_pembayarancs'),
			'tgl_tf' => $this->input->post('tgl_tf'),
			'nominal_tf' => $this->input->post('nominal_tf'),
			// 'metode' => $this->input->post('metode'),
			// 'bukti_tf' => $this->_pr_upload_gambar()
			// 'bkt_transaksi' => $this->_pr_upload_gambar()
		);

		$this->db->insert('tb_pembayaranwo', $data);
		// $this->db->where('id_invoice', $this->input->post('id_invoice'));
		$this->db->where('id_pesan', $this->input->post('id_pesan'));

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Success !</div>');
		redirect('admin/Invoice/');
	}

	public function search()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['invoice'] = $this->Model_invoice->get_keyword_inv($keyword);

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Invoice_s', $data);
		$this->load->view('templatesadmin/Footer');
	}

	public function cetak()
	{
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('l', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 16);
		// mencetak string 
		// $pdf->Cell(25,6,'Hai admin',0,1);
		$pdf->Cell(270, 7, 'MEGRASHY_WEDDING', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(270, 7, 'DAFTAR TRANSAKSI', 0, 1, 'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		// $pdf->Cell(80,6,'NPM',1,0);
		$pdf->Cell(25, 6, 'ID CUSTOMER', 1, 0, 'C');
		$pdf->Cell(40, 6, 'PEMESAN', 1, 0, 'C');
		$pdf->Cell(48, 6, 'ALAMAT', 1, 0, 'C');
		$pdf->Cell(40, 6, 'TANGAL', 1, 0, 'C');
		$pdf->Cell(40, 6, 'BAYAR', 1, 0, 'C');
		$pdf->Cell(40, 6, 'STATUS', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10, 'C');
		$invoice = $this->Model_invoice->tampil_data();
		foreach ($invoice as $inv) {
			$pdf->Cell(25, 6, $inv->id, 1, 0);
			$pdf->Cell(40, 6, $inv->nama, 1, 0);
			$pdf->Cell(48, 6, $inv->alamat, 1, 0);
			$pdf->Cell(40, 6, $inv->tgl_pesan, 1, 0);
			$pdf->Cell(40, 6, $inv->batas_bayar, 1, 0);
			$pdf->Cell(40, 6, $inv->status_pembayaran, 1, 1);
		}

		$pdf->Output();
	}
}
