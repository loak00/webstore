<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('/css/style.css'); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <title>Cippoi & Cuppei</title>
</head>

<body>
  <div class="container-fluid">
    
    <a href="<?= site_url('Home/index') ?>">
      <div class="carousel slide" data-ride="carousel" data-interval="10000">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active header-carousel" style="background-image:url(<?= base_url('img/w1.jpg') ?>); ">
            <div class="black-overlay"></div>
          </div>
          <div class="carousel-item header-carousel" style="background-image:url(<?= base_url('img/w2.jpg') ?>); ">
            <div class="black-overlay"></div>
          </div>
          <div class="carousel-item header-carousel" style="background-image:url(<?= base_url('img/w3.jpg') ?>); ">
            <div class="black-overlay"></div>
          </div>
          <div class="carousel-item header-carousel" style="background-image:url(<?= base_url('img/w4.jpg') ?>); ">
            <div class="black-overlay"></div>
          </div>
          <div class="carousel-item header-carousel" style="background-image:url(<?= base_url('img/w5.jpg') ?>); ">
            <div class="black-overlay"></div>
          </div>
          <div class="carousel-item header-carousel" style="background-image:url(<?= base_url('img/w6.jpg') ?>); ">
            <div class="black-overlay"></div>
          </div>
        </div>
      </div>
      <div class="logo-overlay">
        <h1 class="logo">Cippoi & Cuppei</h1>
        <p class="message">est. 2020</p>
      </div>
    </a>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg p-2 mb-3 rounded-bottom">

      <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <a class="navbar-brand" href="<?= site_url('Home/index') ?>"><i class="fas fa-home collapse navbar-collapse"></i></a>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tuotteet
            </a>
            <div class="dropdown-menu shadow-lg p-3 mb-5" aria-labelledby="navbarDropdown">
              <?php foreach ($tuoteryhmat as $tuoteryhma) : ?>
                <a class="dropdown-item" href="<?= site_url('kauppa/index/' . $tuoteryhma['id']) ?>"><?= $tuoteryhma['nimi'] ?></a>
              <?php endforeach; ?>
              <hr>
              <a class="dropdown-item" href="<?= site_url('kauppa/kaikki') ?>"> Näytä kaikki tuotteet</a>
            </div>
          </li>
        </ul>
        <form class="mx-2 w-25">
          <div class="input-group collapse navbar-collapse">
            <input type="text" class="form-control border border-right-0" placeholder="Etsi tuotteista...">
            <span class="input-group-append">
              <button class="btn btn-outline-light border border-left-0" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('yhteystiedot/index'); ?>">Yhteystiedot</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user pl-3"></i><?= " " . $login[0]; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a id="login" class="dropdown-item" href="<?= site_url('login/' . $login[1]); ?>">
                <?= $login[2] ?>
              </a>
            </div>
          </li>

          <li class="nav-item">
            <a id="kori" class="nav-link" href="<?= site_url('ostoskori/index'); ?>">
              <i class="fas fa-shopping-cart">
                <span class="badge badge-pill badge-danger"><?= $ostoskori_lkm ?></span>
              </i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- Tulostaa istuntomuuttujan debugaamista varten -->
  <!-- <?= print_r($_SESSION); ?> -->
  <div class="container">