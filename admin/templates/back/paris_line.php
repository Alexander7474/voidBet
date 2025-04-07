<form method="POST" action="">
    <div class="row align-items-center">
        <div class="col-2 d-flex">
            <input type="text" name="nom_tournoi" value="<?php echo htmlspecialchars($nom); ?>" class="form-control">
        </div>
        <div class="col-1 d-flex">
            <input type="text" name="match" value="<?php echo htmlspecialchars($match_format); ?>" class="form-control">
        </div>
        <div class="col-2 d-flex">
            <input type="date" name="date_paris" value="<?php echo htmlspecialchars($date_paris); ?>" class="form-control">
        </div>
        <div class="col-2 d-flex">
            <input type="text" name="equipe1" value="<?php echo htmlspecialchars($equipe1); ?>" class="form-control">
        </div>
        <div class="col-2 d-flex">
            <input type="text" name="equipe2" value="<?php echo htmlspecialchars($equipe2); ?>" class="form-control">
        </div>
        <div class="col-1 d-flex">
            <input type="number" step="0.01" name="cote" value="<?php echo htmlspecialchars($cote); ?>" class="form-control">
        </div>
        <div class="col-1 d-flex text-end">
            <input type="hidden" name="id_paris" value="<?php echo $id; ?>">
            <input type="submit" name="modifier" value="Enregistrer" class="btn btn-success btn-sm">
        </div>
        <div class="col-1 d-flex text-end">
            <form method="POST" action="">
                <input type="hidden" name="id_paris" value="<?php echo $id; ?>">
                <input type="submit" name="supprimer" value="Supprimer" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
</form>
<hr>