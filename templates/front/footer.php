<div class="second-plan text-white">
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-6">
        <h5>Naviguer</h5>
        <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="<?php echo $racine_path;?>" class="nav-link p-0 text-body-secondary">Home</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $racine_path.'match';?>" class="nav-link p-0 text-body-secondary">Matchs</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $racine_path.'tournament';?>" class="nav-link p-0 text-body-secondary">Tournois</a></li>
          <li class="nav-item mb-2"><a href="<?php echo $racine_path.'team';?>" class="nav-link p-0 text-body-secondary">Équipes</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
        </ul>
      </div>

      <div class="col-6">
      <form action="<?php echo $racine_path;?>contact">
          <h5>Contact us</h5>
          <div class="w-100 gap-2 col">
            <div class="row m-1">
              <input id="email" type="text" class="form-control" placeholder="Email address">
            </div>            
            <div class="row m-1">
              <textarea id="message" class="form-control" placeholder="Message"></textarea>
            </div>            
            <input type="hidden" value="<?php echo $_SESSION['csrf'];?>" name="csrf">
            <div class="row m-1 text-en">
              <button class="btn btn-primary w-25" type="submit">Envoyer</button>
            </div>            
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>&copy; 2024 VoidBet, Inc. All rights reserved.</p>
    </div>
  </footer>
</div>
</div>
  </body>
</html>
