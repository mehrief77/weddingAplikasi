<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukang extends CI_Controller
{
    public function profile()
    {
        $data['title'] = 'My Profile';     // nama judul harus sama dengan nama yg d databases
        $data['tb_jasa'] = $this->db->get_where('tb_jasa', ['email' =>
        $this->session->userdata('email')])->row_array(); //kalimat yg didalam tanda kurung merupakan induk dari hlaman yg berada di view...

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Profile', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile Tukang';     // nama judul 
        $data['tb_jasa'] = $this->db->get_where('tb_jasa', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array(); //utk mengirim data password yg berbbeda tabel dg tb_jasa

        // membuat rules utk name
        $this->form_validation->set_rules('nama_tkg', 'Full Name', 'required|trim');

        //membuat form_validation.
        if ($this->form_validation->run() == false) {
            $this->load->view('templatesjasa/Header', $data);
            $this->load->view('templatesjasa/Sidebar', $data);
            $this->load->view('templatesjasa/Topbar', $data);
            $this->load->view('jasa/Edit', $data);
            $this->load->view('templatesjasa/Footer');
        } else {
            $id_tkg           = $this->input->post('id_tkg');
            $nama             = $this->input->post('nama_tkg');
            $tempat_lahir     = $this->input->post('tempat_lahir');
            $tanggal_lahir    = $this->input->post('tanggal_lahir');
            $alamat           = $this->input->post('alamat');
            $no_telp          = $this->input->post('no_telp');
            $agama            = $this->input->post('agama');
            $jk               = $this->input->post('jk');
            $pendidikan       = $this->input->post('pendidikan');
            $keahlian         = $this->input->post('keahlian');
            $kategori         = $this->input->post('kategori');
            $harga_tkg        = $this->input->post('harga_tkg');
            $bayaran          = $this->input->post('bayaran');
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
                    $old_image = $data['tb_jasa']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
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
                    $old_image = $data['tb_jasa']['no_ktp'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('no_ktp', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $upload_image     = $_FILES['sertifikat']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['upload_path']   = './assets/img/profile/';
                $config['upload_path']   = './uploads/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('sertifikat')) {        // mengupload image    
                    $old_image = $data['tb_jasa']['sertifkat'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
                    if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('sertifikat', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_tkg', $id_tkg);
            $this->db->set('nama_tkg', $nama);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tanggal_lahir', $tanggal_lahir);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('agama', $agama);
            $this->db->set('jk', $jk);
            $this->db->set('pendidikan', $pendidikan);
            $this->db->set('keahlian', $keahlian);
            $this->db->set('kategori', $kategori);
            $this->db->set('harga_tkg', $harga_tkg);
            $this->db->set('bayaran', $bayaran);
            $this->db->where('email', $email);
            $this->db->update('tb_jasa');



            // $upload_image     = $_FILES['gambar']['name'];
            // if ($upload_image) {
            //     $config['allowed_types'] = 'gif|jpg|png';
            //     $config['max_size']      = '2048';
            //     // $config['upload_path']   = './assets/img/profile/';
            //     $config['upload_path']   = './uploads/';

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('gambar')) {        // mengupload image    
            //         $old_image = $data['tb_jasa']['gambar'];     // menghapus upload an gambar yg sudah tak terpakai agar tdk tersimpan di assets/img/profile, dan sintax tersebut mengetahui gambar lama yg tak terpakai....
            //         if ($old_image != 'default.jpg') {       //mengecek gambar default bukan?. jika buka maka hapus gamabr
            //             unlink(FCPATH . 'assets/img/profile/' . $old_image);
            //         }

            //         $new_image = $this->upload->data('file_name');
            //         $this->db->set('gambar', $new_image);
            //     } else {
            //         echo $this->upload->display_errors();
            //     }
            // }

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('jasa/Tukang/profile');
        }
    }

    public function pesanan_t()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['title'] = 'Pesanan Masuk';     // nama judul 
        $data['tb_jasa'] = $this->db->get_where('tb_jasa', ['email' =>
        $this->session->userdata('email')])->row_array(); //kalimat yg didalam tanda kurung merupakan induk dari hlaman yg berada di view...

        // var_dump($this->session->userdata('name'));
        $getNama = $this->session->userdata('name');
        $this->db->select('*');
        $this->db->from('tb_jasa');
        $this->db->where('nama_tkg', $getNama);
        // $this->db->where('status !=', '');
        $resultData = $this->db->get()->row_array();
        // var_dump($resultData['id_tkg']);
        // die();

        // kodingan dr bang den , tapi pesanan tampil semua di interface tukang  
        $getNama = $this->session->userdata('name');
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id_invoice');
        $this->db->join('tb_customer', 'tb_invoice.id_customer = tb_customer.id_customer');
        $this->db->where('status_pembayaran', 'lunas');
        $this->db->where('status_jasa', '');
        $this->db->where('id_tkg', $resultData['id_tkg']);
        $data['tampil'] = $this->db->get()->result();

        // var_dump($data);
        // die();

        $this->load->view('templatesjasa/Header', $data);
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Pesanan_t', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function tolak_pesanan($id_invoice)
    {
        $this->db->update('tb_invoice', ['status_jasa' => 'Selesai'], ['id_invoice' => $id_invoice]);
        redirect('jasa/Tukang/pesanan_t');

        // $where = array ('id_invoice' => $id_invoice);
        // $this->Model_jasa->tolak_order($where, 'tb_pesanan');
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete jasa Success!!</div>');
        // redirect('jasa/Tukang/pesanan_t');
    }


    public function status_t_d($id_invoice)
    {
        // $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // $data['title'] = 'Status Tukang Saat Ini';     // nama judul harus sama dengan nama yg d databases
        // $this->load->view('templatesjasa/Header');
        // $this->load->view('templatesjasa/Sidebar', $data);
        // $this->load->view('templatesjasa/Topbar', $data);
        // $this->load->view('jasa/Status_t', $data);
        // $this->load->view('templatesjasa/Footer');



        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Status Tukang Saat Ini';     // nama judul harus sama dengan nama yg d databases

        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        $id_tkg = $this->Model_invoice->ambil_id_tkg($id_invoice);
        // var_dump($id_tkg->id_tkg);
        // die();
        // $getNama = $this->session->userdata('name');
        // $this->db->select('*');
        // $this->db->from('tb_jasa');
        // $this->db->where('nama_tkg', $getNama);

        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->where('id_invoice', $id_invoice);

        $resultData = $this->db->get()->row_array();

        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_pesanan.id_invoice = tb_invoice.id_invoice');
        $this->db->join('tb_customer', 'tb_invoice.id_customer = tb_customer.id_customer');
        // $this->db->join('tb_invoice_detail', 'tb_invoice.id_invoice = tb_invoice_detail.id_invoice');
        $this->db->where('status_pembayaran', 'lunas');
        $this->db->where('tb_invoice.status_jasa', '');
        $this->db->where('tb_invoice.id_invoice', $resultData['id_invoice']);
        $this->db->where('tb_pesanan.id_tkg', $id_tkg->id_tkg);
        // $this->db->group_by('tb_invoice_detail.id_tkg');

        $data['tampil'] = $this->db->get()->result();

        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        // $this->load->view('jasa/Status_t', $data);
        $this->load->view('jasa/Status_t_v', $data);
        $this->load->view('templatesjasa/Footer');
    }


    public function status_t()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Status Tukang Saat Ini';     // nama judul harus sama dengan nama yg d databases
        $this->load->view('templatesjasa/Header');
        $this->load->view('templatesjasa/Sidebar', $data);
        $this->load->view('templatesjasa/Topbar', $data);
        $this->load->view('jasa/Status_t', $data);
        $this->load->view('templatesjasa/Footer');
    }


    // public function update_status_t()
    // {
    //     $data['jasa'] = $this->Model_jasa->update_status_t();

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">update status Success!!</div>');
    //     redirect('jasa/Tukang/pesanan_t');

    //     // $this->load->view('templatesjasa/Header');
    //     // $this->load->view('templatesjasa/Sidebar');
    //     // $this->load->view('jasa/Berita_t', $data);
    //     // $this->load->view('templatesjasa/Footer');
    // }

    public function update_status_t()
    {
        $id_tkg = $this->input->post('id_tkg');
        $status = $this->input->post('status');
        $id_invoice = $this->input->post('id_invoice');
        // $data['jasa'] = $this->Model_jasa->update_status_t($id_tkg, $status, $id_invoice);

        $this->db->set('status', $status);
        $this->db->where('id_tkg', $id_tkg);
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('tb_invoice_detail');


        $this->db->set('status', $status);
        $this->db->where('id_tkg', $id_tkg);
        // $this->db->where('id_invoice', $id_invoice);
        $this->db->update('tb_jasa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">update status Success!!</div>');
        redirect('jasa/Tukang/pesanan_t');
    }
}
