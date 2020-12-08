<?php  namespace App\Models;

use CodeIgniter\Model;

/**
 * Sisältää tilaus-taulun käsittelyyn liittyviä metodeja.
 */
class TilausModel extends Model {
  protected $table = 'tilaus'; // Malli käsittelee tilaus-taulua tietokannassa.

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['asiakas_id']; 

    public function haeTilaukset()
  {
    return $this->findAll();
  }
}

