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
    return $_SESSION['kori'];
    //return $this->tuoteModel->haeTuote($_SESSION['kori']);
  }

  /**
   * Metodi näyttää ostoskorissa olevien tuotteiden lukumäärän.
   */
  public function ostoskori_lkm()
  {
    if (count($_SESSION['kori']) < 1){
      return "";
    }
    return count($_SESSION['kori']);
  }

  /**
   * Metodi lisää tuotteen ostoskoriin.
   */
  public function lisaa($tuote_id)
  {
    $tuote = $this->tuoteModel->haeTuote($tuote_id);

    // for ($i = 0; $i < count($_SESSION['kori']); $i++) {
    //   $ostoskorinTuote = $_SESSION['kori'][$i];
    //   if ($tuote_id === $ostoskorinTuote['id']) {
    //     $ostoskorinTuote['maara'] = $ostoskorinTuote['maara'] + 1;
    //     $_SESSION['kori'][$i] = $ostoskorinTuote;
    //     return;
    //   }
   // }
    //$tuote['maara'] = 1;
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

  /**
   * Tallentaa tilauksen tietokantaan (asiakas, tilaus ja tilausrivi).
   * 
   * @param Array $asiakas Asiakkaan tiedot.
   */
  public function tilaa($asiakas) {
    // Aloitetaan transaktiot.
    $this->db->transStart(); 
    // Tallennetaan asiakas.
    $this->asiakasModel->save($asiakas);
    $asiakas_id = $this->insertID();
    // Tallennetaan tilaus.
    $this->tilausModel->save(['asiakas_id' => $asiakas_id]);
    $tilaus_id = $this->insertID();
    // Tallennetaan tilausrivit.
    foreach ($_SESSION['kori'] as $tuote) {
      $this->tilausriviModel->save([
        'tilaus_id' => $tilaus_id,
        'tuote_id' => $tuote['id'],
        // 'maara' => $tuote['maara'] Ei toimi vielä, lisätään myöhemmin
      ]);
    }
    // Ostoskori tyhjennetään onnistuneen tilauksen jälkeen.
    $this->tyhjenna();
    // Päätetään transaktio.
    $this->db->transComplete();
  }


  
}
