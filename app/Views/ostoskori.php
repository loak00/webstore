<?php
$valisumma = 0;
$loppusumma = 0;
?>
<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <td></td>
                <td>Tuote</td>
                <td>Kpl</td>
                <td></td> 
                <td></td>
                <td>Hinta</td>
                <td>Yhteensä</td>
            </tr>
            <?php foreach ($tuotteet as $tuote) : ?>
                <?php
                $valisumma = $tuote['hinta'] * $tuote['maara']; 
                $loppusumma += $tuote['hinta'] * $tuote['maara'];
                ?>
                <tr>
                    <td><img class="img-fluid" style="width: 100px; height: 100px;" src="<?= base_url('img/thumb_' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img></td>
                    <td><?= $tuote['nimi'] ?></td>
                    <td><?= $tuote['maara'] ?></td>
                    <td><a href="<?= site_url('ostoskori/lisaa/' . $tuote['id']) ?>">
                            <i class="fa fa-plus"></i></a></td>
                    <td><a href="<?= site_url('ostoskori/vahenna/' . $tuote['id']) ?>">
                            <i class="fa fa-minus"></i></a></td>
                 
                    <td><?= $tuote['hinta'] ?> €</td>
                    <td><?= number_format($valisumma, 2) ?> €</td>
                    <td><a href="<?= site_url('ostoskori/poista/' . $tuote['id']) ?>" onclick="return confirm('Haluatko varmasti poistaa tuotteen ostoskorista?')">
                            Poista tuote <i class="fas fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td> 
                <td></td>             
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td>            
                <td><?= number_format($loppusumma, 2);?> €</td>             
            </tr>
            <tr>
                <td></td>
                <td></td> 
                <td></td>             
                <td></td>             
                <td></td>             
                <td>
                    <a id="tyhjenna" href="<?= site_url('ostoskori/tyhjenna'); ?>">Tyhjennä ostoskori
                        <i class="fas fa-trash" onclick="return confirm(
                'Haluatko varmasti tyhjentää ostoskorin?')"></i>
                    </a>
                </td>
            </tr>
        </table>
        <h3>Tilaajan tiedot</h3>
        <form action="<?= site_url('ostoskori/tilaa') ?>" method="post">
            <div class="col-12">
                <?= \Config\Services::validation()->listErrors(); ?>
            </div>      
            <div class="form-group">
                <label>Etunimi</label>
                <input class="form-control" name="etunimi" placeholder="Etunimi" maxlength="30" value="<?=$asiakas['firstname']?>">
            </div>
            <div class="form-group">
                <label>Sukunimi</label>
                <input class="form-control" name="sukunimi" placeholder="Sukunimi" maxlength="30" value="<?=$asiakas['lastname']?>">
            </div>
            <div class="form-group">
                <label>Lähiosoite</label>
                <input class="form-control" name="lahiosoite" placeholder="Lähiosoite" maxlength="30" value="<?=$asiakas['lahiosoite']?>">
            </div>
            <div class="form-group">
                <label>Postinumero</label>
                <input class="form-control" name="postinumero" type="number" placeholder="Postinumero" maxlength="30" value="<?=$asiakas['postinumero']?>">
            </div>
            <div class="form-group">
                <label>Postitoimipaikka</label>
                <input class="form-control" name="postitoimipaikka" placeholder="Postitoimipaikka" maxlength="30" value="<?=$asiakas['postitoimipaikka']?>">
            </div>
            <div class="form-group">
                <label>Sähköposti</label>
                <input name="email" type="email" maxlength="255" class="form-control" value="<?=$asiakas['email']?>">
            </div>
            <div class="form-group">
                <label>Puhelin</label>
                <input name="puhelin" maxlength="20" class="form-control" value="<?=$asiakas['puhelin']?>">
            </div>
            <button class="btn btn-primary">Vahvista tilaus</button>
        </form>
    </div>
</div>