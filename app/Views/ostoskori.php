<p>Tässä näytetään ostoskorin sisältö</p>
<div class="row">
    <div class="col">
        <form method="post" action="<?= site_url('Home/index'); ?>">
        <table>
            <tr>
                <td>Tilaamasi tuotteet:</td>
            </tr>
            <tr>
                <td>Tähän tulee alekkain tilatut tuotteet</td>               
                <td>Tähän tulee alekkain kunkin tuotteen määrät</td>         
            </tr>
        </table>
        <button class="btn btn-danger tyhjenna">Tyhjennä</button>
        <button class="bnt btn-primary maksa">Siirry maksamiseen</button>
        </form>
    </div>
</div>