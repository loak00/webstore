<?php

namespace App\Models;

use CodeIgniter\Model;

class UutiskirjeModel extends Model
{
    protected $table = 'uutiskirjeentilaajat';

    protected $allowedFields = ['email'];

    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
    }

}
