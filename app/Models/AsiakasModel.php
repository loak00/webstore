<?php  namespace App\Models;

use CodeIgniter\Model;

/**
 * Sisältää asiakas-taulun käsittelyyn liittyviä metodeja.
 */
class AsiakasModel extends Model {
  protected $table = 'asiakas'; // Malli käsittelee asiakas-taulua tietokannassa.

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['etunimi','sukunimi','lahiosoite','postinumero','postitoimipaikka','email','puhelin'];
}