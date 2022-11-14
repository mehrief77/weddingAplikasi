<?php

class Navbar extends CI_Controller
{
    public function pendaftarkerja()
    {
        $data['pendaftarkerja'] = $this->Model_navbar->data_pendaftarkerja()->result();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('Electrical', $data);
        $this->load->view('templates/Footer');
    }
}
