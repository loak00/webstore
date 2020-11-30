<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TuoteryhmaModel;
use App\Models\OstoskoriModel;

class Login extends BaseController
{
    private $tuoteryhmaModel = null;
    private $loginModel = null;

    public function __construct()
    {
        $this->tuoteryhmaModel = new TuoteRyhmaModel();
        $this->loginModel = new LoginModel();
        $this->ostoskoriModel = new OstoskoriModel();
    }

    public function index()
    {
        $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
        $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
        echo view('templates/header', $data);
        echo view('login/login', $data);
        echo view('templates/footer', $data);
    }

    public function registeration()
    {
        // $model = new LoginModel();

        if (!$this->validate([
            'username' => 'required|min_length[8]|max_length[30]',
            'password' => 'required|min_length[8]|max_length[30]',
            'confirmedpassword' => 'required|min_length[8]|max_length[30]|matches[password]',
        ])) {
            $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
            $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
            echo view('templates/header', $data);
            echo view('login/register', $data);
            echo view('templates/footer', $data);
        } else {
            $this->loginModel->save([
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname')
            ]);
            return redirect('login');
        }
    }

    public function check() {
        // $model = new LoginModel();

        if (!$this->validate([
            'user' => 'required|min_length[8]|max_length[30]',
            'password' => 'required|min_length[8]|max_length[30]',
        ])){
            $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
            $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
            echo view('templates/header', $data);
            echo view('login/login');
            echo view('templates/footer');
        }
        else {
            $user = $this->loginModel->check(
                $this->request->getVar('user'),
                $this->request->getVar('password')
            );
            if ($user) {
                $_SESSION['user'] = $user;
                return redirect('/');
            }
            else {
                return redirect('login');
            }
        }
    }

    
}