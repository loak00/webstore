<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;
use App\Models\UutiskirjeModel;
use App\Models\OstoskoriModel;


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
    $this->ostoskoriModel = new OstoskoriModel();
	}

  public function index()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
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
    /* return redirect('yhteystiedot'); */
    echo "<script>";
    echo " alert('Uutiskirje tilattu onnistuneesti, kiitos!');      
        window.location.href='" . site_url('yhteystiedot') . "';
      </script>";
  }
}
