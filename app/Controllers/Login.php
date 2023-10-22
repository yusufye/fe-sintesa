<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\ModelUser;
 

class Login extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('form');
       	//$this->load->helper(array('url','captcha'));
        
    }

    public function index()
    {
        if (session('login')) {
            session()->setFlashdata('pesan_gagal', 'Anda sudah login!');

            return redirect()->to(base_url());
        }
        $data = [
            'title' => 'Login / Register User'
        ];
        return view('fe/v_login_user', $data);
    }
    
    public function registerUser()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required|is_unique[users.username]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'is_unique' => '{field} tidak boleh sama!',
                    ]
                ],
                'fullname' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                        'valid_email' => 'Masukkan {field} dengan benar!',
                        'is_unique' => '{field} tidak boleh sama!',
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required|password_strength[8]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ]
                ],
                /*'level' => [
                    'label' => 'Level',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong!',
                    ]
                ],*/

                'foto' => [
                    'label' => 'Foto Profil',
                    'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]|is_image[foto]',
                    'errors' => [
                        'uploaded' => 'Masukkan gambar',
                        'max_size' => 'Ukuran {field} Maksimal 1024 KB..!!',
                        'mime_in'  => 'Format file {field} PNG, Jpeg, Jpg, atau Gif..!!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'username'   => $validation->getError('username'),
                        'email'      => $validation->getError('email'),
                        'fullname'   => $validation->getError('fullname'),
                        'password'   => $validation->getError('password'),
                        'foto'       => $validation->getError('foto')
                        //'level'      => $validation->getError('level')
                    ]
                ];
            } else {


                $filegambar = $this->request->getFile('foto');
                $nama_file = $filegambar->getRandomName();
                $insertdata = [

                    'username'       => $this->request->getVar('username'),
                    'email'          => $this->request->getVar('email'),
                    'password_hash'  => (password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)),
                    'fullname'       => $this->request->getVar('fullname'),
                    'user_image'     => $nama_file,
                    'level'          => "user"
                ];

                $this->user->insert($insertdata);
                $filegambar->move('public/img/user/', $nama_file); //folder foto

                $msg = [
                    'sukses' => 'User berhasil register!'
                ];
            }
            echo json_encode($msg);
        }
    }

    
    public function validasi()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');
            $username1 = $this->db->escape($username);
            $password_hash = $this->request->getVar('password_hash');

            
            //$password_hash1 = $this->db->escape($password_hash);

            $validation = \Config\Services::validation();
            
            $valid = $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ],
                'password_hash' => [
                    'label' => 'Password',
                    'rules' => 'required|password_strength[8]',
                    'errors' => [
                        'required' => '{field} wajib diisi!'
                    ]
                ]
            ]);
            if (!$valid) {
                
                $msg = [
                    'error' => [
                        'username' => $validation->getError('username'),
                        'password_hash' => $validation->getError('password_hash')
                    ]
                ];
            } else {

                //cek user
               
                $query_cekuser = $this->db->query("SELECT * FROM users WHERE username=$username1");

                $result = $query_cekuser->getResult();

                if (count($result) > 0) {
                    $row = $query_cekuser->getRow();
                    $password_user = $row->password_hash;
                    $id_user = $row->id;
                     // check captcha
                     // $model = new UserModel();
                    
                      $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));
                       
                      // $userIp=$this->request->ip_address();
                         
                      $secret='6LcuBy4iAAAAALQ2VP8VZcowlZqYzNVWaCtcTKQ3';
                       
                      $credential = array(
                            'secret' => $secret,
                            'response' => $this->request->getVar('g-recaptcha-response')
                        );
                 
                      $verify = curl_init();
                      curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                      curl_setopt($verify, CURLOPT_POST, true);
                      curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
                      curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
                      curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                      $response = curl_exec($verify);
                 
                      $status= json_decode($response, true);
                      //var_dump($status);
                      /*if($status['success']){ 
                       $model->save($data);
                       $session->setFlashdata('msg', 'Form has been successfully submitted');
                      }else{
                       $session->setFlashdata('msg', 'Something goes to wrong');
                      }*/
                    
                    if (password_verify($password_hash, $password_user)) {
                        

                        if ($row->active == 1 || $status['success'] == 'true' ) {
                            
                            $token = substr(number_format(time() * rand(),0,'',''),0,6);
                            
                			$updatedata = [

                                'token'       => $token,
                                
                            ];


                            // $this->user->update($id_user, $updatedata);
                            
                			//$this->_sendmail($row->email,$row->fullname,$token);
                			
                           $simpan_session = [
                                'login' => true,
                                'id' => $row->id,
                                'username' => $username,
                                'fullname'  => $row->fullname,
                                'user_image'  => $row->user_image,
                                'level' => $row->level,
                            ];

                            // $this->session->set($simpan_session);
                            session()->set($simpan_session);
                            session()->remove('requested_uri');
                            
                            $msg = [
                                'sukses' => [
                                   //'link' => '/admin/v_token_user'
                                ]
                            ];
                        } else {
                            $msg = [
                                'nonactive' => [
                                    'nonactive' => 'Captcha Salah atau User tidak aktif!'
                                ]
                            ];
                        }
                    } else {
                        $msg = [
                            'error' => [
                                'password_hash' => 'Password salah!'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'username' => 'User tidak ditemukan!'
                        ]
                    ];
                }
            }

            echo json_encode($msg);
        }
    }
    
    private function _sendmail($email,$nama,$token)
	{
		$this->load->library('email');
		$config = array();
		
		$config['useragent'] = 'Pusbindiklatren';
		$config['protocol']= 'smtp';
		$config['mailtype']= 'html';
		$config['smtp_host']= 'smtp.trijayasolution.com';
		$config['smtp_port']= '587';
		$config['smtp_user']= 'pusbindiklatren@trijayasolution.com';
		$config['smtp_pass']= 'Trijaya123$';
		$config['crlf']="\r\n"; 
		$config['newline']="\r\n"; 
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;			
		$this->email->initialize($config);
		$this->email->to($email);
		$this->email->from('pusbindiklatren@trijayasolution.com','Admin Aplikasi SINTESA');
		$this->email->subject('Token Authentication');
		$this->email->message('<p>Dear '.$nama.',</p>
			
				<p>Please keep this secret number!.</p>
				<table>
				<tbody>
				<tr>
				<td>Your token number is</td>
				<td>:</td>
				<td><b>'.$token.'</b></td>
				</tr>
				</tbody>
				</table><br>
				<p><b>* Please dont share this secret number to login into SLO Online Application</b></p>
				<p><b>* If you want to login into SINTESA Application, this token number will be generated by system</b></p>
				<p>Thank you</p>
				<p><b>Pusbindiklatren - Kementerian Bappenas</b></p>
			');
		$this->email->send();
	}

    public function logout()
    {
            session()->destroy();
            return redirect()->to(base_url());

    }
}
