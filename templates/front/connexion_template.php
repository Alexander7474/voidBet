<div class="container  text-white rounded mb-3 mt-3 second-plan ">
    <h3>Page de connexion</h3>
    <p>Complétez tous les champs</p>
        
    <form action="<?php echo $racine_path;?>control/utilisateur.php" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Enter pseudo" name="pseudo" required>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
        </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
</div>
