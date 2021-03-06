<div class="row text-center">
  <div class="col-md-4">
    <p>
      <h4>Löydät meidät täältä!</h4>
    </p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1686.2784642669205!2d25.475534252002312!3d64.9982826839089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4681cd4b2d725cd7%3A0xfcaccd3751e3b27!2sPaljetie%2010%2C%2090150%20Oulu!5e0!3m2!1sfi!2sfi!4v1605633454684!5m2!1sfi!2sfi" width="240" height="212" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>

  <div class="col-md-4 text-center">
    <p>
      <h4>Ota yhteyttä!</h4>
    </p>
    <p>Cippoi & Cuppei Oy <br>
      Paljetie 10 <br>
      90150 OULU</p>
    <p>tel. 044 777 6655</p>
    <p>email: info@cippoicuppei.com
    <h5>Jätä yhteydenottopyyntö</h5>
    <form method="post" action="<?= site_url('yhteystiedot/viesti/'); ?>">
    <div class="container">
        <input type="email" placeholder="Sähköpostiosoitteesi" name="mail2" required>
        <textarea name="viesti" placeholder="Kirjoita viestisi tähän" class="form-control" row="5"></textarea>
        <button class="bnt btn-primary laheta">Lähetä</button>
      </div>
      </form>
  </div>

  <div class="col-md-4 text-center">
    <form method="post" action="<?= site_url('yhteystiedot/uutiskirje/'); ?>">
      <div class="container">
        <p>
          <h4>Tilaa uutiskirje</h4>
        </p>
        <p>Saat sähköpostiisi kuukausittain postin uutuustuotteistamme ja verrattomista erikoisalennuksista! Täyttämällä yhteystietosi
          ja tilaamalla uutiskirjeen saat etuna 10% alennukseen oikeuttavan alennuskoodin! Tarkemmat ohjeet saat sähköpostiisi!</p>
      </div>
      <div class="container">
        <input type="email" placeholder="Sähköpostiosoitteesi" name="mail" required>
        <button class="bnt btn-primary tilaa">Tilaa tästä</button>
      </div>
    </form>
  </div>