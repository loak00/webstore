<h3><?= $otsikko?></h3>
<div>
<?= anchor('admin/tallenna','Lisää uusi')?>
</div>
<table class="table">
<?php foreach($tuoteryhmat as $tuoteryhma): ?>
  <tr>
    <td><?= $tuoteryhma['nimi']?></td>
    <td><?= anchor('admin/poista/' . $tuoteryhma['id'],'Poista')?></td>
  </tr>
<?php endforeach;?>
</table>
