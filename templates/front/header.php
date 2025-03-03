<!DOCTYPE html>
<html>
	<head>
  <title><?php echo $title; ?></title>
		
		<!-- lien CDN pour un framework CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

		<!-- mon CSS -->
		<link rel="stylesheet" href="<?php echo $racine_path."templates/front/css/style.css"; ?>">
		
	</head>
	
<body class="third-plan">
	<header class="second-plan align-items-center">
    <?php include("menu_nav.php"); ?>
  </header> 
