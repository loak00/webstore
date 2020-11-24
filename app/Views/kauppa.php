 <div class="row pt-5">
     <?php foreach ($tuotteet as $tuote) : ?>
      <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-100 testi">
         <a href="<?= site_url('kauppa/tuote/' . $tuote['id']) ?>">
           <div class="card-body">
             <h4 class="card-title">
               <?= $tuote['nimi'] ?>
             </h4>
             <h5><?= $tuote['hinta'] ?> €</h5>
             <img class="img-fluid" src="<?= base_url('img/' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img>
             <p><?= $tuote['kuvaus'] ?></p>
             <form method="post" action="<?= site_url('ostoskori/lisaa2/' . $tuote['id']); ?>">
               <button class="bnt btn-primary osta">Lisää koriin</button>
             </form>
           </div>
         </a>
       </div>
       </div>
     <?php endforeach; ?>
 </div>