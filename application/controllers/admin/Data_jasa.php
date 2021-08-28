<?php

class Data_jasa extends CI_Controller
{

    // sintax  ini digunakan untuk memblokir Akses yg akan masuk ke web tanpa login(kick Akses yg mencoba nakal!!)
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
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

        $data['jasa'] = $this->Model_jasa->tampil_data()->result();
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar', $data);
        $this->load->view('admin/Data_jasa', $data);
        $this->load->view('templatesadmin/Footer');
    }


    public function tambah_aksi()
    {
        $nama_tkg       = $this->input->post('nama_tkg');
        $alamat         = $this->input->post('alamat');
        $umur           = $this->input->post('umur');
        $jk             = $this->input->post('jk');
        $pendidikan     = $this->input->post('pendidikan');
        $agama          = $this->input->post('agama');
        $keahlian       = $this->input->post('keahlian');
        $kategori       = $this->input->post('kategori');
        $harga_tkg      = $this->input->post('harga_tkg');
        $gambar     =  $_FILES['gambar']['name'];

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
            'nama_tkg'       => $nama_tkg,
            'alamat'         => $alamat,
            'umur'           => $umur,
            'jk'             => $jk,
            'pendidikan'     => $pendidikan,
            'agama'          => $agama,
            'keahlian'       => $keahlian,
            'kategori'       => $kategori,
            'harga_tkg'      => $harga_tkg,
            'gambar'         => $gambar
        );

        $this->Model_jasa->tambah_jasa($data, 'tb_jasa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah jasa Success!!</div>');
        redirect('admin/Data_jasa/index');
    }


    public function detail_jasa($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_tkg' => $id);
        $data['jasa'] = $this->Model_jasa->detail_jasa_admin($id);
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

        $where = array('id_tkg' => $id);
        $data['jasa'] = $this->Model_jasa->edit_jasa($where, 'tb_jasa')->result();
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar', $data);
        $this->load->view('admin/Edit_jasa', $data);
        $this->load->view('templatesadmin/Footer');
    }


    public function update()
    {
        $id_tkg         = $this->input->post('id_tkg');
        $nama_tkg       = $this->input->post('nama_tkg');
        $alamat         = $this->input->post('alamat');
        $jk             = $this->input->post('jk');
        $pendidikan     = $this->input->post('pendidikan');
        $agama          = $this->input->post('agama');
        $keahlian       = $this->input->post('keahlian');
        $kategori       = $this->input->post('kategori');
        $harga_tkg      = $this->input->post('harga_tkg');
        $bayaran        = $this->input->post('bayaran');
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
            'nama_tkg'       => $nama_tkg,
            'alamat'         => $alamat,
            'jk'             => $jk,
            'pendidikan'     => $pendidikan,
            'agama'          => $agama,
            'keahlian'       => $keahlian,
            'kategori'       => $kategori,
            'harga_tkg'      => $harga_tkg,
            'bayaran'        => $bayaran,
            'gambar'         => $gambar
        );

        $where = array(
            'id_tkg' => $id_tkg
        );

        // $this->model_jasa->update_data($where, $data, 'tb_jasa');
        if ($this->Model_jasa->update_jasa($where, $data, 'tb_jasa')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update jasa Success!!</div>');
            redirect('admin/Data_jasa/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update jasa Gagal!!</div>');
            redirect('admin/Data_jasa/index');
        }
    }


    public function hapus_jasa($id)
    {
        $where = array('id_tkg' => $id);
        $this->Model_jasa->hapus_data($where, 'tb_jasa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete jasa Success!!</div>');
        redirect('admin/Data_jasa/index');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['jasa'] = $this->Model_jasa->get_keyword($keyword);
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('admin/Data_jasa_s', $data);
        $this->load->view('templatesadmin/Footer');
    }
}
