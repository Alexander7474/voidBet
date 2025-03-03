
<h3 class="mt-1 mb-1 border-bottom w-100">Formulaire de paris</h3>    
<div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
  <div class="card-body">
      <form>
        <div class="form-check mb-3 d-flex justify-content-start">
            <input class="form-check-input" type="checkbox" id="toggleScore" onclick="toggleScoreFields()">
            <label class="form-check-label" for="toggleScore">
                Entrer des scores
            </label>
        </div>

        <div class="form-group d-flex justify-content-start" id="resultatField">
            <label for="resultat">Résultat:</label>
            <select class="form-control m-2" id="resultat" name="resultat">
                <option value="victoire">Victoire</option>
                <option value="defaite">Défaite</option>
                <option value="egalite">Égalité</option>
            </select>
        </div>

        <div class="form-group d-none d-flex justify-content-start" id="scoreFields">
          <label>Score <?php  echo $team1;?>:</label>
          <input type="number" class="form-control m-2" id="score1" name="score1" placeholder="Score">
          <label>Score <?php  echo $team2;?>:</label>
          <input type="number" class="form-control m-2" id="score2" name="score2" placeholder="Score">
        </div>

        <div class="form-group d-flex justify-content-start" id="teamField">
            <label for="couleur">Équipe:</label>
            <select class="form-control m-2" id="couleur" name="couleur">
            <option value="<?php  echo $team1; ?>"><?php  echo $team1; ?></option>
                <option value="<?php  echo $team2; ?>"><?php  echo $team2; ?></option>
            </select>
        </div>

        <div class="form-group d-flex justify-content-start">
            <label for="valeur">Valeur parié:</label>
            <input type="number" class="form-control m-2" id="valeur" name="valeur" placeholder="Entrez une valeur">
        </div>

        <div class="d-flex justify-content-between mt-3">
            <button type="reset" class="btn btn-secondary">Annuler</button>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
  </div>
</div>

<script src="<?php echo $racine_path; ?>templates/front/scripts/bet_form.js"></script>
