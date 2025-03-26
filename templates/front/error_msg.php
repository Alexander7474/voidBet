
    <?php
    if(isset($error_message)){
      echo '
       <p>
          <div class="alert alert-danger">
          <strong>Erreur! </strong> '.$error_message.'
          </div>
        </p>
      ';
    }
    if(isset($success_message)){
      echo '
       <p>
          <div class="alert alert-success">
          <strong>Success! </strong> '.$success_message.'
          </div>
        </p>
      ';
      }
    ?>
