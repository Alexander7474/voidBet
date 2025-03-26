<form method="POST" action="">
    <div class="row align-items-center">
        <div class="col-2">
            <input type="text" name="nom_tournoi" value="<?php echo htmlspecialchars($nom); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="text" name="match" value="<?php echo htmlspecialchars($match); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="text" name="equipe1" value="<?php echo htmlspecialchars($equipe1); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="text" name="equipe2" value="<?php echo htmlspecialchars($equipe2); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="number" step="0.01" name="cote" value="<?php echo htmlspecialchars($valeur); ?>" class="form-control">
        </div>
        <div class="col-1 text-end">
            <input type="hidden" name="id_paris" value="<?php echo $paris->id_paris; ?>">
            <input type="submit" name="valider_modif" value="✔️ Enregistrer" class="btn btn-success btn-sm">
        </div>
        <div class="col-1 text-end">
            <form method="POST" action="">
                <input type="hidden" name="id_paris" value="<?php echo $paris->id_paris; ?>">
                <input type="submit" name="supprimer" value="Supprimer" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
</form>