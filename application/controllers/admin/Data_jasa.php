<?php

class Data_jasa extends CI_Controller
{

    // sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id_role') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login, Silahkan Login Terlebih dahulu!!!.
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
        $this->load->view('admin/Data_jasa', $data);
        $this->load->view('templatesadmin/Footer');
    }


    public function tambah_aksi()
    {
        $nama_wo       = $this->input->post('nama_wo');
        $alamat        = $this->input->post('alamat');
        $no_telp       = $this->input->post('no_telp');
        $akun_ig       = $this->input->post('akun_ig');

        $gambar        =  $_FILES['gambar']['name'];
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

        $no_ktp        =  $_FILES['no_ktp']['name'];
        if ($no_ktp = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('no_ktp')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $no_ktp = $this->upload->data('file_name');
            }
        }

        $no_rek        = $this->input->post('no_rek');
        $email         = $this->input->post('email');

        $data = array(
            'nama_wo'       => $nama_wo,
            'alamat'        => $alamat,
            'no_telp'       => $no_telp,
            'akun_ig'       => $akun_ig,
            'gambar'        => $gambar,
            'no_ktp'        => $no_ktp,
            'no_rek'        => $no_rek,
            'email'         => $email

        );

        $this->Model_jasa->tambah_jasa($data, 'tb_wo');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Vendor Success!!</div>');
        redirect('admin/Data_jasa/index');
    }


    public function detail_jasa($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['wedding'] = $this->Model_wo->detail_wo_admin($id);
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar', $data);
        $this->load->view('admin/Detail_jasa', $data);
        $this->load->view('templatesadmin/Footer');
    }


    public function edit_jasa($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id' => $id);
        $data['wedding'] = $this->Model_wo->edit_wo($where, 'tb_wo')->result();
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar', $data);
        $this->load->view('admin/Edit_vendor', $data);
        $this->load->view('templatesadmin/Footer');
    }


    public function update()
    {
        $id            = $this->input->post('id');
        $nama_wo       = $this->input->post('nama_wo');
        $alamat        = $this->input->post('alamat');
        $no_telp       = $this->input->post('no_telp');
        $akun_ig       = $this->input->post('akun_ig');

        $gambar        =  $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path']   = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Logo Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $no_ktp        =  $_FILES['no_ktp']['name'];
        if ($no_ktp    = '') {
        } else {
            $config['upload_path']   = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('no_ktp')) {
                echo "KTP Gagal Diupload!";
            } else {
                $no_ktp = $this->upload->data('file_name');
            }
        }

        $no_rek         = $this->input->post('no_rek');
        $email          = $this->input->post('email');

        $data = array(
            'nama_wo'        => $nama_wo,
            'alamat'         => $alamat,
            'no_telp'        => $no_telp,
            'akun_ig'        => $akun_ig,
            'gambar'         => $gambar,
            'no_ktp'         => $no_ktp,
            'no_rek'         => $no_rek,
            'email'          => $email
        );

        $where = array(
            'id' => $id
        );

        if ($this->Model_wo->update_wo($where, $data, 'tb_wo')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Vendor Success!!</div>');
            redirect('admin/Data_jasa/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Vendor Gagal!!</div>');
            redirect('admin/Data_jasa/index');
        }
    }


    public function hapus_jasa($id)
    {
        $where = array('id' => $id);
        $this->Model_wo->hapus_wo($where, 'tb_wo');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Vendor Success!!</div>');
        redirect('admin/Data_jasa/index');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['wedding'] = $this->Model_jasa->get_keyword($keyword);
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('admin/Data_jasa_s', $data);
        $this->load->view('templatesadmin/Footer');
    }
}
