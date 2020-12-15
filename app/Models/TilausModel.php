<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Sisältää tilaus-taulun käsittelyyn liittyviä metodeja.
 */
class TilausModel extends Model
{
  protected $table = 'tilaus'; // Malli käsittelee tilaus-taulua tietokannassa.

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['asiakas_id'];

  public function haeTilaukset()
  {
    $this->select('asiakas.etunimi as etunimi,
    asiakas.sukunimi as sukunimi,
    tilaus.id as tilausid,
    tilaus.paivays,
    tilausrivi.maara,
    tuote.nimi');
    $this->join('asiakas', 'asiakas.id = tilaus.asiakas_id');
    $this->join('tilausrivi', 'tilausrivi.tilaus_id = tilaus.id');
    $this->join('tuote', 'tuote.id = tilausrivi.tuote_id');
    $kysely = $this->get();
    return $kysely->getResultArray();
  }

  /**
   * Poistaa tilauksen.
   * 
   * @param int $id Poistettavan tilauksen id.
   */
  public function poista($id)
  {
    $this->where('id', $id);
    $this->delete();
  }
}
