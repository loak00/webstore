<?php namespace App\Controllers;

use App\Models\OstoskoriModel;
use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;

class Ostoskori extends BaseController
{
  private $tuoteryhmaModel=null;
  private $tuoteModel=null;
  private $loginModel = null;

	function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->ostoskoriModel = new OstoskoriModel();
    $this->tuoteModel = new TuoteModel();
    $this->loginModel = new LoginModel();
  }

	public function index()
	{
        $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
        echo view('templates/header', $data);
		echo view('ostoskori.php');
		echo view('templates/footer');
    }
}