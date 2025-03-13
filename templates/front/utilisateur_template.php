<div class="container mt-3 text-white">
  <h2>Page Utilisateur</h2>
  <p>Click à l'intérieur des champs pour changer le champs :</p>
  <form action="/action_page.php">
    <div class="form-floating mb-3 mt-3 align-items-center second-plan text-black">
      <input type="text" class="form-control" id="text" placeholder="Enter Pseudo" name="pseudo">
      <label for="pwd"><?php echo $pseudo; ?></label>
    </div>
    <div class="form-floating mt-3 mb-3 align-items-center second-plan text-black">
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
      <label for="pwd"><?php echo $email; ?></label>
    </div>
    <div class="mb-3 align-items-center second-plan">
      <label for="mdp" class="form-label">Modifier le mot de passe :</label>
      <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
    </div>
    <div class="mb-3 align-items-center second-plan">
      <label for="mdp_valid" class="form-label">Confirmer le mot de passe :</label>
      <input type="password" class="form-control" id="mdp_valid" placeholder="Enter password" name="mdp_valid" required>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
  </form>
</div>