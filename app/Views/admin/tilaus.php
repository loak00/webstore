<?php
use App\Libraries\Util;
?>
<h3><?= $otsikko ?></h3>
<table class="table">
<?php $tilaus_id = 0; ?>
<?php foreach($tilaukset as $tilaus): ?>

<tr>
  <?php if ($tilaus_id != $tilaus['tilausid']) {?>
  <td><?=$tilaus['tilausid']?></td> 
  <td><?=Util::sqlDateToFi($tilaus['paivays'])?></td> 
  <td><?=$tilaus['sukunimi']?></td>
  <td><?=$tilaus['etunimi']?></td>
  <?php } else { ?>
    <td></td><td></td><td></td><td></td>
  <?php } ?>  

  <td><?=$tilaus['nimi']?></td>
  <td><?=$tilaus['maara']?></td>
  <?php if ($tilaus_id != $tilaus['tilausid']) {?>
    <!-- <td><a href="#">Toimita</a></td> -->
    <td><a href="<?= site_url('tilaus/poista/'. $tilaus['tilausid'])?>" onclick="return confirm('Haluatko varmasti poistaa tilauksen?');">Poista</a></td>
  <?php } else {?>
    <!-- <td></td> -->
    <td></td>
  <?php } ?>  
  <?php
  $tilaus_id = $tilaus['tilausid'];
  ?>
  <?php endforeach;?>
</table>