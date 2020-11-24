<?php namespace App\Models;

use CodeIgniter\Model;

class TuoteModel extends Model {
  protected $table = 'tuote';


  public function haeTuoteryhmalla($tuoteryhma_id) {
     return $this->getWhere(['tuoteryhma_id' => $tuoteryhma_id])->getResultArray();
  }

  public function haeTuote($id) {
    /* $this->where('id',$id);
    $query = $this->get();
    $tuote = $query->getRowArray();
    // Voidaan käyttää debuggauksessa, kun halutaan tietää, mikä
    // kysely suoritettiin.
    //echo $this->getLastQuery(); 
    return $tuote; */
    return $this->getWhere(['id' => $id])->getRowArray();
  }

  public function haeTuotteet($idt) {
    $tuotteet = array();
    foreach ($idt as $id) {
      $this->table('tuote');
      $this->select('id, nimi, hinta,kuva,kuvan_kuvaus');
      $this->where('id', $id);
      $kysely = $this->get();
      $tuote = $kysely->getRowArray();
      array_push($tuotteet,$tuote);
      $this->resetQuery();
    }
    return $tuotteet;
  }
}