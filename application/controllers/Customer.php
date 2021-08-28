<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function profile()
    {
        $data['title'] = 'My Profile';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Profile', $data);
        $this->load->view('templates/Footer');
    }


    public function edit()
    {
        $data['title']     = 'Edit Profile Customer';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer']  = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');  // membuat rules utk name
        if ($this->form_validation->run() == false) {   //membuat form_validation.
            $this->load->view('templates/Header');
            $this->load->view('templates/Sidebar');
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
                $config['upload_path']   = './assets/img/profile/';
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
        $data['title'] = 'Invoice Pesanan';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $customer_test = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->Model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Transaksi', $data);
        $this->load->view('templates/Footer');
    }



    public function detail($id_invoice)
    {
        $data['title']       = 'Detail Pesanan';     // nama judul
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Model_invoice->ambil_id_transaksi($id_invoice, $this->session->email);
        $getIdTkg = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
        $this->session->set_userdata('id_tkg', $getIdTkg['id_tkg']);
        // $data['jasa'] = $this->db->get_where('tb_jasa', ['id_tkg' => $this->session->userdata('id_tkg')])->row_array();
        // $idTkg = $this->session->userdata('id_tkg');
        // var_dump($data['pesanan']);
        // var_dump($getIdTkg['id']);
        // var_dump($idTkg);
        // die();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Detail_transaksi', $data);
        $this->load->view('templates/Footer');
    }


    public function bayar($id_invoice)
    {
        $data['title'] = 'Pembayaran';     // nama judul
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_invoice'] = $this->db->get_where('tb_invoice', ['id_customer' =>
        $this->session->userdata('id_customer')])->row_array();

        $data['id_invoice'] = $id_invoice;
        $data['tb_invoice_1'] = $this->db->get_where('tb_invoice', ['id_invoice' => $id_invoice])->row_array();
        // var_dump($data['tb_invoice_1']);
        // die();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Bayar', $data);
        $this->load->view('templates/Footer');
    }

    public function proses_bayar()
    {
        $data = array(      // mengirim data pesanan ke invoice
            'id_invoice' => $this->input->post('id_invoice'),
            'id_customer' => $this->input->post('id_customer'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'metode' => $this->input->post('metode'),
            'bkt_transaksi' => $this->_pr_upload_gambar()
        );

        $this->db->insert('tb_pembayaran', $data);
        // $data_inv = array(
        //     'status_pembayaran' => 'lunas'
        // );
        $this->db->where('id_invoice', $this->input->post('id_invoice'));
        // $this->db->update('tb_invoice', $data_inv);
        redirect('Customer/transaksi');
        // $is_processed = $this->model_invoice->index();
        // if ($is_processed) {
        //     redirect('Customer/transaksi');
        // }
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
        $data['title'] = 'Berita Tukang';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $customer_test = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->Model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Status_t_v', $data);
        $this->load->view('templates/Footer');
    }


    public function detail_status($id_invoice)
    {
        $data['title']       = 'Status Tukang';     // nama judul
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        // $this->session->set_userdata('id_tkg', $getIdTkg['id_tkg']);
        $data['pesanan'] = $this->Model_invoice->ambil_id_transaksi($id_invoice, $this->session->email);
        //  var_dump($data['pesanan']);
        // die();
        // $getIdTkg = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
        // $this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg', 'left');
        // $this->db->where('tb_pesanan.id_invoice', $id_invoice);

        $getIdTkg = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
        $this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg', 'left');
        // komen ini boleh di buka utk status jasa 
        // $this->db->join('tb_invoice_detail', 'tb_invoice_detail.id_tkg = tb_jasa.id_tkg', 'left');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);

        $data['tukang'] = $this->db->get('tb_pesanan')->result();
        $this->session->set_userdata('id_tkg', $getIdTkg['id_tkg']);
        // $data['jasa'] = $this->db->get()->result();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Berita_t', $data);
        $this->load->view('templates/Footer');
    }


    public function status_c()
    {
        $data['title'] = 'Status Pesanan';     // nama judul harus sama dengan nama yg d databases
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $customer_test = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->Model_invoice->ambil_invoice();
        // $data['pesanan'] = $this->model_invoice->ambil_id_transaksi($this->session->email);
        $this->load->view('templates/Header', $data);
        $this->load->view('templates/Sidebar', $data);
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Transaksi_T_cus', $data);
        $this->load->view('templates/Footer');
    }


    public function detail_penilaian_c($id_invoice)
    {
        $data['title']       = 'Penilaian Tukang';     // nama judul
        $data['tb_customer'] = $this->db->get_where('tb_customer', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Model_invoice->ambil_id_transaksi($id_invoice, $this->session->email);
        // var_dump($data['pesanan']);
        // die();
        $getIdTkg = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->row_array();
        $this->db->join('tb_jasa', 'tb_jasa.id_tkg = tb_pesanan.id_tkg', 'left');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);
        $this->db->where('tb_pesanan.id_tkg', $getIdTkg['id_tkg']);
        // $data['tukang'] = $this->db->get('tb_pesanan')->result();
        $this->session->set_userdata('id_tkg', $getIdTkg['id_tkg']);
        $data['tukang'] = $this->db->get_where('tb_pesanan', ['id_invoice' => $id_invoice])->result();
        $data['tukang_2'] =  $this->Model_customer->ambil_id_invoice_test($id_invoice);

        // $this->db->select('*');
        // $this->db->like('id_invoice', '$id_invoice', 'before');
        // $this->db->from('tb_pesanan');
        // $data['tukang'] = $this->db->get();
        // var_dump($data['tukang_2']);
        // print_r($query);
        // die();

        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('templates/Topbar', $data);
        $this->load->view('customer/Berita_cus', $data);
        $this->load->view('templates/Footer');
    }


    public function update_status_c($id_invoice)
    {
        // var_dump($id_invoice, $this->input->post('id_tkg'), $this->input->post('status_jasa'));
        // die();
        $data['customer'] = $this->Model_customer->update_status_cc($id_invoice, $this->input->post('id_tkg'), $this->input->post('status_jasa'));

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">update status Success!!</div>');
        redirect('Customer/status_c');
        // $this->load->view('templates/Header');
        // $this->load->view('templates/Sidebar');
        // $this->load->view('customer/Berita_c', $data);
        // $this->load->view('templates/Footer');
    }
}
