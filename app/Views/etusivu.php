    <div class="row">
        <div class="col-lg-3 text-center">
            <div class="list-group pt-4">
                <?php foreach ($tuoteryhmat as $tuoteryhma) : ?>
                    <a class="list-group-item shadow-sm p-3" href="<?= site_url('kauppa/index/' . $tuoteryhma['id']) ?>"><?= $tuoteryhma['nimi'] ." &nbsp; ". $tuoteryhma['kuvake']?></a>
                <?php endforeach; ?>
                <a class="list-group-item shadow-sm p-3" href="<?= site_url('kauppa/kaikki') ?>"> Kaikki tuotteet <i class="fas fa-search text-muted ml-2"></i></a>
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