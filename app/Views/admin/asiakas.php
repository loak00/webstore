
<h3><?= $otsikko ?></h3>
<table class="table">
    <?php foreach ($asiakkaat as $asiakas) : ?>

        <tr>
            <td><?= $asiakas['id'] ?></td>
            <td><?= $asiakas['etunimi'] ?></td>
            <td><?= $asiakas['sukunimi'] ?></td>
            <td><?= $asiakas['postitoimipaikka'] ?></td>
            <td><?= $asiakas['email'] ?></td>
            <td><?= $asiakas['puhelin'] ?></td>
        <?php endforeach; ?>
</table>