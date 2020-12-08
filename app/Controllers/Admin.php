<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;
use App\Models\ViestiModel;
use App\Models\TuoteModel;


class Admin extends BaseController
{
  private $tuoteryhmaModel = null;
  private $loginModel = null;
  private $viestiModel = null;
  private $tuoteModel = null;


  function __construct()
  {
    $this->tuoteryhmaModel = new TuoteryhmaModel();
    $this->loginModel = new LoginModel();
    $this->viestiModel = new ViestiModel();
    $this->tuoteModel = new TuoteModel();

  }

  public function index()
  {
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['otsikko'] = 'Tuoteryhmät';
    echo view('templates/header_admin.php', $data);
    echo view('admin/tuoteryhma.php', $data);
    echo view('templates/footer.php');
  }

  public function tallenna()
  {
    if (!$this->validate([
      'nimi' => 'required|max_length[50]'
    ])) {

      echo view('templates/header_admin.php');
      echo view('admin/tuoteryhma_lomake.php');
      echo view('templates/footer.php');
    } else {
      $talleta['nimi'] = $this->request->getPost('nimi');
      $this->tuoteryhmaModel->save($talleta);
      return redirect('admin/index');
    }
  }

  public function poista($id)
  {
    $this->tuoteryhmaModel->poista($id);
    return redirect('admin/index');
  }

  public function poistaTuote($id)
  {
    $this->tuoteModel->poista($id);
    return redirect ('admin/index');
  }

  public function viestit()
  {
    $data['viestit'] = $this->viestiModel->haeViestit();
    $data['otsikko'] = 'Viestit/Yhteydenotot';
    echo view('templates/header_admin.php', $data);
    echo view('admin/viesti.php', $data);
    echo view('templates/footer.php');
  }

  public function poista_viesti($id)
  {
    $this->viestiModel->poista($id);
    return redirect('admin/viestit');
  }
  

  //--------------------------------------------------------------------

}
