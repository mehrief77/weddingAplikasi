<?php

class Data_customer extends CI_Controller
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

        $data['customer'] = $this->Model_customer->tampil_data()->result();
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar', $data);
        $this->load->view('admin/Data_customer', $data);
        $this->load->view('templatesadmin/Footer');
    }

    public function tambah_aksi()
    {
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $no_telp    = $this->input->post('no_telp');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
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
            'nama'       => $nama,
            'alamat'     => $alamat,
            'no_telp'    => $no_telp,
            'email'      => $email,
            'password'   => $password,
            'gambar'     => $gambar
        );

        $this->Model_customer->tambah_customer($data, 'tb_customer');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah jasa Success!!</div>');
        redirect('admin/Data_customer/index');
    }

    public function detail_customer($id)
    {
        $data['title'] = 'Detail Customer';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_customer' => $id);
        $data['customer'] = $this->Model_customer->detail_customer_admin($id);
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar',  $data);
        $this->load->view('admin/Detail_customer', $data);
        $this->load->view('templatesadmin/Footer');
    }

    public function edit_customer($id)
    {
        $data['title'] = 'Edit Customer';
        $data['user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $where = array('id_customer' => $id);
        $data['customer'] = $this->Model_customer->edit_customer($where, 'tb_customer')->result();
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('templatesadmin/Topbar',  $data);
        $this->load->view('admin/Edit_customer', $data);
        $this->load->view('templatesadmin/Footer');
    }

    public function update()
    {
        $id_customer     = $this->input->post('id_customer');
        $nama            = $this->input->post('nama');
        $alamat          = $this->input->post('alamat');
        $no_telp         = $this->input->post('no_telp');
        $email           = $this->input->post('email');
        $password        = $this->input->post('password');
        $gambar          =  $_FILES['gambar']['name'];
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
            'nama'       => $nama,
            'alamat'     => $alamat,
            'no_telp'    => $no_telp,
            'email'      => $email,
            'password'   => $password,
            'gambar'     => $gambar
        );

        $where = array(
            'id_customer' => $id_customer
        );

        if ($this->Model_customer->update_customer($where, $data, 'tb_customer')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update customer Success!!</div>');
            redirect('admin/Data_customer/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update customer Success!!</div>');
            redirect('admin/Data_customer/index');
        }
    }


    public function hapus_customer($id)
    {
        $where = array('id_customer' => $id);
        $this->Model_customer->hapus_data($where, 'tb_customer');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete jasa Success!!</div>');
        redirect('admin/Data_customer/index');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['customer'] = $this->Model_customer->get_keyword($keyword);
        $this->load->view('templatesadmin/Header');
        $this->load->view('templatesadmin/Sidebar');
        $this->load->view('admin/Data_customer_s', $data);
        $this->load->view('templatesadmin/Footer');
    }
}
