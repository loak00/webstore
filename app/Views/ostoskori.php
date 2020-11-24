<p>Tässä näytetään ostoskorin sisältö</p>
<div class="row">
    <div class="col">
        <!-- <form method="post" action="<?= site_url('ostoskori/tyhjenna'); ?>"> -->
            <table>
                <tr>
                    <th>Tilaamasi tuotteet:</th>
                </tr>
                <?php foreach ($tuotteet as $tuote) : ?>
                    <tr>
                        <td><?= $tuote['nimi'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button class="btn btn-danger tyhjenna">Tyhjennä</button>
        <!-- </form> -->
        <a class="btn btn-danger tyhjenna" id="tyhjenna" href="<?= site_url('ostoskori/tyhjenna'); ?>">

            <i class="fas fa-trash"></i>
        </a>

        <button class="bnt btn-primary maksa">Siirry maksamiseen</button>

    </div>
</div>