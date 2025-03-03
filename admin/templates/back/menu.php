
<?php
// Vérifie si un onglet est sélectionné, sinon la page de gestion des utilisateurs est mise par défaut (page 'users')
// Utilisation de basename pour sécuriser l'entrée
$page = isset($_GET['page']) ? basename($_GET['page']) : 'utilisateurs';
?>

<link rel="stylesheet" href="<?php echo $chemin . $pageCSS ?>">

<div class="d-flex">
    <!-- menu latéral -->
    <div id="sidebar">
        <h2>Gestion</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="?page=utilisateurs" class="nav-link">utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="?page=paris" class="nav-link">paris</a>
            </li>
            <li class="nav-item">
                <a href="?page=tournois" class="nav-link">tournois</a>
            </li>
        </ul>
    </div>

    <!-- Contenu principal -->
    <div id="content">
        <?php
        // Inclue dynamiquement le contenu en fonction de la page sélectionnée
        $cheminPage = 'control/' . $page . '.php';
        if (file_exists($cheminPage)) {
            echo "<h1>Gestion des $page </h1>";
            include($cheminPage);
        } else {
            echo "<h1>Page non trouvée</h1>";
        }
        ?>
    </div>
</div>