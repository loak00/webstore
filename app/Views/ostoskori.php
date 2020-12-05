<?php
$summa = 0;
?>
<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>Tilaamasi tuotteet:</th>
            </tr>
            <?php foreach ($tuotteet as $tuote) : ?>
                <tr>
                    <td><img class="img-fluid" style="width: 100px; height: 100px;" src="<?= base_url('img/thumb_' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img></td>
                    <td><?= $tuote['nimi'] ?></td>
                    <td><?= $tuote['hinta'] ?> €</td>

                    <td><a href="<?= site_url('ostoskori/poista/' . $tuote['id']) ?>" onclick="return confirm('Haluatko varmasti poistaa tuotteen ostoskorista?')">
                            Poista <i class="fas fa-trash"></i></a></td>
                </tr>
                <?php
                $summa += $tuote['hinta']; //Tätä myöhemmin muutettava, kun määrän hallinta toimii
                ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td><?= $summa ?></td>
                <td>
                    <a id="tyhjenna" href="<?= site_url('ostoskori/tyhjenna'); ?>">Tyhjennä ostoskori
                        <i class="fas fa-trash" onclick="return confirm(
                'Haluatko varmasti tyhjentää ostoskorin?')"></i>
                    </a>
                </td>
            </tr>
        </table>

        <a class="btn btn-success kassalle" id="kassalle" href="<?= site_url('ostoskori/siirryTilaamaan'); ?>">
            <i class="fas fa-car"></i>
        </a>

    </div>
</div>