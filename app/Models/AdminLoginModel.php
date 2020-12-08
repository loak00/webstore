<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminLoginModel extends Model
{
    protected $table = 'admin';

    protected $allowedFields = ['adminname', 'password'];

    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
    }

    public function check($adminname, $password)
    {
        $this->where('adminname', $adminname);
        $query = $this->get();
        // print $this->getLastQuery();
        $row = $query->getRow();
        if ($row) {
            if (password_verify($password, $row->password)) {
                return $row;
            }
        }
        return null;
    }

    public function kirjautunut()
    {
        if (isset($_SESSION['admin'])) {
            $adminname = $_SESSION['admin']->adminname;
            return array($adminname,'logout', 'Kirjaudu ulos');
        }        
        return array('Kirjautuminen','/','Kirjaudu sisään');
    }

    public function logout()
    {
        $_SESSION['admin'] = null;
    }
}
