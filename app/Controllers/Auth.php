<?php

namespace App\Controllers;
use App\Models\Auth_model;
class Auth extends BaseController
{
    
    public function login()
    {
        $data = [
            'title' => 'Token'
        ];
        // return view('fe/template/header',$data)
        return view('fe/v_login_user',$data);
        // .view('fe/template/footer');
    }

}
