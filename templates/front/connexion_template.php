<div class="container  text-white rounded mb-3 mt-3 second-plan ">
    <h3>Page de connexion</h3>
    <p>Complétez tous les champs</p>
        
    <form action="../../control/connexion.php" class="was-validated">
        <div class="mb-3 mt-3">
            <label for="uname" class="form-label">Surnom :</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
        </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
</div>
