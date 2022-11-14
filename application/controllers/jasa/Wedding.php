<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wedding extends CI_Controller
{
    public function profile()
    {
        $data['title'] = 'My Profile';     // nama judul harus sama dengan nama yg d databases
        $data['tb_wo'] = $this->db->get_where('tb_wo', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Profile', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function buat_usaha()
    {
        $data['title'] = 'Buat Usaha';
        $data['tb_wo'] = $this->db->get_where('tb_wo', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // membuat rules utk name
        $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Foto', 'required');
        }


        //membuat form_validation.
        if ($this->form_validation->run() == false) {
            $this->load->view('templatesjasa/Header');
            $this->load->view('templatesjasa/Sidebar', $data);
            $this->load->view('templatesjasa/Topbar', $data);
            $this->load->view('jasa/buat_usaha', $data);
            $this->load->view('templatesjasa/Footer');
        } else {
            $id             = $this->input->post('id');
            $id_wo          = $this->input->post('id_wo');
            $nama           = $this->input->post('nama');
            $deskripsi      = $this->input->post('deskripsi');
            $harga          = $this->input->post('harga');
            $upload_image   = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = './uploads/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['tb_wo']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id', $id);
            $this->db->set('id_wo', $id_wo);
            $this->db->set('nama', $nama);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('harga', $harga);
            $this->db->where('id_wo', $id_wo);
            $this->db->insert('tb_paket');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Buka Usaha Success!!</div>');
            redirect('jasa/Wedding/profile');
        }
    }


    public function paket()
    {
        $data['title'] = 'Data Paket';     // nama judul 
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array(); //utk mengirim data password yg berbbeda tabel dg tb_jasa
        $id_wo = $this->session->userdata('id');

        $data['tb_wo'] = $this->db->get_where('tb_wo', ['id' =>
        $this->session->userdata('id')])->row_array();

        $data['paket'] = $this->db->get_where('tb_paket', ['id' =>
        $this->session->userdata('id')])->row_array();


        $data['paket'] = $this->Model_paket->tampil_data($id_wo)->result();
        // var_dump($data['paket'], $id_wo);
        // die();

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar');
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/paket', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function tambah_paket()
    {
        $id_wo          = $this->input->post('id_wo');
        $nama           = $this->input->post('nama');
        $deskripsi      = $this->input->post('deskripsi');
        $harga          = $this->input->post('harga');
        $gambar         = $this->input->post('gambar');

        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_wo'       => $id_wo,
            'nama'        => $nama,
            'deskripsi'   => $deskripsi,
            'harga'       => $harga,
            'gambar'      => $gambar
        );

        $this->Model_paket->tambah_paket($data, 'tb_paket');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah jasa Success!!</div>');
        redirect('jasa/Wedding/paket');
    }


    public function detail_paket($id)
    {
        $data['title'] = 'DETAIL PAKET';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['paket'] = $this->Model_paket->detail_paket($id);

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar');
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Detail_paket', $data);
        $this->load->view('templatesjasa/Footer');
    }

    public function edit_paket($id)
    {
        $data['title'] = 'Edit Paket';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['paket'] = $this->Model_paket->edit_paket($where, 'tb_paket')->result();
        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar');
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Edit_paket', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function update()
    {
        $id             = $this->input->post('id');
        $id_wo          = $this->input->post('id_wo');
        $nama           = $this->input->post('nama');
        $deskripsi      = $this->input->post('deskripsi');
        $harga          = $this->input->post('harga');
        $gambar         =  $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_wo'          => $id_wo,
            'nama'           => $nama,
            'deskripsi'      => $deskripsi,
            'harga'          => $harga,
            'gambar'         => $gambar
        );

        $where = array(
            'id' => $id
        );

        if ($this->Model_paket->update_paket($where, $data, 'tb_paket')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update paket Success!!</div>');
            redirect('jasa/Wedding/paket');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" role="alert">Update paket Gagal!!</div>');
            redirect('jasa/Wedding/paket');
        }
    }


    public function hapus_paket($id)
    {
        $where = array('id' => $id);
        $this->Model_paket->hapus_paket($where, 'tb_paket');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete jasa Success!!</div>');
        redirect('jasa/Wedding/paket');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile Wedding';     // nama judul 
        $data['tb_wo'] = $this->db->get_where('tb_wo', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array(); //utk mengirim data password yg berbbeda tabel dg tb_jasa

        // membuat rules utk name
        $this->form_validation->set_rules('nama_wo', 'Full Name', 'required|trim');

        //membuat form_validation.
        if ($this->form_validation->run() == false) {
            $this->load->view('templatesjasa/Header', $data);
            $this->load->view('templatesjasa/Sidebar', $data);
            $this->load->view('templatesjasa/Topbar', $data);
            $this->load->view('jasa/Edit', $data);
            $this->load->view('templatesjasa/Footer');
        } else {
            $id               = $this->input->post('id');
            $nama             = $this->input->post('nama_wo');
            $alamat           = $this->input->post('alamat');
            $no_telp          = $this->input->post('no_telp');
            $akun_ig          = $this->input->post('akun_ig');
            $no_rek           = $this->input->post('no_rek');
            $email            = $this->input->post('email');
            $password         = $this->input->post('password');
            // cek jika ada gambar yg akan diupload
            // $upload_image = $_FILES['image']['name'];
            $upload_image     = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = './uploads/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['tb_wo']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $upload_image     = $_FILES['no_ktp']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = './uploads/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('no_ktp')) {        // mengupload image    
                    $old_image = $data['tb_wo']['no_ktp'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('no_ktp', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id               = $this->input->post('id');
            $nama             = $this->input->post('nama_wo');
            $alamat           = $this->input->post('alamat');
            $no_telp          = $this->input->post('no_telp');
            $akun_ig          = $this->input->post('akun_ig');
            $no_rek           = $this->input->post('no_rek');
            $email            = $this->input->post('email');
            $password         = $this->input->post('password');


            $this->db->set('id', $id);
            $this->db->set('nama_wo', $nama);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('akun_ig', $akun_ig);
            $this->db->set('no_rek', $no_rek);
            $this->db->where('email', $email);
            $this->db->update('tb_wo');


            $upload_image     = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = './uploads/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['tb_wo']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $upload_image     = $_FILES['no_ktp']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = './uploads/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {        // mengupload image    
                    $old_image = $data['tb_wo']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('jasa/Wedding/profile');
        }
    }


    public function pesanan_t()
    {
        $data['title'] = 'Pesanan Masuk';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_wo'] = $this->db->get_where('tb_wo', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_wo = $data['tb_wo']['id'];
        $data['tampil'] = $this->Model_jasa->ambil_id_invoice_p_t($id_wo);

        // var_dump($data['tampil'], $data['tb_wo']['id']);
        // die;
        $this->load->view('templatesjasa/Header', $data);
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Pesanan_t', $data);
        $this->load->view('templatesjasa/Footer');
    }

    public function konfirmasi($id_invoice)
    {
        $data['title'] = 'Pembayaran';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_wo'] = $this->db->get_where('tb_wo', ['email' =>
        $this->session->userdata('email')])->row_array();

        $id_wo = $data['tb_wo']['id'];
        $data['invoice'] = $this->Model_jasa->ambil_id_invoice_p_t($id_wo);

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar');
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Konfirmasi', $data);
        $this->load->view('templatesjasa/Footer');
    }

    public function proses_approve($id_pesan)
    {
        $id_pesan = $this->input->post('id_pesan');
        $data_inv = array(
            'tgl_approve' => $this->input->post('tgl_approve'),
        );

        // var_dump($data_inv);
        // die;

        $this->db->where('id_pesan', $id_pesan);
        if ($this->db->update('tb_pembayaranwo', $data_inv)) {
            echo "sukses";

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update paket Success!!</div>');
            redirect('jasa/Wedding/paket');
            die();
        } else {
            echo "error";
            die();
        }


        // redirect('admin/Invoice');


    }


    public function tolak_pesanan($id_invoice)
    {
        // $this->db->update('tb_invoice', ['status_jasa' => 'Selesai'], ['id_invoice' => $id_invoice]);
        $this->db->update('tb_pesanan', ['status_pesananbywo' => 'Selesai'], ['id' => $id_invoice]);
        redirect('jasa/Wedding/pesanan_t');
    }


    public function status_t_d($id_invoice)
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Status Wedding Saat Ini';     // nama judul harus sama dengan nama yg d databases


        // $data['invoice'] = $this->Model_invoice->ambil_id_invoice_cstmr($id_invoice);
        // $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);

        $data['invoice'] = $this->Model_invoice->ambil_id_invoice_s_t_d($id_invoice);
        // $id = $this->Model_invoice->ambil_id_tkg($id_invoice);
        // var_dump($id_tkg->id_tkg);
        // die();

        // $this->db->select('*');
        // $this->db->from('tb_invoice');
        // $this->db->where('id_invoice', $id_invoice);

        // $resultData = $this->db->get()->row_array();

        // $this->db->select('*');
        // $this->db->from('tb_pesanan');
        // $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id_invoice');
        // $this->db->join('tb_customer', 'tb_invoice.id_customer = tb_customer.id_customer');
        // $this->db->where('status_pembayaran', 'lunas');
        // $this->db->where('tb_invoice.status_jasa', '');
        // $this->db->where('tb_invoice.id_invoice', $resultData['id_invoice']);
        // // $this->db->where('tb_pesanan.id', $id->id);

        // $data['tampil'] = $this->db->get()->result();

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Status_t_v', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function status_t()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Status Wedding Saat Ini';     // nama judul harus sama dengan nama yg d databases
        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Status_t', $data);
        $this->load->view('templatesjasa/Footer');
    }

    public function update_status_t($id_pesan)
    {
        $status_pesananbywo = $this->input->post('status_pesananbywo');
        $id_pesan = $this->input->post('id_pesan');
        $data['customer'] = $this->Model_customer->update_status_c_t($id_pesan, $status_pesananbywo);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">update status Success!!</div>');
        redirect('jasa/Wedding/pesanan_t');
    }
}
