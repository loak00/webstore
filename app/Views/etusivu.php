    <div class="row align-items-center justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-8 text-center">

            <div class="w-100 d-block d-md-none d-lg-none">
                <form class="input-group" method="post" action="<?= site_url('kauppa/etsi/') ?>">
                    <input class="form-control border border-right-0" type="search" aria-label="Search" name="etsi" placeholder="Etsi tuotteista...">
                    <span class="input-group-append">
                        <button class="btn btn-outline-dark border border-left-0" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </form>
            </div>

            <div class="list-group pt-4 mb-3">
                <?php foreach ($tuoteryhmat as $tuoteryhma) : ?>
                    <a class="list-group-item shadow-sm p-3" href="<?= site_url('kauppa/index/' . $tuoteryhma['id']) ?>"><?= $tuoteryhma['nimi'] . " &nbsp; " . $tuoteryhma['kuvake'] ?></a>
                <?php endforeach; ?>
                <a class="list-group-item shadow-sm p-3" href="<?= site_url('kauppa/kaikki') ?>"> Kaikki tuotteet <i class="fas fa-search text-muted ml-2"></i></a>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 d-none d-sm-none d-md-block">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <a href="<?= site_url('kauppa/haeTietty/') . 'muumi' ?>"> <img class="d-block img-fluid shadow" src="<?= base_url('img/promo1sm.jpg') ?>" alt="First slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="<?= site_url('kauppa/haeTietty/') . 'mariskooli' ?>"> <img class="d-block img-fluid shadow" src="<?= base_url('img/promo2sm.jpg') ?>" alt="Second slide"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="<?= site_url('kauppa/haeTietty/') . 'kolpakko' ?>"> <img class="d-block img-fluid shadow" src="<?= base_url('img/promo3sm.jpg') ?>" alt="Third slide"></a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>