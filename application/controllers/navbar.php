<?php

class Navbar extends CI_Controller
{
    public function pendaftarkerja()
    {
        //membuat variabel data dan model
        // $data['electrical'] = $this->model_kategori->data_electrical()->result();
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        // $this->load->view('electrical', $data);
        // $this->load->view('templates/footer');

        $data['pendaftarkerja'] = $this->Model_navbar->data_pendaftarkerja()->result();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('Electrical', $data);
        $this->load->view('templates/Footer');
    }
}
