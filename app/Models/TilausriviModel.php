<?php  namespace App\Models;

use CodeIgniter\Model;

/**
 * Sisältää tilausrivi-taulun käsittelyyn liittyviä metodeja.
 */
class TilausriviModel extends Model {
  protected $table = 'tilausrivi'; // Malli käsittelee tilausrivi-taulua tietokannassa.

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['tilaus_id','tuote_id','maara'];
}