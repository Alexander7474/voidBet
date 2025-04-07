<div class="container text-white">
    <h2 class="border-bottom w-100 mt-5 mb-5">Liste de tous les utilisateurs</h2>

    <?php if (!isset($_POST["afficher_form_ajout"])): ?>

    <!-- Bouton "Ajouter un utilisateur" -->
    <form method="POST" action="utilisateurs.php">
        <input type="submit" name="afficher_form_ajout" value="+ Ajouter un utilisateur" class="btn btn-primary mb-3">
        <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
    </form>

    <?php else: ?>
        <!-- Formulaire d'ajout avec bouton Annuler -->
        <form method="post" class="mb-3">
            <div class="row g-2 align-items-center">
                <div class="col-3"><input class="form-control" input type="text" name="new_pseudo" placeholder="Pseudo" required></div>
                <div class="col-3"><input class="form-control" input type="email" name="new_email" placeholder="Email" required></div>
                <div class="col-2"><input class="form-control" input type="number" name="new_age" placeholder="Âge" required></div>
                <div class="col-2"><input class="form-control" input type="password" name="new_password" placeholder="password" required></div>
                <div class="col-auto d-flex gap-2">
                    <button type="submit" name="ajouter" class="btn btn-primary">Valider</button>
                    <button type="submit" name="annuler" class="btn btn-danger">Annuler</button>
                </div>
            </div>
            <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
        </form>
    <?php endif; ?>

    <!-- Liste des utilisateurs -->
    <div class="mb-3 p-2 w-100 text-center align-items-center rounded first-plan">
        <div class="row mt-1 mb-1">
            <div class="col-3 d-flex">Pseudo</div>
            <div class="col-3 d-flex">Email</div>
            <div class="col-2 d-flex">VoidCoin</div>
        </div>
        <hr>