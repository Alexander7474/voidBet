<div class="container mt-3 text-white">
  <h2>Page Utilisateur</h2>
  <p>Click à l'intérieur des champs pour changer le champs :</p>
  <form action="<?php echo $racine_path; ?>control/utilisateur.php" method="POST">
    <div class="form-floating mb-3 mt-3 align-items-center second-plan text-black">
      <input type="text" class="form-control" id="text" placeholder="Enter Pseudo" name="pseudo" value="<?php echo $session_user->pseudo; ?>">
      <label>Pseudo</label>
    </div>
    <div class="form-floating mt-3 mb-3 align-items-center second-plan text-black">
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $session_user->email; ?>">
      <label>Email</label>
    </div>
    <div class="form-floating mb-3 mt-3 align-items-center second-plan text-black">
      <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp">
      <label>Changer le mot de passe</label>
    </div>
    <div class="form-floating mb-3 mt-3 align-items-center second-plan text-black">
      <input type="password" class="form-control" id="mdp_valid" placeholder="Enter password" name="mdp_valid">
      <label>Confirmer le nouveau mot de passe</label>
    </div>
    <button type="submit" class="btn btn-primary mb-2 mt-2">Soumettre</button>
    <?php 
    include $racine_path."templates/front/error_msg.php";
    ?>
  </form>
</div>
