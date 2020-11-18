<?php namespace App\Controllers;

use App\Models\TuoteryhmaModel;


class Yhteystiedot extends BaseController
{
  private $tuoteryhmaModel=null;
  
  public function __construct()
  {
      $session = \Config\Services::session();
      $session->start();
      $this->tuoteryhmaModel = new TuoteRyhmaModel();
  }
	
	public function index()
	{
        $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
        echo view('templates/header', $data);
		echo view('yhteystiedot.php');
		echo view('templates/footer');
    }
}