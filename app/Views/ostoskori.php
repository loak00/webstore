<p>Tässä näytetään ostoskorin sisältö</p>
<div class="row">
    <div class="col">
        <form method="post" action="<?= site_url('Home/index'); ?>">
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
        <button class="bnt btn-primary maksa">Siirry maksamiseen</button>
        </form>
    </div>
</div>