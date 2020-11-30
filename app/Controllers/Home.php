<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;

class Home extends BaseController
{
	private $tuoteryhmaModel = null;
	private $tuoteModel = null;
	private $LoginModel = null;

	function __construct()
	{
		$this->tuoteryhmaModel = new TuoteryhmaModel();
		$this->tuoteModel = new TuoteModel();
		$this->loginModel = new LoginModel();
	}


	public function index()
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->haeSatunnaisestiTuoteita(4);
		echo view('templates/header', $data);
		echo view('etusivu', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
