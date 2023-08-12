<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\UserModel;
 

class Token extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
       	//$this->load->helper(array('url','captcha'));
    }

    public function index()
    {
        /*if (session('login')) {
            session()->setFlashdata('pesan_gagal', 'Anda sudah login!');

            return redirect()->to(base_url('admin'));
        }*/
        $data = [
            'title' => 'Token'
        ];
        return view('auth/v_token_user', $data);
    }
    
    
    public function validasi_token()
    {
        if ($this->request->isAJAX()) {
            $token = $this->request->getVar('token');
           

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'token' => [
                    'label' => 'Token',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'token' => $validation->getError('token'),
                       
                    ]
                ];
            } else {

                //cek user
                $query_cekuser = $this->db->query("SELECT * FROM users WHERE token='$token'");
                 $row = $query_cekuser->getRow();
                 $password_user = $row->password_hash;

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    
                     $simpan_session = [
                                'login' => true,
                                'id' => $row->id,
                                'username' => $username,
                                'fullname'  => $row->fullname,
                                'user_image'  => $row->user_image,
                                'level' => $row->level,
                            ];

                            $this->session->set($simpan_session);
                    
                    $msg = [
                                'sukses' => [
                                   //'link' => '/admin/v_token_user'
                                ]
                            ];
                }else {
                    $msg = [
                        'error' => [
                            'token' => 'Maaf, Token tidak ditemukan!'
                        ]
                    ];
                    
                }
            }

            echo json_encode($msg);
        }
    }
    
    

    public function logout()
    {

        if ($this->request->isAJAX()) {

            $this->session->destroy();

            $data = [
                'respond'   => 'success',
                'message'   => 'Anda berhasil logout!'
            ];

            echo json_encode($data);
        }
    }
}
