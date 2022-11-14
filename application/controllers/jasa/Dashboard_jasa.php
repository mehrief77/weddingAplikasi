<?php

class Dashboard_jasa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('id_role') != '2') {
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

		$data['wedding'] = $this->Model_wo->tampil_data()->result();
		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar', $data);
		$this->load->view('templatesjasa/Topbar', $data);
		$this->load->view('jasa/Dashboard_jasa', $data);
		$this->load->view('templatesjasa/Footer');
	}


	public function detail($id)
	{
		$data['jasa'] = $this->Model_jasa->detail_jasa($id);
		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar');
		$this->load->view('Detail_jasa', $data);
		$this->load->view('templatesjasa/Footer');
	}


	public function search()
	{
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$keyword = $this->input->post('keyword');
		$data['wedding'] = $this->Model_wo->get_keyword($keyword);
		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar');
		$this->load->view('templatesjasa/Topbar', $data);
		$this->load->view('jasa/Dashboard_jasa_s', $data);
		$this->load->view('templatesjasa/Footer');
	}


	public function kelas_paket($id)
	{
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['paket'] = $this->Model_wo->detail_kelas_paket($id);

		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar');
		$this->load->view('templatesjasa/Topbar', $data);
		$this->load->view('jasa/kelas_paket_s', $data);
		$this->load->view('templatesjasa/Footer');
	}


	public function detail_paket($id)
	{
		$data['title']     = 'Kelas Paket';
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['paket'] = $this->Model_paket->detail_paket($id);

		$this->load->view('templatesjasa/Header');
		$this->load->view('templatesjasa/Sidebar');
		$this->load->view('templatesjasa/Topbar', $data);
		$this->load->view('jasa/detail_paket', $data);
		$this->load->view('templatesjasa/Footer');
	}
}
