<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'user';

    protected $allowedFields = ['username', 'password', 'firstname', 'lastname'];

    public function __construct()
    {
        $session = \Config\Services::session();
        $session->start();
    }

    public function check($username, $password)
    {
        $this->where('username', $username);
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
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user']->username;
            return array($username,'logout', 'Kirjaudu ulos');
        }        
        return array('Kirjautuminen','/','Kirjaudu sisään');
    }

    public function logout()
    {
        $_SESSION['user'] = null;
    }
}
