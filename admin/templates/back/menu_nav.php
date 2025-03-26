<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo $racine_path . "templates/back/css/style.css" ?>">
</head>


<body class="d-flex third-plan">
    <!-- menu latéral -->
    <div id="sidebar" class="second-plan">
        <h2>Gestion</h2>
        <ul class="nav flex-column col d-flex justify-content-center fs-3">
            <li>
                <a href="<?php echo $racine_path."control/utilisateurs.php"; ?>" class="nav-link first-plan-h">utilisateurs</a>
            </li>
            <li>
                <a href="<?php echo $racine_path."control/paris.php"; ?>" class="nav-link first-plan-h">paris</a>
            </li>
            <li>
                <a href="<?php echo $racine_path."control/tournois.php"; ?>" class="nav-link first-plan-h">tournois</a>
            </li>
        </ul>
    </div>
