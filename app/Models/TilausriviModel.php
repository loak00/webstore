<?php  namespace App\Models;

use CodeIgniter\Model;

/**
 * Sisältää tilausrivi-taulun käsittelyyn liittyviä metodeja.
 */
class TilausriviModel extends Model {
  protected $table = 'tilausrivi'; // Malli käsittelee tilausrivi-taulua tietokannassa.

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['tilaus_id','tuote_id','maara'];

  /**
  * Poistaa tilausrivit tilaukselta.
  * 
  * @param int $tilaus_id Tilauksen id, jonka tilausrivit poistetaan.
  */
  public function poistaTilauksella($tilaus_id) {
    $this->where('tilaus_id',$tilaus_id);
    $this->delete();
  }



}