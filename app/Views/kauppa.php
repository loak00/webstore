 <div class="row pt-5">
<<<<<<< HEAD
   <?php foreach ($tuotteet as $tuote) : ?>
     <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-100 testi">
=======
     <?php foreach ($tuotteet as $tuote) : ?>
      <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-100 text-center">
>>>>>>> 2f25bc60a3bcfad65937c7c5cf60445d7061d021
         <a href="<?= site_url('kauppa/tuote/' . $tuote['id']) ?>">
           <div class="card-body">
             <h5 class="card-title"><?= $tuote['nimi'] ?></h5>
             <h5 class="card-header"><?= $tuote['hinta'] ?> €</h5>
             <img class="img-fluid" src="<?= base_url('img/' . $tuote['kuva']) ?>" alt="<?= $tuote['kuvan_kuvaus'] ?>"></img>
<<<<<<< HEAD
             <p><?= $tuote['kuvaus'] ?></p>
             <form method="post" action="<?= site_url('ostoskori/lisaa2/' . $tuote['id'] . "/" . $tuote['tuoteryhma_id']); ?>">
               <button class="bnt btn-primary osta">Lisää koriin</button>
=======
             <p class="card-footer text-muted"><?= $tuote['kuvaus'] ?></p>
             <form method="post" action="<?= site_url('ostoskori/lisaa2/' . $tuote['id']); ?>">
               <button class="bnt btn-success">Lisää koriin</button>
>>>>>>> 2f25bc60a3bcfad65937c7c5cf60445d7061d021
             </form>
           </div>
         </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>