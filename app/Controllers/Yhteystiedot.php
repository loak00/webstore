<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;


class Yhteystiedot extends BaseController
{
  private $tuoteryhmaModel = null;
  private $loginModel = null;

  public function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->loginModel = new LoginModel();
  }

  public function index()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    echo view('templates/header', $data);
    echo view('yhteystiedot.php');
    echo view('templates/footer');
  }
}
