<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;

class Kauppa extends BaseController
{
	private $tuoteryhmaModel = null;
	private $tuoteModel = null;
	private $loginModel = null;

	function __construct()
	{
		$this->tuoteryhmaModel = new TuoteRyhmaModel();
		$this->tuoteModel = new TuoteModel();
		$this->loginModel = new LoginModel();
	}


	public function index($tuoteryhma_id)
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->haeSatunnaisestiTuotetta(4);
		echo view('templates/header', $data);
		echo view('kauppa');
		echo view('templates/footer');
	}


	public function tuote($tuote_id)
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuote'] = $this->tuoteModel->haeTuote($tuote_id);
		echo view('templates/header', $data);
		echo view('tuote', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
