<?php namespace App\Controllers;

use App\Models\TuoteryhmaModel;

class Home extends BaseController
{
	private $tuoteryhmaModel=null;

	function __construct()
  {
    $this->tuoteryhmaModel = new TuoteryhmaModel();
  }


	public function index()
	{
		$data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
		echo view('templates/header',$data);
		echo view('etusivu', $data);
		echo view('templates/footer');
	}

	//--------------------------------------------------------------------

}
