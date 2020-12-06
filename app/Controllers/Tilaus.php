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
    $data['tilaukset'] = $this->tilausModel->haeTilaukset();
    echo view('templates/header_admin.php');
    echo view('admin/tilaus.php', $data);
    echo view('templates/footer.php');
  }

  /**
   * Näyttää asiakkaat.
   */
  public function asiakkaat()
  {
    echo "TODO";
  }
}
