<?php

class Dashboard_admin extends CI_Controller
{
	// sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('id_role') != '1') {
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
		$data['user'] = $this->db->get_where('tb_user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['wedding'] = $this->Model_wo->tampil_data()->result();
		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('templatesadmin/Topbar', $data);
		$this->load->view('admin/Dashboard', $data);
		$this->load->view('templatesadmin/Footer');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['jasa'] = $this->Model_jasa->get_keyword($keyword);
		$this->load->view('templatesadmin/Header');
		$this->load->view('templatesadmin/Sidebar');
		$this->load->view('admin/Dashboard_s', $data);
		$this->load->view('templatesadmin/Footer');
	}
}
