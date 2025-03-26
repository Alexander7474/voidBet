
<h3 class="mt-1 mb-1 border-bottom w-100">Formulaire de paris</h3>    
<div class="mb-3 p-2 text-white w-100 text-center align-items-center rounded first-plan">
  <div class="card-body">
      <form method="GET" action="<?php  echo $match_bet_link; ?>">
        <div class="form-check mb-3 d-flex justify-content-start">
            <input class="form-check-input" type="checkbox" id="toggleScore" name="on_score" onclick="toggleScoreFields()">
            <label class="form-check-label" for="toggleScore">
                Entrer des scores
            </label>
        </div>

        <input name="match_id" type="hidden" value="<?php echo $match_id; ?>"/>

        <div class="form-group d-flex justify-content-start" id="resultatField">
            <label for="resultat">Résultat:</label>
            <select class="form-control m-2" id="resultat" name="result">
                <option value="victoire">Victoire</option>
                <option value="defaite">Défaite</option>
                <option value="egalite">Égalité</option>
            </select>
        </div>

        <div class="form-group d-none d-flex justify-content-start" id="scoreFields">
          <label>Score <?php  echo $team1;?>:</label>
          <input type="number" class="form-control m-2" id="score1" name="score1" placeholder="Score" value="0">
          <label>Score <?php  echo $team2;?>:</label>
          <input type="number" class="form-control m-2" id="score2" name="score2" placeholder="Score" value="0">
        </div>

        <div class="form-group d-flex justify-content-start" id="teamField">
            <label for="couleur">Équipe:</label>
            <select class="form-control m-2" id="couleur" name="selected_team">
              <option value="<?php  echo $team1; ?>"><?php  echo $team1; ?></option>
              <option value="<?php  echo $team2; ?>"><?php  echo $team2; ?></option>
            </select>
        </div>

        <div class="form-group d-flex justify-content-start">
            <label for="valeur">Valeur parié:</label>
            <input type="number" class="form-control m-2" id="valeur" step="0.01" name="bet_value" placeholder="Entrez une valeur" required>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <button type="reset" class="btn btn-secondary">Annuler</button>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>
    </form>
  </div>
</div>

<script src="<?php echo $racine_path; ?>templates/front/scripts/bet_form.js"></script>
