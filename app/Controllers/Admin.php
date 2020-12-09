<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\LoginModel;
use App\Models\ViestiModel;
use App\Models\AdminLoginModel;
use App\Models\TuoteModel;


class Admin extends BaseController
{
  private $tuoteryhmaModel = null;
  private $adminloginModel = null;
  private $loginModel = null;
  private $viestiModel = null;
  private $tuoteModel = null;


  function __construct()
  {
    $this->tuoteryhmaModel = new TuoteryhmaModel();
    $this->adminloginModel = new AdminLoginModel();
    $this->viestiModel = new ViestiModel();
    $this->tuoteModel = new TuoteModel();

  }

  public function index()
  {
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['otsikko'] = 'Tuoteryhmät';
    echo view('templates/header_admin.php', $data);
    echo view('admin/tuoteryhma.php', $data);
    echo view('templates/footer.php');
  }

  public function login()
  {
    echo view('admin/adminlogin.php');
  }

  public function tallenna()
  {
    if (!$this->validate([
      'nimi' => 'required|max_length[50]'
    ])) {
      if (!isset($_SESSION['admin'])){
        return redirect('adminlogin');
      }

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
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    return redirect('admin/index');
  }

  public function poistaTuote($id)
  {
    $this->tuoteModel->poista($id);
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    return redirect ('admin/index');
  }

  public function viestit()
  {
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    $data['viestit'] = $this->viestiModel->haeViestit();
    $data['otsikko'] = 'Viestit/Yhteydenotot';
    echo view('templates/header_admin.php', $data);
    echo view('admin/viesti.php', $data);
    echo view('templates/footer.php');
  }

  public function poista_viesti($id)
  {
    $this->viestiModel->poista($id);
    if (!isset($_SESSION['admin'])){
			return redirect('adminlogin');
		}
    return redirect('admin/viestit');
  }

  public function check() {
    // $model = new LoginModel();

    if (!$this->validate([
        'adminname' => 'required|min_length[8]|max_length[30]',
        'password' => 'required|min_length[8]|max_length[30]',
    ])){
        echo view('admin/adminlogin');
    }
    else {
        $user = $this->adminloginModel->check(
            $this->request->getVar('adminname'),
            $this->request->getVar('password')
        );
        if ($user) {
            $_SESSION['admin'] = $user;
            return redirect('admin/index');
        }
        else {
            echo view('admin/adminlogin');
        }
    }
   
}
public function logout() {
  $this->adminloginModel->logout();
  return redirect()->to(site_url('/'));		
} 
  

  //--------------------------------------------------------------------

}
