<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php
// Vérifie si un onglet est sélectionné, sinon la page de gestion des utilisateurs est mise par défaut (page 'users')
// Utilisation de basename pour sécuriser l'entrée
$page = isset($_GET['page']) ? basename($_GET['page']) : 'utilisateurs';
$pageCSS = "style.css";
?>

<link rel="stylesheet" href="<?php echo $racine_path . $chemin . $pageCSS ?>">

<div class="d-flex second-plan">
    <!-- menu latéral -->
    <div id="sidebar" class="third-plan">
        <h2>Gestion</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="?page=utilisateurs" class="nav-link first-plan first-plan-h">utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="?page=paris" class="nav-link first-plan first-plan-h">paris</a>
            </li>
            <li class="nav-item">
                <a href="?page=tournois" class="nav-link first-plan first-plan-h">tournois</a>
            </li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div>
        <?php
        // Inclue dynamiquement le contenu en fonction de la page sélectionnée
        $cheminPage = $racine_path . 'control/' . $page . '.php';
        if (file_exists($cheminPage)) {
            include($cheminPage);
        } else {
            $racine_path = '../../'; // Valeur par défaut si non défini
            echo "<h1>Page non trouvée</h1>";
        }
        ?>
    </div>
</div>