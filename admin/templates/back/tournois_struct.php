
    <div class="container text-white">
        <h2 class="border-bottom w-100 mt-5 mb-5">Liste de tous les tournois</h2>

        <?php if (!isset($_POST['ajout_tournoi'])): ?>
        <form method="post">
            <button type="submit" name="ajout_tournoi" class="btn btn-primary mb-3">+ Ajouter un tournoi</button>
        </form>
        <?php else: ?>
        <form method="post" class="mb-3">
            <div class="row g-2 align-items-center">
                <div class="col"><input class="form-control" type="text" name="nom_tournoi" placeholder="Nom du tournoi" required></div>
                <div class="col"><input class="form-control" type="number" name="cash_prize" placeholder="Cash Prize" required></div>
                <div class="col"><input class="form-control" type="date" name="date_debut" required></div>
                <div class="col-auto d-flex gap-2">
                    <button type="submit" name="ajouter" class="btn btn-primary">Valider</button>
                    <button type="submit" name="annuler" class="btn btn-danger">Annuler</button>
                </div>
            </div>
        </form>
        <?php endif; ?>

        <div class="mb-3 p-2 w-100 text-center align-items-center rounded first-plan">
            <div class="row mt-1 mb-1">
                <div class="col-2 d-flex">Tournois</div>
                <div class="col-2 d-flex">Cash Prize</div>
                <div class="col-1 d-flex">Niveau</div>
                <div class="col-2 d-flex">Date</div>
                <div class="col-2 d-flex">Participants</div>
            </div>
            <hr>
