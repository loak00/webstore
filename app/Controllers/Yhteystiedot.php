<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;
use App\Models\UutiskirjeModel;
use App\Models\OstoskoriModel;
use App\Models\ViestiModel;


class Yhteystiedot extends BaseController
{
  private $tuoteryhmaModel = null;
  private $loginModel = null;
  private $uutiskirjeModel = null;
  private $viestiModel = null;

  public function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->loginModel = new LoginModel();
    $this->uutiskirjeModel = new UutiskirjeModel();
    $this->ostoskoriModel = new OstoskoriModel();
    $this->viestiModel = new ViestiModel();
	}

  public function index()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
    $data['login'] = $this->loginModel->kirjautunut();
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
  
  public function viesti()
  {
    $this->viestiModel->save([
      'email' => $this->request->getVar('mail2'),
      'viesti'=> $this->request->getVar('viesti')
    ]);


    echo "<script>";
    echo " alert('Kiitos yhteydenottopyynnöstäsi, palataan asiaan!');      
        window.location.href='" . site_url('yhteystiedot') . "';
      </script>";
  }
}
