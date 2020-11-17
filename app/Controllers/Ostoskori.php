<?php namespace App\Controllers;

use App\Models\OstoskoriModel;
use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;

class Ostoskori extends BaseController
{
  private $tuoteryhmaModel=null;
  private $tuoteModel=null;

	function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->ostoskoriModel = new OstoskoriModel();
    $this->tuoteModel = new TuoteModel();
  }

	public function index()
	{
        $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
        echo view('templates/header', $data);
		echo view('ostoskori.php');
		echo view('templates/footer');
    }
}