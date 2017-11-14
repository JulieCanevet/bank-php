<section id="home">
<button type="submit" name="plus" class="plus"><i class="fa fa-plus" aria-hidden="true"></i> Nouveau compte</button> <!-- add new account button -->
  <?php
  if(isset($counts)){ // display list of accounts
      foreach ($counts as $key => $value) {
  ?>
  <article class="line">
    <h3><?php echo $value['name'] ?></h3>

    <p>compte n°<?php echo $value['id'] ?></p>

    <h4 class="color">Montant : <span class="sum"><?php echo $value['amount'] ?></span>€</h4>
<article class="actions">
          <form method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button type="submit" name="removeForm">
              <i class="fa fa-minus-circle" aria-hidden="true"></i>
            </button>
          </form>

          <form method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button type="submit" name="transferForm"><i class="fa fa-exchange" aria-hidden="true"></i></button>
          </form>
          
          <form method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>">
            <button type="submit" name="addMoneyForm">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </button>
          </form>

          <form class="delete" method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $value['id']?>"/>
            <button type="submit" name="delete" onclick="if(!confirm('Etes-vous sur de vouloir supprimer ce compte ?')) return false;"><i class="fa fa-times" aria-hidden="true"></i></button>
          </form>
        </article>
</article>

  <?php }} ?>
</section>