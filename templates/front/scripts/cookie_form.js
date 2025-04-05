  // Vérifie si l'utilisateur a déjà fait un choix
  if (document.cookie.includes("cookies_accepted=true") || document.cookie.includes("cookies_accepted=false")) {
    document.getElementById("cookie-banner").classList.add("d-none");
  }

  // Accepter les cookies
  document.getElementById("acceptCookies").addEventListener("click", function () {
    document.cookie = "cookies_accepted=true; path=/; max-age=" + 60 * 60 * 24 * 180; // 180 jours
    document.getElementById("cookie-banner").classList.add("d-none");
    // Tu peux ici déclencher d'autres scripts (ex : Google Analytics)
  });

  // Refuser les cookies
  document.getElementById("refuseCookies").addEventListener("click", function () {
    document.cookie = "cookies_accepted=false; path=/; max-age=" + 60 * 60 * 24 * 180;
    document.getElementById("cookie-banner").classList.add("d-none");
  });
