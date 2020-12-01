<h3><?= $otsikko?></h3>
<div>

<form action="/tuote/valitseryhma/" method="post">
<label>Tuoteryhmä</label>
<select name="tuoteryhma_id" onChange="this.form.submit()">
<?php foreach($tuoteryhmat as $tuoteryhma): ?>
  <option value="<?=$tuoteryhma['id']?>"
  <?php
  // Asetetaan tuoteryhmä valituksi pudotuslistassa kirjoittamalla selected html:n sekaan oikeaan kohtaan.
  if ($tuoteryhma['id'] === $tuoteryhma_id) {
    print " selected";
  }
  ?>
  >
    <?= $tuoteryhma['nimi']?>
  </option>
<?php endforeach;?>
</select>
</form>
</div>
<div>
<?= anchor('kauppa/tallenna/' . $tuoteryhma_id,'Lisää uusi')?>
</div>
<table class="table">
<?php foreach($tuotteet as $tuote): ?>
  <tr>
    <td><?= $tuote['nimi']?></td>
    <td><?= $tuote['hinta']?> €</td>
    <td><?= $tuote['varastomaara']?></td>
    <td><?= anchor('tuote/tallenna/' . $tuoteryhma_id . '/' . $tuote['id'],'Muokkaa')?></td>
  </tr>
<?php endforeach;?>
</table>