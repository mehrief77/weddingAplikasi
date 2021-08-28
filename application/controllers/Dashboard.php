<?php

class Dashboard extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	// public function __construct()
	// {
	// 	parent::__construct();

	// 	if ($this->session->userdata('role_id') != '3') {
	// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	// 				  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
	// 				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 				    <span aria-hidden="true">&times;</span>
	// 				  </button>
	// 				</div>');
	// 		redirect('auth/login');
	// 	}
	// }


	public function tambah_ke_pesan($id)
	{
		if ($this->session->userdata('role_id') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('Auth/login');
		}

		$jasa = $this->Model_jasa->find($id);

		// cara untuk Menambahkan jasa ke keranjang belanja
		$data = array(
			'id'      => $jasa->id_tkg,
			'qty'     => 1,
			'price'   => $jasa->harga_tkg,
			'name'    => $jasa->nama_tkg
		);

		$this->cart->insert($data);
		redirect('Welcome');
	}


	// public function detail_keranjang()
	public function detail_pesan()
	{
		$data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('templates/Topbar', $data);
		// $this->load->view('keranjang');
		$this->load->view('Pesanan');
		$this->load->view('templates/Footer');
	} 


	public function hapus_keranjang()
	{
		// cart berfungsi untuk pembelian(keranjang)
		$this->cart->destroy();
		// redirect('welcome');
		redirect('Dashboard_c');
	}


	public function pembayaran()
	{
		$data['title'] = 'Input Alamat Pemesan dan Pembayaran';     // nama judul
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('Pembayaran', $data);
		$this->load->view('templates/Footer');
	}


	public function proses_pesanan()
	{
		// mengirim data pesanan ke invoice
		$is_processed = $this->Model_invoice->index();

		$this->db->update('tb_jasa', ['status' => "Persiapan"], ['id_tkg' => $this->input->post('id_tukang')]);

		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('templates/Header');
			$this->load->view('templates/Sidebar');
			$this->load->view('Proses_pesanan');
			$this->load->view('templates/Footer');
		} else {
			echo "Maaf, Pesanan Anda Gagal Diproses!";
		}
	}

	// kodingan ini berujuk pada proses_pesanan, jika kodingan ini tdk dipakai maka gunakan yg diatas
	public function histori_pesanan()
	{
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('Proses_pesanan');
		$this->load->view('templates/Footer');
	}


	public function detailnya($id_tkg)
	{
		$data['jasa'] = $this->Model_jasa->detail_jasa($id_tkg);
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('Detail_jasa', $data);
		$this->load->view('templates/Footer');
	}
}
