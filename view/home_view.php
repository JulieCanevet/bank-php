<section id="home">
<button type="submit" name="plus" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button> <!-- Bouton d'ajout -->
  <?php
  if(isset($counts)){
      foreach ($counts as $key => $value) {
  ?>
    <h3><?php echo $value['name'] ?></h3>

   	<h6>Montant : <?php echo $value['amount'] ?>€</h6>
          <form class="card-button" id="edit" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php //echo $value['id']?>">
            <button type="submit" name="edit">Modifier</button>
          </form>

          <form class="card-button delete" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php //echo $value['id']?>"/>
            <input type="submit" id="suppr" name="delete" onclick="if(!confirm('Etes-vous sur de vouloir supprimer ce véhicule ?')) return false;" value="Supprimer"/>
          </form>
  <?php }} ?>
</section>