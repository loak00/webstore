<p>Tässä näytetään ostoskorin sisältö</p>
<div class="row">
    <div class="col">
        <!-- <form method="post" action="<?= site_url('ostoskori/tyhjenna'); ?>"> -->
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
            <?php endforeach; ?>
        </table>
        <!-- </form> -->
        <a class="btn btn-danger tyhjenna" id="tyhjenna" href="<?= site_url('ostoskori/tyhjenna'); ?>" onclick="return confirm(
                'Haluatko varmasti tyhjentää ostoskorin?')">
            <i class="fas fa-trash"></i>
        </a>
        <a class="btn btn-primary kassalle" id="kassalle" href="<?= site_url('ostoskori/siirryTilaamaan'); ?>">
            <i class="fas fa-car"></i>
        </a>

    </div>
</div>