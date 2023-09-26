<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelPerusahaan;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth;
        $this->ModelPerusahaan = new ModelPerusahaan;
        // $this->validation = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        helper("cookie");
    }

    public function index()
    {
        $data = [
            'logo' => 'Kreasi AI',
            'judul' => 'Admin Login',
            'subjudul' => 'silahkan login menggunakan akun admin',
            'perusahaan' => $this->ModelPerusahaan->DetailData()
        ];
        return view('admin/v_auth.php', $data);
    }

    public function cekLogin()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username belum diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password belum diisi'
                    ]
                ]
            ];
            if (!$this->validate($rules)) {
                // $validation = \Config\Services::validation();
                session()->setFlashdata("warning", $this->validation->getErrors());
                return redirect()->to("admin/login");
            }
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // $remember_me = $this->request->getVar('remember_me');

            $dataAkun = $this->ModelAuth->getData($username);
            if (!password_verify($password, $dataAkun['password'])) {
                $err[] = "akun yang anda masukkan tidak sesuai.";
                session()->setFlashdata('username', $username);
                session()->setFlashdata('warning', $err);
                return redirect()->to("admin/login");
            };
            $akun = [
                'username' => $dataAkun['username'],
                'nama_lengkap' => $dataAkun['nama_lengkap'],

            ];
            session()->set($akun);
            return redirect()->to("admin");
        }
    }
    function logout()
    {
        delete_cookie("cookie_username");
        delete_cookie("cookie_password");
        session()->destroy();
        // if (session()->get('akun_username') != '') {
        //     session()->setFlashdata("success", "anda berhasil logout");
        // }
        return redirect()->to('admin/login');
        // echo view("admin/v_login");
    }
}
