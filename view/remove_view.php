<section class="remove">
    <div class="container col-12 col-sm-6 col-md-6">
        <div class="form-wrap">
        	<h1>Effectuer un retrait</h1>
            <form method="post" action="index.php">
                <div class="form-group">
                    <input type="text" name="amount" class="form-control" placeholder="somme que vous souhaitez retirer">
                </div>
                <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
                <input type="submit" class="btn btn-custom btn-lg btn-block" value="Retrait" name="remove">
            </form>
            <hr>
        </div>
    </div>
</section>
