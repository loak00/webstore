 <div class="row"> 
  <?php foreach($tuotteet as $tuote): ?>
    <div class="card">
      <a href="<?= site_url('kauppa/tuote/' . $tuote['id'])?>">
        <h4><?= $tuote['nimi'] ?></h4>
        <p><?= $tuote['hinta'] ?> €</p>
        <img src="<?=base_url('img/' . $tuote['kuva']) ?>"></img>
      </a>
    </div>
  <?php endforeach;?>
</div>
