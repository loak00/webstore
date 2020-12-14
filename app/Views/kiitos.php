<div class="row text-center">
    <div class="col-md-8">
        <p>
            <h2>Kiitos tilauksestasi!</h2>
        </p>
        <span>
            <a class="nav-link" href="<?= site_url('home/index'); ?>">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Takaisin verkkokauppaan</a>
        </span>
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