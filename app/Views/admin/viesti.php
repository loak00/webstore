<h3><?= $otsikko?></h3>

<table class="table">
<?php foreach($viestit as $viesti): ?>
  <tr>
    <td><?= $viesti['email']?></td>
    <td><?= $viesti['viesti']?></td>
    <td><?= anchor('admin/poista_viesti/' . $viesti['id'],'Poista')?></td>
  </tr>
<?php endforeach;?>
</table>