<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;
use App\Models\UutiskirjeModel;


class Yhteystiedot extends BaseController
{
  private $tuoteryhmaModel = null;
  private $loginModel = null;
  private $uutiskirjeModel = null;

  public function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->loginModel = new LoginModel();
    $this->uutiskirjeModel = new UutiskirjeModel();
  }

  public function index()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    echo view('templates/header', $data);
    echo view('yhteystiedot.php');
    echo view('templates/footer');
  
  }

  public function uutiskirje()
  {

          $this->uutiskirjeModel->save([
              'email' => $this->request->getVar('mail')
          ]);

          // echo '<script>alert("Uutiskirje tilattu onnistuneesti, kiitos!")</script>'; 
          return redirect('yhteystiedot');

      }
  }



