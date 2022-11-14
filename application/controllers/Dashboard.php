<?php

class Dashboard extends CI_Controller
{
	public function tambah_ke_pesan($id)
	{
		if ($this->session->userdata('id_role') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('Auth/login');
		}

		$paket = $this->Model_paket->find($id);


		// cara untuk Menambahkan jasa ke keranjang belanja
		$data = array(
			'id'   => $paket->id,
			'qty'     => 1,
			'price'   => $paket->harga,
			'name'    => $paket->nama
		);

		// var_dump($data);
		// die();

		$this->cart->insert($data);
		redirect('Dashboard_c');
	}

	public function detail_pesan()
	{
		$data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('templates/Topbar', $data);
		$this->load->view('Pesanan');
		$this->load->view('templates/Footer');
	}


	public function hapus_keranjang()
	{
		// cart berfungsi untuk pembelian(keranjang)
		$this->cart->destroy();
		redirect('Dashboard_c');
	}


	public function pembayaran()
	{
		$data['title'] = 'Input Alamat Pemesan dan Pembayaran';     // nama judul

		$data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['getBank'] = $this->Model_invoice->getBank();

		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('Pembayaran', $data);
		$this->load->view('templates/Footer');
	}


	public function proses_pesanan()
	{
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// mengirim data pesanan ke invoice
		$is_processed = $this->Model_invoice->index();

		$this->db->update('tb_wo', ['status' => "Persiapan"], ['id' => $this->input->post('id')]);

		if ($is_processed) {
			$this->cart->destroy();
			$this->load->view('templates/Header');
			$this->load->view('templates/Sidebar');
			 $this->load->view('templatesjasa/Topbar', $data);
			$this->load->view('Proses_pesanan');
			// $this->load->view('templates/Footer'); 
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


	public function kelas_paket($id)
	{
		$data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['paket'] = $this->Model_wo->detail_kelas_paket($id);
		// var_dump($id, $data['paket']);
		// die();
		$this->load->view('templates/Header_wel');
		$this->load->view('kelas_paket', $data);
		$this->load->view('templates/Footer');
	}


	public function detailnya($id)
	{
		$data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['wedding'] = $this->Model_paket->detail_paket($id);
		$this->load->view('templates/Header_wel');
		$this->load->view('Detail_jasa', $data);
		$this->load->view('templates/Footer');
	}
}
