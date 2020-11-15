<div>
<form method="post" action="<?= site_url('ostoskori/lisaa/' . $tuote['id']);?>">
    <div class="col-md-4">
      <img src="<?= base_url('img/' . $tuote['kuva'])?>" alt="">
    </div>
    <div class="col-md-4">
      <p><?= $tuote['nimi'];?></p>
      <p><?= $tuote['kuvaus'];?></p>
      <p class="hinta"><?= $tuote['hinta'];?> €</p>
      <button class="bnt btn-primary osta">Osta</button>
    </div>
</form>
</div>