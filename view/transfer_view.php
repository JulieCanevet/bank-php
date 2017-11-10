<section class="transmitterCount">
    <div class="container col-12 col-sm-6 col-md-6">
        <div class="form-wrap">
        	<h1>Numéro du compte emmeteur</h1>
            <form method="post" action="index.php">
                <div class="form-group">
                    <input type="text" name="transmitterCount" class="form-control" placeholder="Nom du compte emmeteur">
                </div>
            <hr>
        </div>
    </div>
</section>



                <div class="form-group">
                    <input type="text" name="transferSum" class="form-control" placeholder="Somme que vous voulez virer">
                </div>



<section class="receiverCount">
    <div class="container col-12 col-sm-6 col-md-6">
        <div class="form-wrap">
            <h1>Numéro du compte receveur</h1>
                <div class="form-group">
                    <input type="text" name="receiverCount" class="form-control" placeholder="somme que vous souhaitez ajouter">
                </div>
                
                <input type="hidden" name="id" value="<?php echo $_POST['id']?>">
                <input type="submit" class="btn btn-custom btn-lg btn-block" value="transfer" name="transfer">
            </form>
            <hr>
        </div>
    </div>
</section>




