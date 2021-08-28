<?php

class Invoice extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		$this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI

		if ($this->session->userdata('role_id') != '1') {
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

		$data['invoice'] = $this->Model_invoice->tampil_data();

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
		$data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);
		$getInvoice = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
		$getStatus = $this->db->get_where('tb_invoice', ['id_invoice' => $getInvoice['id_invoice']])->row_array();

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
		$data['tb_pembayaran'] = $this->db->get_where('tb_pembayaran', ['id_invoice' => $id_invoice])->row_array();

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
		$this->db->where('id_invoice', $id_invoice);
		$this->db->update('tb_invoice', $data_inv);
		redirect('admin/Invoice');
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
		$data['title'] = 'Detail Status Tukang';
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan_1'] = $this->Model_invoice->ambil_id_invoice_test($id_invoice);
		$getInvoice = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
		$getStatus = $this->db->get_where('tb_invoice', ['id_invoice' => $getInvoice['id_invoice']])->row_array();

		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Status_dr_c_new', $data);
		$this->load->view('templatesadmin/Footer');
	}

	public function search()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['invoice'] = $this->Model_invoice->get_keyword($keyword);

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
		$pdf->Cell(270, 7, 'E_PUBLIC', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(270, 7, 'DAFTAR TRANSAKSI', 0, 1, 'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		// $pdf->Cell(80,6,'NPM',1,0);
		$pdf->Cell(25, 6, 'ID INVOICE', 1, 0, 'C');
		$pdf->Cell(40, 6, 'PEMESAN', 1, 0, 'C');
		$pdf->Cell(48, 6, 'ALAMAT', 1, 0, 'C');
		$pdf->Cell(40, 6, 'TANGAL', 1, 0, 'C');
		$pdf->Cell(40, 6, 'BAYAR', 1, 0, 'C');
		$pdf->Cell(40, 6, 'STATUS', 1, 1, 'C');
		$pdf->SetFont('Arial', '', 10, 'C');
		$invoice = $this->Model_invoice->tampil_data();
		foreach ($invoice as $inv) {
			$pdf->Cell(25, 6, $inv->id_invoice, 1, 0);
			$pdf->Cell(40, 6, $inv->nama, 1, 0);
			$pdf->Cell(48, 6, $inv->alamat, 1, 0);
			$pdf->Cell(40, 6, $inv->tgl_pesan, 1, 0);
			$pdf->Cell(40, 6, $inv->batas_bayar, 1, 0);
			$pdf->Cell(40, 6, $inv->status_pembayaran, 1, 1);
		}

		$pdf->Output();
	}
}
