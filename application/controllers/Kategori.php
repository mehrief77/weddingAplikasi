<?php

class Kategori extends CI_Controller
{
	public function electrical()
	{
		//membuat variabel data dan model
		$data['electrical'] = $this->Model_kategori->data_electrical()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		$this->load->view('Electrical', $data);
		$this->load->view('templates/Footer');
	}


	public function elektronik()
	{
		//membuat variabel data dan model
		$data['elektronik'] = $this->Model_kategori->data_elektronik()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		$this->load->view('Elektronik', $data);
		$this->load->view('templates/Footer');
	}


	public function perkakas()
	{
		//membuat variabel data dan model
		$data['perkakas'] = $this->Model_kategori->data_perkakas()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		$this->load->view('Perkakas', $data);
		$this->load->view('templates/Footer');
	}


	public function tukang_bangunan()
	{
		//membuat variabel data dan model
		$data['bangunan'] = $this->Model_kategori->data_bangunan()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		$this->load->view('Bangunan', $data);
		$this->load->view('templates/Footer');
	}

	public function tukang_ledeng()
	{
		//membuat variabel data dan model
		$data['ledeng'] = $this->Model_kategori->data_ledeng()->result();
		$this->load->view('templates/Header');
		$this->load->view('templates/Sidebar_wel');
		$this->load->view('Ledeng', $data);
		$this->load->view('templates/Footer');
	}
}
