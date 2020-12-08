<h3><?= $otsikko ?></h3>

<table class="table">
<?php foreach($tilaukset as $tilaus): ?>
  <tr>
    <td><?= $tilaus['asiakas_id']?></td>
    <!-- <td><a href="<?= site_url('admin/poista_viesti/' . $tilaus['id'])?>"
            onclick="return confirm('Haluatko varmasti poistaa viestin?')">            
       Poista <i class="fas fa-trash"></i></a></td> -->
  </tr>
<?php endforeach;?>
</table>