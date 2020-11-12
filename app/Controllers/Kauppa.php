<?php namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;

class Kauppa extends BaseController
{
  private $tuoteryhmaModel=null;
	private $tuoteModel=null;

	function __construct()
  {
    $this->tuoteryhmaModel = new TuoteRyhmaModel();
    $this->tuoteModel = new TuoteModel();
  }


	public function index($tuoteryhma_id)
	{
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['tuotteet'] = $this->tuoteModel->haeTuoteRyhmalla($tuoteryhma_id);
		echo view('templates/header',$data);
		echo view('kauppa');
		echo view('templates/footer');
	}


  public function tuote($tuote_id) {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['tuote'] = $this->tuoteModel->haeTuote($tuote_id);
		echo view('templates/header',$data);
		echo view('tuote',$data);
		echo view('templates/footer');
  }

	//--------------------------------------------------------------------

}
