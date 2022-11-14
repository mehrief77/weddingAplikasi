<?php

class Kategori extends CI_Controller
{
	// public function electrical()
	public function elegant()
	{
		//membuat variabel data dan model
		$data['elegant'] = $this->Model_kategori->data_elegant()->result();
		$this->load->view('templates/Header_wel');
		$this->load->view('Elegant', $data);
		$this->load->view('templates/Footer');
	}

	public function best()
	{
		$data['best'] = $this->Model_kategori->data_best()->result();
		$this->load->view('templates/Header_wel');
		$this->load->view('Best', $data);
		$this->load->view('templates/Footer');
	}


	public function glamour()
	{
		$data['glamour'] = $this->Model_kategori->data_glamour()->result();
		$this->load->view('templates/Header_wel');
		$this->load->view('Glamour', $data);
		$this->load->view('templates/Footer');
	}


	public function exclusive()
	{
		$data['exclusive'] = $this->Model_kategori->data_exclusive()->result();
		$this->load->view('templates/Header_wel');
		$this->load->view('Exclusive', $data);
		$this->load->view('templates/Footer');
	}
}
