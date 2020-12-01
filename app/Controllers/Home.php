<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;
use App\Models\OstoskoriModel;

class Home extends BaseController
{
	private $tuoteryhmaModel = null;
	private $tuoteModel = null;
	private $ostoskoriModel=null;
	private $LoginModel = null;

	function __construct()
	{
		$this->tuoteryhmaModel = new TuoteryhmaModel();
		$this->tuoteModel = new TuoteModel();
		$this->loginModel = new LoginModel();
		$this->ostoskoriModel = new OstoskoriModel();
	}


	public function index()
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['login'] = $this->loginModel->kirjautunut();
		$data['tuotteet'] = $this->tuoteModel->haeSatunnaisestiTuoteita(4);
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		echo view('templates/header', $data);
		echo view('etusivu');
		echo view('kauppa');
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
