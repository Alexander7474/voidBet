<div class="container text-white">
    <div class="row pt-2 pb-2">
      <div class="col d-flex justify-content-start">
        <a class="navbar-brand fs-3" href="<?php echo $racine_path."index.php"; ?>">Void Bet</a>
      </div>   
      <div class="col d-flex justify-content-center fs-3">
          <a class="nav-link nav-link ps-2 pe-2" href="<?php echo $racine_path."control/match.php"; ?>">Matchs</a>
          <a class="nav-item nav-link ps-2 pe-2" href="<?php echo $racine_path."control/tournament.php"; ?>">Tournois</a>
          <a class="nav-item nav-link ps-2 pe-2" href="<?php echo $racine_path."control/team.php"; ?>">Équipe</a>
          <!-- <a class="nav-item nav-link ps-2 pe-2" href="#">Joueurs</a>A voir pour plus tard -->
      </div>  
      <div class="col d-flex justify-content-end">
      <?php if(!isset($session_user)) {?>
        <a href="<?php echo $racine_path; ?>control/connexion.php"><button class="btn btn-primary my-2 my-sm-0" type="submit">Connexion</button></a>
      <?php }else{?>
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="col">
            <div class="row">
              <span class="text-end">Nom Utilisateur</span>
            </div>
            <div class="row">
              <span class="badge text-end">100 💵</span>
            </div>
          </div>
          <div class="col">
            <img src="<?php echo $racine_path; ?>templates/front/img/profil.png" class="rounded-circle ms-2" width="40" height="40">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Mon Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="<?php echo $racine_path; ?>control/connexion.php">Déconnexion</a></li>
        </ul>
      <?php }?>
      </div>   
    </div>
</div>
