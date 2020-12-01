<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;
use App\Models\OstoskoriModel;

class Kauppa extends BaseController
{
	private $tuoteryhmaModel = null;
	private $tuoteModel = null;
	private $loginModel = null;
	private $ostoskoriModel=null;

	function __construct()
	{
		$this->tuoteryhmaModel = new TuoteRyhmaModel();
		$this->tuoteModel = new TuoteModel();
		$this->loginModel = new LoginModel();
		$this->ostoskoriModel = new OstoskoriModel();
	}


	public function index($tuoteryhma_id)
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->haeTuoteRyhmalla($tuoteryhma_id);
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('kauppa');
		echo view('templates/footer');
	}


	public function tuote($tuote_id)
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuote'] = $this->tuoteModel->haeTuote($tuote_id);
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('tuote', $data);
		echo view('templates/footer');
	}

	public function kaikki()
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->haeKaikkiTuotteet();
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('kauppa');
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

	

}
