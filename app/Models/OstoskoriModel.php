<?php

namespace App\Models;

use CodeIgniter\Model;

class OstoskoriModel extends Model
{
  private $tuoteModel = null;

  function __construct()
  {
    $session = \Config\Services::session(); //käynnistää istunnon
    $session->start();
    if (!isset($_SESSION['kori'])) { // luodaan ostoskori, jos ei ole jo valmiiksi
      $_SESSION['kori'] = array();
    }

    $this->tuoteModel = new TuoteModel(); // Modelissa voidaan luoda toisesta luokasta model!
  }
  /**
   * Metodi tulostaa ostokorin sisällön
   */
  public function ostokori() {
    return $this->tuoteModel->haeTuote($_SESSION['kori']);
  }



  /**
   * Metodi lisää tuotteen ostoskoriin.
   */
  public function lisaa($tuote_id)
  {
    array_push($_SESSION['kori'], $tuote_id);
  }

  public function tyhjenna()
  {
    $_SESSION['kori'] = null;
  }
}
