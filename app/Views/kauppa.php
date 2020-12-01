 <div class="row pt-5">
   <?php foreach ($tuotteet as $tuote) : ?>
     <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-auto text-center">
         <a href="<?= site_url('kauppa/tuote/' . $tuote['id']) ?>">
           <div class="card-body shadow p-3">
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