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
	private $ostoskoriModel = null;

	function __construct()
	{
		$session = \Config\Services::session();
		$session->start();
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
		echo view('jarjesta');
		echo view('kauppa');
		echo view('templates/footer');
	}
	public function kalleinEnsin() {
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->laskevaHinta();
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('jarjesta');
		echo view('kauppa');
		echo view('templates/footer');
	}
	public function halvinEnsin() {
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->nousevaHinta();
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('jarjesta');
		echo view('kauppa');
		echo view('templates/footer');
	}
	public function aakkosetYlos() {
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->aakkosjarjestys();
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('jarjesta');
		echo view('kauppa');
		echo view('templates/footer');
	}
	public function aakkosetAlas() {
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['tuotteet'] = $this->tuoteModel->aakkosjarjestysAlas();
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		$data['login'] = $this->loginModel->kirjautunut();
		echo view('templates/header', $data);
		echo view('jarjesta');
		echo view('kauppa');
		echo view('templates/footer');
	}
	

	public function etsi()
	{
		$haku = $this->request->getPost('etsi');
		if (strlen($haku) > 0) {
			$_SESSION['haku'] = $haku;
		} else {
			$haku = $_SESSION['haku'];
		}

		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['login'] = $this->loginModel->kirjautunut();
		$data['tuotteet'] = $this->tuoteModel->haeTeksti($haku);
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		echo view('templates/header', $data);
		echo view('kauppa');
		echo view('templates/footer');
	}

	public function haeTietty($haku)
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		$data['login'] = $this->loginModel->kirjautunut();
		$data['tuotteet'] = $this->tuoteModel->haeTeksti($haku);
		$data['ostoskori_lkm'] = $this->ostoskoriModel->ostoskori_lkm();
		echo view('templates/header', $data);
		echo view('kauppa');
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------
}
