<h3><?= $otsikko?></h3>
<div>
  <?= \Config\Services::validation()->listErrors();?>
</div>
<form action="/tuote/tallenna/<?= $tuoteryhma_id?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $id?>">
  <div class="form-group">
    <label>Nimi</label>
    <input name="nimi" class="form-control" maxlength="50" value="<?= $nimi?>"/>
  </div>
  <div class="form-group">
    <label>hinta</label>
    <input name="hinta" class="form-control" type="number" step="0.01" value="<?= $hinta?>"/>
  </div>
  <div class="form-group">
    <label>Kuvaus</label>
    <textarea name="kuvaus" class="form-control"><?= $kuvaus?></textarea>
  </div>
  <div class="form-group">
    <label>Kuvan kuvaus</label>
    <textarea name="kuvan_kuvaus" class="form-control"><?= $kuvan_kuvaus?></textarea>
  </div>
  <div class="form-group">
    <label>Kuva</label>
    <input name="kuva" class="form-control" type="file">
    <?php 
    // Jos tuotteella on kuva, tulostetaan näkyviin lomakkeelle.
    if ($kuva !== '') {
      $polku = base_url('img/thumb_' . $kuva);
      print "<img src='" .$polku  . "'/>";
    }
    ?>
  </div>
  <div class="form-group">
    <label>Varastomäärä</label>
    <input name="varastomaara" class="form-control" type="number" step="0.01" value="<?= $varastomaara?>"/>
  </div>
  <button>Tallenna</button>
</form><!--  -->