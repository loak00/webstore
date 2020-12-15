<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Sisältää asiakas-taulun käsittelyyn liittyviä metodeja.
 */
class AsiakasModel extends Model
{
  protected $table = 'user'; // Malli käsittelee asiakas-taulua tietokannassa.

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['etunimi', 'sukunimi', 'lahiosoite', 'postinumero', 'postitoimipaikka', 'email', 'puhelin'];

  public function haeAsiakkaat()
  {
    $this->select('user.id as id,
    user.firstname as etunimi,
    user.lastname as sukunimi,
    user.lahiosoite as osoite,
    user.postinumero as postinumero,
    user.postitoimipaikka as postitoimipaikka,
    user.email as email,
    user.puhelin as puhelin');
    $kysely = $this->get();
    return $kysely->getResultArray();
  }
}
