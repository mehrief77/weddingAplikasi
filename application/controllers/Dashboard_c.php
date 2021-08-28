<?php

class Dashboard_c extends CI_Controller
{

	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '3') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahuluyyyyy!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}


	public function index()
	{
		$data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['jasa'] = $this->Model_jasa->tampil_data()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar', $data);
		$this->load->view('templates/Topbar', $data);
		$this->load->view('customer/Dashboard_customer', $data);
		$this->load->view('templates/Footer');
	}


	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['jasa'] = $this->Model_jasa->get_keyword($keyword);
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar');
		$this->load->view('customer/Dashboard_customer_s', $data);
		$this->load->view('templates/Footer');
	}
}
