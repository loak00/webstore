<?php

namespace App\Models;

use CodeIgniter\Model;

class TuoteModel extends Model
{
  protected $table = 'tuote';

  // Luettelo niistä kentistä, joita päivitetään, kun ajetaan tallennus (esim. save) tietokantaan.
  protected $allowedFields = ['nimi', 'hinta', 'kuvaus', 'kuva', 'kuvan_kuvaus', 'varastomaara', 'tuoteryhma_id'];

  public function haeKaikkiTuotteet()
  {
    return $this->findAll();
  }


  public function haeTuoteryhmalla($tuoteryhma_id)
  {
    return $this->getWhere(['tuoteryhma_id' => $tuoteryhma_id])->getResultArray();
  }

  public function haeTuote($id)
  {
    /* $this->where('id',$id);
    $query = $this->get();
    $tuote = $query->getRowArray();
    // Voidaan käyttää debuggauksessa, kun halutaan tietää, mikä
    // kysely suoritettiin.
    //echo $this->getLastQuery(); 
    return $tuote; */
    return $this->getWhere(['id' => $id])->getRowArray();
  }

  public function haeTuotteet($idt)
  {
    $tuotteet = array();
    foreach ($idt as $id) {
      $this->table('tuote');
      $this->select('id, nimi, hinta,kuva,kuvan_kuvaus');
      $this->where('id', $id);
      $kysely = $this->get();
      $tuote = $kysely->getRowArray();
      array_push($tuotteet, $tuote);
      $this->resetQuery();
    }
    return $tuotteet;
  }


  /**
   * Arpoo kolme satunnaista tuotetta (sama tuote ei esiinny useammin taulukossa).
   * 
   * @param int Satunnaisten tuotteiden lukumäärä
   * @return Array Kolme satunnaista tuotetta taulukossa.
   */
  public function haeSatunnaisestiTuoteita($i)
  {
    $arvotut = array(); // Taulukko satunnaisesti arvotuille tuotteilla.
    $idt = array(); // Idt taulukkon tallennetaan jo arvottujen tuotteiden idt, jotta voidaan tarkastaa
    // in_array-metodilla, onko tuote jo arvottu.
    $tuotteet = $this->findAll(); // Haetaan kaikki tuotteet tietokannasta.
    // Jos tuotteita on enemmän kuin $i, voidaan arpoa tuotteista $i satunnaista.
    if (count($tuotteet) > $i) {
      $tuotteita = 0;
      while ($tuotteita < $i) { // Arvotaan niin kauan, että $i eri tuotetta on löytynyt.
        $tuote = $tuotteet[rand(0, count($tuotteet) - 1)]; // Arvotaan tuote taulukosta välillä 0 - taulukon koko.
        if (!in_array($tuote['id'], $idt)) { // Tarkastetaan, että tuote ei ole jo arvottu.
          array_push($idt, $tuote['id']); // Lisätään id, jotta voidaan tarkastaa, onko tuote jo taulukossa.
          array_push($arvotut, $tuote); // Lisätään tuote taulukkoon.
          $tuotteita++; // Kasvatetaan arvottujen tuotteiden lukumäärää, jotta while loppuu joskus.
        }
      }
      return $arvotut; // Palautetaan arvotut.
    } else { // Tuotteita 3 tai vähemmän, joten palautetaan kaikki.
      return $tuotteet; // Palautetaan tuotteet suoraan, koska niitä on 3 tai vähemmän.
    }
  }
}
