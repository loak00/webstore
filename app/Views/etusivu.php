    <div class="row">
        <div class="col-lg-3">
            <!-- <h4 class="my-4">Lisää</h4> -->
            <div class="list-group pt-4">
                <?php foreach ($tuoteryhmat as $tuoteryhma) : ?>
                    <a class="list-group-item" href="<?= site_url('kauppa/index/' . $tuoteryhma['id']) ?>"><?= $tuoteryhma['nimi'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="<?= base_url('img/promo1sm.jpg') ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="<?= base_url('img/promo2sm.jpg') ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="<?= base_url('img/promo3sm.jpg') ?>" alt="Third slide">
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
            <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
    <div class="row pt-5">
        <?php foreach ($tuotteet as $tuote) : ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 text-center">
                    <a href="<?= site_url('kauppa/tuote/' . $tuote['id']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $tuote['nimi'] ?></h5>
                            <h5 class="card-header"><?= $tuote['hinta'] ?> €</h5>
                            <img class="img-fluid" src="<?= base_url('img/' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img>
                            <p class="card-footer text-muted"><?= $tuote['kuvaus'] ?></p>
                            <form method="post" action="<?= site_url('ostoskori/lisaa2/' . $tuote['id'] . "/" . $tuote['tuoteryhma_id']); ?>">
                                <button class="bnt btn-success">Lisää koriin</button>
                            </form>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>