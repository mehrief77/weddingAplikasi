<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Profile', $data);
        $this->load->view('templates/Footer');
    }


    public function edit()
    {
        $data['title']     = 'Edit Profile Customer';
        $data['tb_customer']  = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');  // membuat rules utk name
        if ($this->form_validation->run() == false) {   //membuat form_validation.
            $this->load->view('templates/Header');
            $this->load->view('templates/Sidebar_c');
            $this->load->view('templates/Topbar', $data);
            $this->load->view('customer/Edit', $data);
            $this->load->view('templates/Footer');
        } else {
            $nama     = $this->input->post('nama');     // $id_customer = $this->input->post('id_customer');
            $alamat   = $this->input->post('alamat');
            $no_telp  = $this->input->post('no_telp');
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $upload_image = $_FILES['gambar']['name'];      // cek jika ada gambar yg akan diupload
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = 'uploads/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['customer']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika bukan maka hapus gamabr
                        unlink(FCPATH . '/assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->where('email', $email);
            $this->db->set('password', $password);
            $this->db->update('tb_customer');

            $this->db->where('email', $email); //menggunakan email sbg parameter utk merubah password di kedua table yg berbeda
            $this->db->set('password', $password);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('Customer/profile');
        }
    }


    public function transaksi()
    {
        $data['title'] = 'Invoice Pesanan';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_customer = $data['tb_customer']['id'];

        $data['invoice'] = $this->Model_invoice->ambil_invoice($id_customer);
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        // var_dump($data['invoice'], $data['tb_customer']['id']);
        // die();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Transaksi', $data);
        $this->load->view('templates/Footer');
    }


    public function detail($id_invoice)
    {
        $data['title']       = 'Detail Pesanan';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->Model_invoice->ambil_id_invoice_cstmr($id_invoice);

        // $data['pesanan'] = $this->Model_invoice->ambil_id_transaksi($id_invoice, $this->session->email);
        // var_dump($data['invoice']);
        // die();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Detail_transaksi', $data);
        $this->load->view('templates/Footer');
    }


    public function bayar($id_invoice)
    {
        $data['title'] = 'Pembayaran';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->db->select('tb_pesanan.id_customer as id_customer, tb_invoice.id as invoice_id, tb_customer.nama, tb_customer.alamat,tb_customer.no_telp as no_telp, tb_pembayaran.tgl_bayar as tgl_bayar, tb_bankapp.nama as nama_bank, tb_bankapp.no_rekening as no_rek, tb_pembayaran.bkt_transaksi');

        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan', 'tb_invoice.id_pesan = tb_pesanan.id', 'left');
        $this->db->join('tb_customer', 'tb_pesanan.id_customer = tb_customer.id', 'left');
        $this->db->join('tb_pembayaran', 'tb_invoice.id = tb_pembayaran.id_invoice', 'left');
        $this->db->join('tb_bankapp', 'tb_invoice.id_bankapp = tb_bankapp.id', 'left');
        $this->db->where('tb_invoice.id', $id_invoice);

        $data['invoice'] = $this->db->get()->result_array();

        // var_dump($id_invoice, $data['invoice'][0]['id_customer']);
        // die();

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Bayar', $data);
        $this->load->view('templates/Footer');
    }

    public function proses_bayar()
    {
        $data = array(      // mengirim data pesanan ke invoice
            'id_invoice' => $this->input->post('id_invoice'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'nominal_tf' => $this->input->post('nominal_tf'),
            // 'bukti_tf' => $this->_pr_upload_gambar()
            'bkt_transaksi' => $this->_pr_upload_gambar()
        );
        $this->db->insert('tb_pembayaran', $data);
        $this->db->where('id_invoice', $this->input->post('id_invoice'));
        redirect('Customer/transaksi');
    }


    public function _pr_upload_gambar($foto_lama = null)
    {
        if (!empty($_FILES['bkt_transaksi']['name'])) {
            $nmfile = md5($_FILES['bkt_transaksi']['name']);
            $config['upload_path']          = './uploads/bkt_transaksi';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['file_name']            = $nmfile;
            $config['overwrite']            = true;
            $config['max_size']             = 2024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bkt_transaksi')) {
                return $this->upload->data("file_name");
            }

            return "default.png";
        } else {
            return $foto_lama;
        }
    }


    public function status_t()
    {
        $data['title'] = 'Berita Wedding';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $customer_test = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_customer = $data['tb_customer']['id'];
        $data['invoice'] = $this->Model_invoice->ambil_invoice_stts_t($id_customer);

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Status_t_v', $data);
        $this->load->view('templates/Footer');
    }


    public function detail_status($id_invoice)
    {
        $data['title']       = 'Status Wedding';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->Model_invoice->ambil_id_invoice_d_s($id_invoice);

        $this->load->view('templates/Header');
        // $this->load->view('templates/Sidebar');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Berita_t', $data);
        $this->load->view('templates/Footer');
    }



    public function status_c()
    {
        $data['title'] = 'Status Pesanan';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $customer_test = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_customer = $data['tb_customer']['id'];
        $data['invoice'] = $this->Model_invoice->ambil_invoice_stts_c($id_customer);
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar_c', $data);
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Transaksi_T_cus', $data);
        $this->load->view('templates/Footer');
    }



    public function detail_penilaian_c($id_invoice)
    {
        $data['title']       = 'Penilaian Wedding';
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->Model_invoice->ambil_id_invoice_d_p_c($id_invoice);
        // var_dump($data['invoice']);
        // die;
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar_c');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Berita_cus', $data);
        $this->load->view('templates/Footer');
    }


    public function update_status_c($id)
    {
        // $data['customer'] = $this->Model_customer->update_status_cc($id_invoice, $this->input->post('id_tkg'), $this->input->post('status_jasa'));
        $status_pesanbycs = $this->input->post('status_pesanbycs');
        $id_pesan = $this->input->post('id_pesan');
        // var_dump($id_pesan, $status_pesanbycs);
        // die();
        // $data['customer'] = $this->Model_customer->update_status_cc($id, $status_pesanbycs ,$this->input->post('status_pesanbycs'));

        $data['customer'] = $this->Model_customer->update_status_cc($id_pesan, $status_pesanbycs);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">update status Success!!</div>');
        redirect('Customer/status_c');
    }

    public function cetak()
    {
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_customer = $data['tb_customer']['id'];
        $data['invoice'] = $this->Model_invoice->ambil_invoice($id_customer);


        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('l', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        // $pdf->Cell(25,6,'Hai admin',0,1);
        $pdf->Cell(270, 7, 'MEGRASHY_WEDDING', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(270, 7, 'DAFTAR TRANSAKSI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(80,6,'NPM',1,0);
        $pdf->Cell(25, 6, 'ID CUSTOMER', 1, 0, 'C');
        $pdf->Cell(40, 6, 'ID PESAN', 1, 0, 'C');
        $pdf->Cell(40, 6, 'TANGAL PESAN', 1, 0, 'C');
        $pdf->Cell(40, 6, 'BATAS BAYAR', 1, 0, 'C');
        $pdf->Cell(40, 6, 'STATUS', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10, 'C');
        $invoice = $this->Model_invoice->tampil_data_cus($id_customer);
        foreach ($invoice as $inv) {
            $pdf->Cell(25, 6, $inv->id_invoice, 1, 0);
            $pdf->Cell(40, 6, $inv->id_pesan, 1, 0);
            $pdf->Cell(40, 6, $inv->tgl_pesan, 1, 0);
            $pdf->Cell(40, 6, $inv->batas_bayar, 1, 0);
            $pdf->Cell(40, 6, $inv->status_pembayaran, 1, 1);
        }

        $pdf->Output();
    }
}
