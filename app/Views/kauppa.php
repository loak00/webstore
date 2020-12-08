 <div class="row pt-5">
   <?php foreach ($tuotteet as $tuote) : ?>
     <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-auto text-center">
         <a href="<?= site_url('kauppa/tuote/' . $tuote['id']) ?>">
           <div class="card-body shadow p-3">
             <h5 class="card-title"><?= $tuote['nimi'] ?></h5>
             <h4><?= $tuote['hinta'] ?> €</h4>
             <img class="img-fluid zoom2" src="<?= base_url('img/thumb_' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img>
             <p class="text-muted korttifooter"><?= $tuote['kuvaus'] ?></p>
             <form method="post" action="<?= site_url('ostoskori/lisaa/' . $tuote['id'] . "/" . $tuote['tuoteryhma_id']); ?>">
               <button class="bnt btn-primary shadow rounded"><i class="fas fa-shopping-basket"></i> &nbsp Lisää ostokoriin</button>
             </form>
           </div>
         </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>