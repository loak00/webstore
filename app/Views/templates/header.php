<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>">
  <!-- link rel="preconnect" href="https://fonts.gstatic.com" -->
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
  <title>Cippoi & Cuppei</title>
</head>
<!-- Tee bootstrap-asettelu oikein ja paljon muuta -->

<body>
  <div class="container-fluid">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="overlay">
        <p class="logo logo_font">Cippoi & Cuppei</p>
      </div>
      <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="http://placehold.it/900x350&text=1st" height="250px" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://placehold.it/900x350&text=2nd" height="250px" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://placehold.it/900x350&text=3rd" height="250px" alt="Third slide">
          </div>
        </div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand logo" href="<?= site_url('Home/index') ?>">Cippoi & Cuppei</a>
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
                <?php foreach ($tuoteryhmat as $tuoteryhma) : ?>
                  <a class="dropdown-item" href="<?= site_url('kauppa/index/' . $tuoteryhma['id']) ?>"><?= $tuoteryhma['nimi'] ?></a>
                <?php endforeach; ?>
              </div>
            </li>
          </ul>

          <!-- Lisätty pohjaa mahdolliselle etsintämahdollisuudelle -->
          <form class="mx-2 my-auto d-inline w-50">
            <div class="input-group">
              <input type="text" class="form-control border border-right-0" placeholder="Etsi tuotteista...">
              <span class="input-group-append">
                <button class="btn btn-outline-light border border-left-0" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>

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
            <li class="nav-item">
              <a id="login" class="nav-link" href="<?= site_url('login/index'); ?>">
                Kirjaudu
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">