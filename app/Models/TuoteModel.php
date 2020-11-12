<?php namespace App\Models;

use CodeIgniter\Model;

class TuoteModel extends Model {
  protected $table = 'tuote';


  public function haeTuoteryhmalla($tuoteryhma_id) {
     return $this->getWhere(['tuoteryhma_id' => $tuoteryhma_id])->getResultArray();
  }

  public function haeTuote($id) {
    $this->where('id',$id);
    $query = $this->get();
    $tuote = $query->getRowArray();
    // Voidaan käyttää debuggauksessa, kun halutaan tietää, mikä
    // kysely suoritettiin.
    //echo $this->getLastQuery(); 
    return $tuote;
  }
}