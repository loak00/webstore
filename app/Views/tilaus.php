<!-- Tämän sivun tilauslomake siirretty ostoskori.php -näkymään -->
<h3>Kirjaudu</h3>
<form action="<?= site_url('ostoskori/tilaa')?>" method="post">>
    <div class="col-12">
        <?= \Config\Services::validation()->listErrors(); ?>
    </div>
    <div class="form-group">
        <label>Etunimi</label>
        <input
            class="form-control"
            name="nimi"
            placeholder="Etunimi"
            maxlength="30">
    </div>
    <div class="form-group">
        <label>Sukunimi</label>
        <input
            class="form-control"
            name="sukunimi"
            
            placeholder="Sukunimi"
            maxlength="30">
    </div>
    <div class="form-group">
        <label>Osoite</label>
        <input
            class="form-control"
            name="osoite"
            
            placeholder="Osoite"
            maxlength="30">
    </div>
    <div class="form-group">
        <label>Postinumero</label>
        <input
            class="form-control"
            name="postinro"
            type="number"
            placeholder="Postinumero"
            maxlength="30">
    </div>
    <div class="form-group">
        <label>Postitoimipaikka</label>
        <input
            class="form-control"
            name="postitmp"
            
            placeholder="Postitoimipaikka"
            maxlength="30">
    </div>
    <button class="btn btn-primary">Vahvista tilaus</button>
    
</form>