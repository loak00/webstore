<?php

namespace App\Models;

use CodeIgniter\Model;

class ViestiModel extends Model
{
    protected $table = 'viesti';

    protected $allowedFields = ['email','viesti'];

    public function haeViestit() {
        return $this->findAll();
    }
    public function poista($id) {
        $this->where('id',$id);
        $this->delete();
    }
}
