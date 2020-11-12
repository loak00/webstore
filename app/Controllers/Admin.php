<?php namespace App\Controllers;

use App\Models\TuoteryhmaModel;

class Admin extends BaseController
{
  private $tuoteryhmaModel=null;

  function __construct()
  {
    $this->tuoteryhmaModel = new TuoteryhmaModel();
  }

	public function index()
	{
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['otsikko'] = 'Tuoteryhmät';
    echo view('templates/header_admin.php');
    echo view('admin/tuoteryhma.php',$data);
    echo view('templates/footer.php'); 
	}

  public function tallenna() {
    if (!$this->validate([
      'nimi' => 'required|max_length[50]'
    ])) {
      
      echo view('templates/header_admin.php');
      echo view('admin/tuoteryhma_lomake.php');
      echo view('templates/footer.php');
    }
    else {
      $talleta['nimi'] = $this->request->getPost('nimi');
      $this->tuoteryhmaModel->save($talleta);
      return redirect('admin/index');
    }
  }

  public function poista($id) {
    $this->tuoteryhmaModel->poista($id);
    return redirect ('admin/index');
  }

	//--------------------------------------------------------------------

}