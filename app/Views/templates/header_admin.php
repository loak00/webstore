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
    <title>Cippoi & Cuppei Control Panel</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Cippoi & Cuppei Control Panel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">    
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('admin/index/')?>">Tuoteryhmät</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('tuote/index/')?>">Tuotteet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('tilaus/index/')?>">Tilaukset</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('tilaus/asiakkaat/')?>">Asiakkaat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('admin/viestit/')?>">Viestit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('admin/logout/')?>">Kirjaudu ulos</a>
          </li>
        </ul>  
      </div>
    </nav>  
    <div class="container">