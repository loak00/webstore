<?php

namespace App\Controllers;

use App\Models\TuoteryhmaModel;
use App\Models\TuoteModel;
use App\Models\LoginModel;


class Tuote extends BaseController
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
		
    }

    public function index($tuoteryhma_id = null)
	{
    // Jos tuoteryhmää ei välitetä parametrina, haetaan 1. tuoteryhmä tietokannasta ja näytetään
    // sen tuotteet.
    if ($tuoteryhma_id === null) {
      $tuoteryhma_id = $this->tuoteryhmaModel->haeEnsimmainenTuoteryhma();
    }

    // Haetaan ja aseteatan lomakkeella näytettävä tiedot muuttujiin.
    $data['tuoteryhma_id'] = $tuoteryhma_id;
    $data['tuoteryhmat'] = $this->tuoteryhmaModel->haeTuoteryhmat();
    $data['tuotteet'] = $this->tuoteModel->haeTuoteryhmalla($tuoteryhma_id);
    $data['otsikko'] = 'Tuotteet';
    echo view('templates/header_admin.php');
    echo view('admin/tuote.php',$data);
    echo view('templates/footer.php');
  }
    


    public function valitseRyhma() {
		$tuoteryhma_id = $this->request->getPost('tuoteryhma_id');
		$this->index($tuoteryhma_id);
      }
      
	  public function tallenna($tuoteryhma_id,$tuote_id = null) {
		// Asetetaan otsikko sen mukaan, ollaanko lisäämässä vai muokkaamassa tuotteen tietoja.
		if ($tuote_id != null || $this->request->getPost('id')!=null) {
		  $data['otsikko'] = "Muokkaa tuotetta";
		}
		else {
		  $data['otsikko'] = "Lisää tuote";
		}
	
		// Tuoteryhmän id kulkee mukana lomakkeella aina, koska tuote pitää aina tallentaa jonkin 
		// tuoteryhmän alle.
		$data['tuoteryhma_id'] = $tuoteryhma_id;
	
		// Jos post-metodi, yritetään tallentaa.
		if ($this->request->getMethod() === 'post') {
		  if (!$this->validate([
			'nimi' => 'required|max_length[50]',
			'hinta' => 'required'
		  ])) {  
			// Validointi ei mene läpi, palautetaan lomake näkyviin.
			$data['tuoteryhma_id'] = $tuoteryhma_id;
			$data['id'] = $this->request->getPost('id');
			$data['nimi'] = $this->request->getPost('nimi');
			$data['hinta'] = $this->request->getPost('hinta');
			$data['kuvaus'] = $this->request->getPost('kuvaus');
			$data['kuvan_kuvaus'] = $this->request->getPost('kuvan_kuvaus');
			$data['kuva'] = $this->request->getPost('kuva');
			$data['varastomaara'] = $this->request->getPost('varastomaara');
			$this->naytaLomake($data);
		  }
		  else {  // Tallennetaan.
	
			// Tallennetaan kuva ja luodaan thumbnail-samalla. Kuva ladataan, jos pystytään.
			// Tuotteen tiedot tallennetaan, vaikka kuvan lataus epäonnistuisi. Muokkaustilanteessa kuva voidaan jättää myös antamatta,
			// jolloin tuotteelle mahdollisesti jo aiemmin tallennettu kuva säilyy.
			$polku = ROOTPATH . '/public/img/';
			$tiedosto= $this->request->getFile('kuva');
			if ($tiedosto->isValid()) {
			  
			  $tiedosto->move($polku ,$tiedosto->getName());
	
			  \Config\Services::image()
			  ->withFile($polku . $tiedosto->getName())
			  ->fit(200, 200, 'center')
			  ->save($polku . 'thumb_' . $tiedosto->getName());
			  $talleta['kuva'] = $tiedosto->getName();
			}
	
			//Tallennetaan tuote tietokantaan.
			$talleta['tuoteryhma_id'] = $tuoteryhma_id;
			$talleta['id'] = $this->request->getPost('id');
			$talleta['nimi'] = $this->request->getPost('nimi');
			$talleta['hinta'] = $this->request->getPost('hinta');
			$talleta['kuvaus'] = $this->request->getPost('kuvaus');
			$talleta['kuvan_kuvaus'] = $this->request->getPost('kuvan_kuvaus');
			$talleta['varastomaara'] = $this->request->getPost('varastomaara');
			$this->tuoteModel->save($talleta);
			return redirect()->to(site_url('/tuote/index/' . $tuoteryhma_id));
		  }      
		}
		else { // Näytetään lomake, koska kyseessä on get-metodi eli lomakketta ollaan vasta tuomassa näytölle.
		  $data['id'] = '';
		  $data['nimi'] = '';
		  $data['hinta'] = 0;  
		  $data['kuvaus'] = '' ;
		  $data['kuvan_kuvaus'] = '' ;
		  $data['kuva'] = '';
		  $data['varastomaara'] = 0;
	
		  // Mikäli tuote on asetettu, ollaan muokkaamassa ja haetaan tietokannasta
		  // tiedot lomakkeelle.
		  if ($tuote_id != null) {
			$tuote = $this->tuoteModel->hae($tuote_id);
			$data['id'] = $tuote['id'];
			$data['nimi'] = $tuote['nimi'];  
			$data['hinta'] = $tuote['hinta'];  
			$data['kuvaus'] = $tuote['kuvaus'];
			$data['kuvan_kuvaus'] = $tuote['kuvan_kuvaus'];
			$data['kuva'] = $tuote['kuva'];
			$data['varastomaara'] = $tuote['varastomaara'];
		  }
		  $this->naytaLomake($data);
		}
	  }
	  private function naytaLomake($data) {
		echo view('templates/header_admin.php');
		echo view('admin/lisaatuote.php',$data);
		echo view('templates/footer.php');
	  }

}