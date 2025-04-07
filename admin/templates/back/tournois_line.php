<form method="POST" action="">
    <div class="row align-items-center">
        <div class="col-2">
            <input type="text" name="nom_tournoi" value="<?php echo htmlspecialchars($tournament_name); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="number" name="cash_prize" value="<?php echo htmlspecialchars($tournament_cashprize); ?>" class="form-control">
        </div>
        <div class="col-1">
            <input type="text" name="tier" value="<?php echo htmlspecialchars($tournament_tier); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="date" name="date_debut" value="<?php echo htmlspecialchars($tournament_date); ?>" class="form-control">
        </div>
        <div class="col-2">
            <input type="text" name="equipes" value="<?php echo htmlspecialchars($tournament_teams); ?>" class="form-control">
        </div>
        <div class="col-1 text-end">
            <input type="hidden" name="id_tournoi" value="<?php echo $tournament_id; ?>">
            <input type="submit" name="modifier" value="Enregistrer" class="btn btn-success btn-sm">
        </div>
        <div class="col-1 text-end">
                <input type="hidden" name="id_tournoi" value="<?php echo $tournament_id; ?>">
                <input type="submit" name="supprimer" value="Supprimer" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
</form>
<hr>