<form method="post" action="<?= site_url('ostoskori/lisaa/' . $tuote['id']); ?>">
  <div class="row mt-5">
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <img class="img-fluid tuotekuva shadow-lg rounded mb-3" src="<?= base_url('img/' . $tuote['kuva']) ?>"  alt="<?=$tuote['kuvan_kuvaus']?>">
    </div>
    <div class="col-md-4 text-center">
    <img class="img-fluid mb-2" src="<?= base_url('img/tuote-top.png') ?>" alt="Ylä-ornamentti">
      <h1 class="tuotelogo"><?= $tuote['nimi']; ?></h1>
      <p class="tuoteteksti"><?= $tuote['kuvaus']; ?></p>
      <p class="hinta"><?= $tuote['hinta']; ?> €</p>
      <p>Saatavuus: <?= $tuote['varastomaara']; ?></p>
      <button class="bnt btn-primary shadow rounded"><i class="fas fa-shopping-basket"></i> &nbsp Lisää koriin</button>
      <img class="img-fluid mt-3" src="<?= base_url('img/tuote-bottom.png') ?>" alt="Ala-ornamentti">
    </div>
  </div>
</form>