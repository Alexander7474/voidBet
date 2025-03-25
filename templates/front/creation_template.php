<div class="container  text-white rounded pb-3 pt-3 mb-3 mt-3 second-plan w-25">
    <h3 class="text-center">Page de création de compte</h3>
    <p class="text-center">Complétez tous les champs</p>
        
    <form action="<?php echo $racine_path;?>control/connexion.php?create=ok" method="POST" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Enter pseudo" name="pseudo" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="age" class="form-label">Age :</label>
            <input type="number" class="form-control" id="age" placeholder="Enter age" name="age" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Adresse email :</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
        </div>
        <div class="mb-3">
            <label for="mdp_2" class="form-label">Répéter le mot de passe :</label>
            <input type="password" class="form-control" id="mdp_2" placeholder="Enter password" name="mdp_2" required>
        </div>
  <div class="row">
      <div class="col">
      </div>    
      <div class="col text-end">
        <button type="submit" class="btn btn-primary">Créer le compte</button>
      </div>    
    </div>

    <?php
    if($error_message != ""){
      echo '
       <p>
          <div class="alert alert-danger">
          <strong>Erreur! </strong> '.$error_message.'
          </div>
        </p>
      ';
      }
    ?>

</form>
</div>
