<?php

class Dashboard_jasa extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '2') {
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
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['jasa'] = $this->Model_jasa->tampil_data()->result();
		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar', $data);
		$this->load->view('templatesjasa/Topbar', $data);
		$this->load->view('jasa/Dashboard_jasa', $data);
		$this->load->view('templatesjasa/Footer');
	}

	public function detail($id_tkg)
	{
		$data['jasa'] = $this->Model_jasa->detail_jasa($id_tkg);
		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar');
		$this->load->view('Detail_jasa', $data);
		$this->load->view('templatesjasa/Footer');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['jasa'] = $this->Model_jasa->get_keyword($keyword);
		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar');
		$this->load->view('jasa/Dashboard_jasa_s', $data);
		$this->load->view('templatesjasa/Footer');
	}
}
