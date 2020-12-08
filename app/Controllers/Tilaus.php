<?php

namespace App\Controllers;

use App\Models\AsiakasModel;
use App\Models\TilausModel;
use App\Models\TilausriviModel;

class Tilaus extends BaseController
{
  private $asiakasModel = null;
  private $tilausModel = null;
  private $tilausriviModel = null;

  function __construct()
  {
    $this->asiakasModel = new AsiakasModel();
    $this->tilausModel = new TilausModel();
    $this->tilausriviModel = new TilausriviModel();
  }

  /**
   * Näyttää tilaukset.
   */
  public function index()
  {
    $data['otsikko'] = 'Tilaukset';
    $data['tilaukset'] = $this->tilausModel->haeTilaukset();
    echo view('templates/header_admin.php');
    echo view('admin/tilaus.php', $data);
    echo view('templates/footer.php');
  }

  /**
   * Poistaa tilauksen ja tilausrivit. Asiakastieto jää tietokantaan.
   * 
   * @param int $id Poistettavan tilauksen id.
   */
    public function poista($id) {
    // Poistetaan ensin tuotteet tuoteryhmän alta.
    $this->tilausriviModel->poistaTilauksella($id);
    // Poistetaan tuoteryhmä.
    $this->tilausModel->poista($id);
    return redirect()->to(site_url('/tilaus/index'));
  }

  /**
   * Näyttää asiakkaat.
   */
  public function asiakkaat()
  {
    echo "TODO";
  }
}
