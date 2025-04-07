
    <div class="container text-white">
        <h2 class="border-bottom w-100 mt-5 mb-5">Liste de tous les paris</h2>

            <?php if (!isset($_POST['ajout_pari'])): ?>
            <form method="post">
                <button type="submit" name="ajout_pari" class="btn btn-primary mb-3">+ Ajouter un pari</button>
                <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
            </form>
            <?php else: ?>
            <form method="post" class="mb-3">
                <div class="row g-2 align-items-center">
                    <div class="col-2"><input class="form-control" type="text" name="nom" placeholder="Tournoi" required></div>
                    <div class="col-2"><input class="form-control" type="text" name="match" placeholder="Match" required></div>
                    <div class="col-2"><input class="form-control" type="date" name="date_paris" required></div>
                    <div class="col-2"><input class="form-control" type="text" name="equipe1" placeholder="Équipe 1" required></div>
                    <div class="col-2"><input class="form-control" type="text" name="equipe2" placeholder="Équipe 2" required></div>
                    <div class="col-1"><input class="form-control" type="number" name="cote" placeholder="Cote" step="0.01" required></div>
                    <div class="col-auto d-flex gap-2">
                        <button type="submit" name="ajouter" class="btn btn-primary">Valider</button>
                        <button type="submit" name="annuler" class="btn btn-danger">Annuler</button>
                    </div>
                    <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
            </form>
            <?php endif; ?>

            <div class="mb-3 p-2 w-100 text-center align-items-center rounded first-plan">
                <div class="row mt-1 mb-1">
                    <div class="col-2 d-flex">Tournois</div>
                    <div class="col-1 d-flex">Match</div>
                    <div class="col-2 d-flex">date</div>
                    <div class="col-2 d-flex">Équipe 1</div>
                    <div class="col-2 d-flex">Équipe 2</div>
                    <div class="col-1 d-flex">Cote</div>
                </div>
                <hr>