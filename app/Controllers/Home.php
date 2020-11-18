<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;

class Home extends BaseController
{
	private $tuoteryhmaModel = null;
	private $LoginModel = null;

	function __construct()
	{
		$this->tuoteryhmaModel = new TuoteryhmaModel();
		$this->loginModel = new LoginModel();
	}


	public function index()
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		echo view('templates/header', $data);
		echo view('etusivu', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
