<?php

namespace App\Controllers;

use App\Models\OstoskoriModel;
use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;

class Ostoskori extends BaseController
{
  private $tuoteryhmaModel = null;
  private $tuoteModel = null;
  private $loginModel = null;

  function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->ostoskoriModel = new OstoskoriModel();
    $this->tuoteModel = new TuoteModel();
    $this->loginModel = new LoginModel();
  }

  public function index()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['tuotteet'] = $this->ostoskoriModel->ostokori();
    /* $data['tuotteet'] = $this->tuoteModel->haeTuotteet($_SESSION['kori'][]); */
    $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
    $data['login'] = $this->loginModel->kirjautunut();
    echo view('templates/header', $data);
    echo view('ostoskori.php', $data);
    echo view('templates/footer');
  }

  public function lisaa($tuote_id)
  {
    $this->ostoskoriModel->lisaa($tuote_id); // istuntomuuttuja asetettu jo modelissa, ei tarvi enää tässä
    return redirect()->back(); // palataan takaisin samalle sivulle
  }

  /**
   * Poistaa valitun tuotteen ostoskorista.
   */
  public function poista($tuote_id)
  {
    $this->ostoskoriModel->poista($tuote_id);
    return redirect()->back();
  }

  /**
   * Tyhjentää ostoskorin.
   */
  public function tyhjenna()
  {
    $this->ostoskoriModel->tyhjenna();
    return redirect()->to(site_url('ostoskori/index'));
  }


  /**
   * Tallentaa tilauksen
   */
  public function tilaa()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $asiakas = [
      'etunimi' => $this->request->getPost('etunimi'),
      'sukunimi' => $this->request->getPost('sukunimi'),
      'lahiosoite' => $this->request->getPost('lahiosoite'),
      'postinumero' => $this->request->getPost('postinumero'),
      'postitoimipaikka' => $this->request->getPost('postitoimipaikka'),
      'email' => $this->request->getPost('email'),
      'puhelin' => $this->request->getPost('puhelin')
    ];

    $this->ostoskoriModel->tilaa($asiakas);

    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['tuotteet'] = $this->ostoskoriModel->ostokori();
    /* $data['tuotteet'] = $this->tuoteModel->haeTuotteet($_SESSION['kori'][]); */
    $data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
    $data['login'] = $this->loginModel->kirjautunut();
    echo view('templates/header', $data);
    echo view('kiitos'); 
    echo view('templates/footer');
  }
}
