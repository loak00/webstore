 <div class="row pt-5">
   <?php foreach ($tuotteet as $tuote) : ?>
     <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-100 text-center shadow">
         
         <a href="<?= site_url('kauppa/tuote/' . $tuote['id']) ?>">
           <div class="card-body">
          
             <h5 class="card-title"><?= $tuote['nimi'] ?></h5>
             
             <img class="img-fluid zoom2" src="<?= base_url('img/thumb_' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img>
             
             <div style="height: 12em;">
             <p class="kuvausteksti text-muted"><?= $tuote['kuvaus'] ?></p>
             </div>
             
             <div class="d-flex justify-content-between align-items-center">
             <p class="hinta"><?= $tuote['hinta'] ?> €</p>
             <form method="post" action="<?= site_url('ostoskori/lisaa/' . $tuote['id'] . "/" . $tuote['tuoteryhma_id']); ?>">
               <button class="bnt btn-primary shadow rounded"><i class="fas fa-shopping-basket"></i> &nbsp Lisää koriin</button>
             </form>
             </div>

           </div>
         </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>