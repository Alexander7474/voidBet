<div class="container  text-white rounded pb-3 pt-3 mb-3 mt-3 second-plan w-25">
    <h3 class="text-center">Page de connexion</h3>
    <p class="text-center">Complétez tous les champs</p>
        
    <form action="<?php echo $racine_path;?>control/connexion.php" method="post" class="mb-3 was-validated">
        <div class="mb-3 mt-3">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Enter pseudo" name="pseudo" required>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
        </div>
    <div class="row">
      <div class="col">
        <a class="btn btn-primary" href="<?php echo $racine_path;?>control/connexion.php?create=ok">Créer un compte</a>
      </div>    
      <div class="col text-end">
        <button type="submit" class="btn btn-primary">Se connecter</button>
      </div>    
    </div>
    
    <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
    <?php 
    include $racine_path."templates/front/error_msg.php";
    ?>
   </form>
</div>
