<?php
$valisumma = 0;
$loppusumma = 0;
?>
<div class="row pt-5">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col" class="d-none d-sm-table-cell" style="width: 10%">Tuotekuva</th>
                    <th style="width: 10%">Tuotenimi</th>
                    <th style="width: 5%">kpl</th>
                    <th scope="col" class="d-none d-sm-table-cell" style="width: 5%">Hinta</th>
                    <th style="width: 5%">Yhteensä</th>
                    <th style="width: 5%"> <span class="d-none d-md-inline"> Poista &nbsp </span>
                        <a id="tyhjenna" href="<?= site_url('ostoskori/tyhjenna'); ?>" data-toggle="tooltip" title="Tyhjennä ostokori">
                            <i class="fas fa-trash" onclick="return confirm('Haluatko varmasti tyhjentää ostoskorin?')"></i></a>
                    </th>
                </tr>
            </thead>
            <?php foreach ($tuotteet as $tuote) : ?>
                <?php
                $valisumma = $tuote['hinta'] * $tuote['maara'];
                $loppusumma += $tuote['hinta'] * $tuote['maara'];
                ?>
                <tr>
                    <td class="d-none d-sm-table-cell"><img class="img-fluid" style="min-width: 2em; min-height: 2em; max-height: 5em;" src="<?= base_url('img/thumb_' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img></td>
                    <td><?= $tuote['nimi'] ?>
                    <td>
                        <a href="<?= site_url('ostoskori/vahenna/' . $tuote['id']) ?>">
                            <i class="fa fa-minus red"></i></a> <br class="d-lg-none">
                        <span style="font-weight:700; margin: 0em 1em 0em 1em;"><?= $tuote['maara'] ?></span> <br class="d-lg-none">
                        <a href="<?= site_url('ostoskori/lisaa/' . $tuote['id']) ?>">
                            <i class="fa fa-plus green"></i></a>
                    </td>
                    <td scope="col" class="d-none d-sm-table-cell"><?= $tuote['hinta'] ?> €</td>
                    <td><?= number_format($valisumma, 2) ?> €</td>
                    <td><a href="<?= site_url('ostoskori/poista/' . $tuote['id']) ?>" onclick="return confirm('Haluatko varmasti poistaa tuotteen ostoskorista?')">
                            <i class="fas fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-md-12 mx-auto text-center">
        <span class="float-right">
            Hinta yhteensä: <br>
            <p style="font-weight: 700;"> <?= number_format($loppusumma, 2); ?> €</p>
        </span>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h4 class="mb-5">Tilaajan tiedot</h4>
                <form action="<?= site_url('ostoskori/tilaa') ?>" method="post">
                    <div class="col-12">
                        <?= \Config\Services::validation()->listErrors(); ?>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Etunimi</label>
                            <input class="form-control" name="etunimi" placeholder="Etunimi" maxlength="30" value="<?= $asiakas['firstname'] ?>">
                        </div>
                        <div class="col-sm-6">
                            <label>Sukunimi</label>
                            <input class="form-control" name="sukunimi" placeholder="Sukunimi" maxlength="30" value="<?= $asiakas['lastname'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Lähiosoite</label>
                            <input class="form-control" name="lahiosoite" placeholder="Lähiosoite" maxlength="30" value="<?= $asiakas['lahiosoite'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <label>Postinumero</label>
                            <input class="form-control" name="postinumero" type="number" placeholder="Postinumero" maxlength="30" value="<?= $asiakas['postinumero'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <label>Postitoimipaikka</label>
                            <input class="form-control" name="postitoimipaikka" placeholder="Postitoimipaikka" maxlength="30" value="<?= $asiakas['postitoimipaikka'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label>Sähköposti</label>
                            <input name="email" placeholder="Sähköposti" type="email" maxlength="255" class="form-control" value="<?= $asiakas['email'] ?>">
                        </div>
                        <div class="col-sm-6">
                            <label>Puhelinnumero</label>
                            <input name="puhelin" placeholder="Puhelinnumero" maxlength="20" class="form-control" value="<?= $asiakas['puhelin'] ?>">
                        </div>
                    </div>
                <button class="btn btn-primary float-right">Vahvista tilaus</button>
            </div>
        </div>
        </form>
    </div>
</div>