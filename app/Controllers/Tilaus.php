<?php

namespace App\Controllers;

use App\Models\AsiakasModel;
use App\Models\TilausModel;
use App\Models\TilausriviModel;
use App\Models\LoginModel;

class Tilaus extends BaseController
{
  private $asiakasModel = null;
  private $tilausModel = null;
  private $tilausriviModel = null;
  private $loginModel = null;

  function __construct()
  {
    $this->asiakasModel = new AsiakasModel();
    $this->tilausModel = new TilausModel();
    $this->tilausriviModel = new TilausriviModel();
    $this->loginModel = new LoginModel();
  }

  /**
   * Näyttää tilaukset.
   */
  public function index()
  {
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
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
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    return redirect()->to(site_url('/tilaus/index'));
  }

  /**
   * Näyttää asiakkaat.
   */
  public function asiakkaat()
  {
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    echo "TODO";
  }
}
