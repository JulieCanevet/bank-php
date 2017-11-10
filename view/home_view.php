<section id="home">
<button type="submit" name="plus" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button> <!-- Bouton d'ajout -->
  <?php
  if(isset($counts)){
      foreach ($counts as $key => $value) {
  ?>
    <h3><?php echo $value['name'] ?></h3>

   	<h4>Montant : <?php echo $value['amount'] ?>€</h4>
          <form class="card-button" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button type="submit" name="removeForm">Retrait</button>
          </form>

          <form class="card-button" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button type="submit" name="transfer">Virement</button>
          </form>
          
          <form class="card-button" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button type="submit" name="addMoneyForm">Ajouter</button>
          </form>

          <form class="card-button delete" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>"/>
            <input type="submit" name="delete" onclick="if(!confirm('Etes-vous sur de vouloir supprimer ce compte ?')) return false;" value="Supprimer"/>
          </form>
  <?php }} ?>
</section>