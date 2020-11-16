<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TuoteryhmaModel;

class Login extends BaseController
{
    private $tuoteryhmaModel = null;

    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
        $this->tuoteryhmaModel = new TuoteRyhmaModel();
    }

    public function index()
    {
        $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
        echo view('templates/header', $data);
        echo view('login/login', $data);
        echo view('templates/footer', $data);
    }

    public function registeration()
    {
        $model = new LoginModel();

        if (!$this->validate([
            'username' => 'required|min_length[8]|max_length[30]',
            'password' => 'required|min_length[8]|max_length[30]',
            'confirmedpassword' => 'required|min_length[8]|max_length[30]|matches[password]',
        ])) {
            $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
            echo view('templates/header', $data);
            echo view('login/register', $data);
            echo view('templates/footer', $data);
        } else {
            $model->save([
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname')
            ]);
            return redirect('login');
        }
    }
}
