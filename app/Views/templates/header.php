<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/css/style.css');?>">
    <!-- link rel="preconnect" href="https://fonts.gstatic.com" -->
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <title>Cippoi & Cuppei</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand logo" href="#">Cippoi & Cuppei</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tuotteet
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach($tuoteryhmat as $tuoteryhma): ?>
                <a class="dropdown-item" href="<?=site_url('kauppa/index/' . $tuoteryhma['id']) ?>"><?=$tuoteryhma['nimi']?></a>
              <?php endforeach;?>
            </div>
          </li>
        </ul>    
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Yhteystiedot</a>
          </li>
          <li class="nav-item">
            <a id="kori" class="nav-link" href="<?= site_url('ostoskori/index'); ?>">
              <i class="fas fa-shopping-cart">
              </i>
            </a>
          </li>
        </ul>  
      </div>
    </nav>
    <div class="container">