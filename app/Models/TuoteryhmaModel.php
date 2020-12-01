<?php namespace App\Models;

use CodeIgniter\Model;

class TuoteryhmaModel extends Model {
  protected $table = 'tuoteryhma';
  protected $allowedFields = ['nimi'];

  public function haeTuoteryhmat() {
    return $this->findAll();
  }
  public function haeEnsimmainenTuoteryhma() {
    $this->select('id');
    $this->orderBy('id','asc');
    $this->limit(1);
    $query = $this->get();
    $tuoteryhma = $query->getRowArray();
    return $tuoteryhma['id'];
  }

  public function poista($id) {
    // Delete from tuoteryhma where id = 3
    $this->where('id',$id);
    $this->delete();
  }
}