<h3><?= $otsikko?></h3>

<table class="table">
<?php foreach($viestit as $viesti): ?>
  <tr>
    <td><?= $viesti['email']?></td>
    <td><?= $viesti['viesti']?></td>
    <td><a href="<?= site_url('admin/poista_viesti/' . $viesti['id'])?>"
            onclick="return confirm('Haluatko varmasti poistaa viestin?')">            
       Poista <i class="fas fa-trash"></i></a></td>
  </tr>
<?php endforeach;?>
</table>