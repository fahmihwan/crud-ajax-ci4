<?php

namespace App\Controllers;

use App\Models\Users;

class Login extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->users = new Users();
    }

    public function index()
    {
        if ($this->request->getVar()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            if ($user = $this->users->where('username', $username)->first()) {
                if ($user['password'] === $password) {
                    $this->session->set([
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'isLoggedIn' => TRUE,
                    ]);
                    return redirect()->to('mahasiswa/index');
                } else {
                    echo "<script> 
                        alert('password salah');
                    </script>";
                }
            } else {
                echo "<script> 
                alert('user tidak ada');
            </script>";
            }
        }
        return view('login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('login'));
    }
}
