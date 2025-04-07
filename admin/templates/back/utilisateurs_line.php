<form method="POST" action="">
    <div class="row align-items-center">
        <div class="col-3 d-flex">
            <input type="text" name="pseudo" value="<?php echo htmlspecialchars($user_pseudo); ?>" class="form-control">
        </div>
        <div class="col-3 d-flex">
            <input type="email" name="email" value="<?php echo htmlspecialchars($user_mail); ?>" class="form-control">
        </div>
        <div class="col-2 d-flex">
            <input type="number" name="void_coin" value="<?php echo htmlspecialchars($user_vc); ?>" class="form-control">
        </div>
        <div class="col-1 d-flex text-end">
            <input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
            <input type="submit" name="valider_modif" value="Enregistrer" class="btn btn-success btn-sm">
        </div>
        <div class="col-1 d-flex text-end">
            <form method="POST" action="">
                <input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
                <input type="submit" name="supprimer" value="Supprimer" class="btn btn-danger btn-sm">
            </form>
        </div>
    </div>
    <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
</form>
<hr>