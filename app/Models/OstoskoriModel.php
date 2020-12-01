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
  public function ostokori()
  {
    return $this->tuoteModel->haeTuote($_SESSION['kori']);
  }

  /**
   * Metodi näyttää ostoskorissa olevien tuotteiden lukumäärän.
   */
  public function ostoskori_lkm()
  {
    return count($_SESSION['kori']);
  }

  /**
   * Metodi lisää tuotteen ostoskoriin.
   */
  public function lisaa($tuote_id)
  {
    array_push($_SESSION['kori'], $tuote_id);
  }

  /**
   * Poistaa tuotteen ostoskorista.
   * 
   * @param int $tuote_id Poistettavan tuotteen id.
   */
  public function poista($tuote_id) { 
    // Käydään ostoskori läpi ja jos id:llä löytyy tuote, poistetaan se korista.
    for ($i = count($_SESSION['kori'])-1; $i >= 0;$i--) {
      $tuote = $_SESSION['kori'][$i];
      if ($tuote === $tuote_id) {
        array_splice($_SESSION['kori'], $i, 1);
        return;
      }
    }
  }

  public function tyhjenna()
  {
    $_SESSION['kori'] = null;
    $_SESSION['kori'] = array();
  }
}
