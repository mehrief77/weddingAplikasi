<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['jasa'] = $this->Model_jasa->tampil_data()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		// $this->load->view('templates/navbar');
		$this->load->view('Dashboard', $data);
		$this->load->view('templates/Footer');
	}

	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['jasa'] = $this->Model_jasa->get_keyword($keyword);
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		$this->load->view('Dashboard_s', $data);
		$this->load->view('templates/Footer');
	}
}
