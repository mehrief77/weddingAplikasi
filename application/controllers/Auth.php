<?php

class Auth extends CI_Controller
{

    public function index()
    {
        //membuat rules utk email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        // membuat rules utk password
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/Header', $data);
            $this->load->view('Form_login');
            // $this->load->view('templates/Footer');
        } else {
            // validasinya success
            $this->login();
        }
    }

    public function login()
    {
        // membuat form validation untuk username dan password
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Wajib diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/Header');
            $this->load->view('Form_login');
            // $this->load->view('templates/Footer');
        } else {
            $auth = $this->Model_auth->cek_login();

            $auth_customer = $this->Model_auth->cek_customer();


            if ($auth->is_active == "0") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Email Belum Diaktifkan Silahkan aktifkan!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                redirect('Auth/login');
                // die();
            }

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Email atau Password Anda Salah!!!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
                redirect('Auth/login');
            } else {
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('id_role', $auth->id_role);
                $this->session->set_userdata('is_login', true);

                if ($auth->id_role == "1") {
                    $cek = $this->Model_auth->data_level_1($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('nama', $val->nama);
                    }
                    redirect('admin/dashboard_admin');
                } else if ($auth->id_role == "2") {
                    $cek = $this->Model_auth->data_level_2($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('id', $val->id);
                        $this->session->set_userdata('nama', $val->nama_wo);
                    }
                    redirect('jasa/Dashboard_jasa');
                } else if ($auth->id_role == "3") {
                    $cek = $this->Model_auth->data_level_3($auth->email);
                    foreach ($cek as $val) {
                        $this->session->set_userdata('nama', $val->nama);
                        $this->session->set_userdata('alamat', $val->alamat);
                        $this->session->set_userdata('no_telp', $val->no_telp);
                        $this->session->set_userdata('email', $val->email);
                    }
                    $this->session->set_userdata('id_customer', $auth_customer->id_customer);

                    redirect(base_url('Dashboard_c'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Username atau Password Anda Salah!!!.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>');
                    redirect('Auth/login');
                }
            }
        }
    }

    public function pilih()
    {
        $data['title'] = "Pilih Register";
        $this->load->view('templates/Header', $data);
        $this->load->view('Pilih_registrasi');
        // $this->load->view('templates/Footer');
    }



    public function registration()
    {
        // membuat rules
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('akun_ig', 'Akun Instagram', 'required|trim');
        $this->form_validation->set_rules('id_bank', 'Nama Bank', 'required|trim');
        $this->form_validation->set_rules('no_rek', 'Nomer Rekening', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Foto', 'required');
        }

        if (empty($_FILES['no_ktp']['name'])) {
            $this->form_validation->set_rules('no_ktp', 'No ktp', 'required');
        }


        // print_r($_FILES);
        // die;
        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Vendor Registration';
            $this->load->view('templates/Header', $data);
            $this->load->view('Form_registrasi');
            $this->load->view('templates/Footer');
        } else {
            $email = $this->input->post('email', true);
            // data dibawah ini akan dikirim ke tb_user, maka dari itu samakan dgn filed yg ada di tb_user...oke
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

            $ktp         =  $_FILES['no_ktp']['name'];
            if ($ktp = '') {
            } else {
                $config['upload_path']   = './uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('no_ktp')) {
                    echo "Gambar ktp Gagal Diupload!";
                } else {
                    $ktp = $this->upload->data('file_name');
                }
            }

            $data = [
                'email'        => htmlspecialchars($email),
                // 'name'         => htmlspecialchars($this->input->post('name', true)),
                'nama'         => htmlspecialchars($this->input->post('nama', true)),
                'password'     => $this->input->post('password1'),
                // 'role_id'      => 2,
                'id_role'      => 2,
                // 'is_active' => 1,
                'is_active'    => 0,
                'date_created' => time(),
                'gambar'       => $gambar,
            ];

            // Tambahin seperti $data diatas
            $email = $this->input->post('email', true);
            $data_tb_wo = [
                'nama_wo'          => htmlspecialchars($this->input->post('nama', true)),
                'alamat'           => $this->input->post('alamat'),
                'no_telp'          => $this->input->post('no_telp'),
                'akun_ig'          => $this->input->post('akun_ig'),
                'id_bank'          => $this->input->post('id_bank'),
                'no_rek'           => $this->input->post('no_rek'),
                'email'            => htmlspecialchars($email),
                'gambar'           => $gambar,
                'no_ktp'           => $ktp,

            ];


            // var_dump($data_tb_user);
            // die;
            // menyiapkan token dan dibungkus dengan base64_encode
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'        => $email,
                'token'        => $token,
                'date_created' => time()
            ];

            // menambahkan data pada saat user registrasi ke table user
            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_wo', $data_tb_wo);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');    // verify dpt darimana?
            // setelah data di insert, sistem akan mengirim email yg baru registrasi melalui parameter
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congluratulaion! your account has been created. PLEASE ACTIVATE YOUR ACCOUNT</div>');
            redirect('Auth/login');
        }
    }



    public function registration_pelanggan()
    {
        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Customer';
            $this->load->view('templates/Header', $data);
            $this->load->view('Form_registration_pelanggan');
            $this->load->view('templates/Footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'email' => htmlspecialchars($email),
                // 'name' => htmlspecialchars($this->input->post('name', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'gambar' => 'default.jpg',
                'password' => $this->input->post('password1'),
                // 'role_id' => 3,
                'id_role' => 3,
                // 'is_active' a/ on off pada login jika 0 mati, jika 1 hidup,
                'is_active' => 0,
                // 'is_active' => 1,
                'date_created' => time()
            ];

            //Tambahin seperti $data diatas
            $email = $this->input->post('email', true);
            $data_tb_customer = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => htmlspecialchars($email),
                'password' => $this->input->post('password1'),
                'gambar' => 'default.jpg',
                // 'role_id' => 2,
                // 'is_active' => 1,
                // 'is_active' => 0,
                // 'date_created' => time()
            ];

            // menyiapkan token dan dibungkus dengan base64_encode
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            // menambahkan data pada saat user registrasi ke table user
            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_customer', $data_tb_customer);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');    // verify dpt darimana?
            // setelah data di insert, sistem akan mengirim email yg baru registrasi melalui parameter
            // $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congluratulaion! your account has been created. PLEASE ACTIVATE YOUR ACCOUNT</div>');
            redirect('Auth/login');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            // 'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'toufanhidayat07@gmail.com',
            'smtp_pass' => 'toufan123',
            'smtp_port' => '465',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


        // memanggil library email dan membutuhkan parameternya di ci
        $this->load->library('email', $config);
        // sintax ini utuk mengirim email aktiv dari registrasi yg baru di buat!!!!
        $this->email->initialize($config);

        $this->email->from('toufanhidayat07@gmail.com', 'Toufan Hidayat');
        $this->email->to($this->input->post('email'));

        // verify ini sama dengan yg ada di atas(sendEmail), cek verifikasi
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');  //sintax ini utk membuat link aktivasi ke gmail
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset you password : <a href="' . base_url() . 'auth/resetpassword?email=' .
                $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');  //sintax ini utk membuat link aktivasi ke gmail
        }

        if ($this->email->send()) {
            return true;
        } else {
            // echo $this->email->print_debugger();
            // die;
            echo $this->email->print_debugger();
        }
    }

    // function ini yg akan melakukan verifikasi terhadap link yg dikirim dari email, tentang nomer token dan email didatabase(user_token)
    public function verify()
    {
        $email = $this->input->get('email');     //ngambil data yg ada di database melalui input 
        $token = $this->input->get('token');
        $token = substr($token, 0, 30);
        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();     // membuat variabel(inisial $user_token) dan mengambil data token dari tabel user_token. 

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) { //utk mengecek waktu saat aktivasi expired atau tdk, 
                    $this->db->set('is_active', 1);   //jika menggunakan query bilder, merubah is_aktive dari 0 menjadi 1.
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('Auth');
                } else {
                    $this->db->delete('tb_user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! TOKEN EXPIRED!!!.</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! WRONG TOKEN!!!.</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! WRONG EMAIL!!!.</div>');
            redirect('Auth');
        }
    }


    public function logout()
    {
        // sess_destroy digunakan untuk menghancurkan session yg sudah masuk
        $this->session->sess_destroy();
        redirect('Auth/login');
    }
}
