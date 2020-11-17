<form method="post" action="<?= site_url('ostoskori/lisaa/' . $tuote['id']); ?>">
  <div class="row">
    <div class="col-md-6">
      <img class="img-fluid" src="<?= base_url('img/' . $tuote['kuva']) ?>" alt="Kuppi 1">
    </div>
    <div class="col-md-4">
      <p><?= $tuote['nimi']; ?></p>
      <p><?= $tuote['kuvaus']; ?></p>
      <p class="hinta"><?= $tuote['hinta']; ?> €</p>
      <button class="bnt btn-primary osta">Osta</button>
    </div>
  </div>
</form>