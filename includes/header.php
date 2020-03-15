<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="generator" content="ygohel18">
		<link rel="shortcut icon" href="./assets/img/ic-wow.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Welcome to Expense Tracker">
		<title>
			<?php if(isset($page_title)) echo $page_title; else echo "WOW"; ?>
		</title>
		
		<!-- CSS File -->
		<link href="./assets/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
		
		<!-- JS Files -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="./assets/js/script.js"></script>

		<script>
			
		</script>

	</head>
	
	<body>
	<div header="fixed">
		<a href="index.php"> 
			<img src="./assets/img/icon.png" height="64px" width="64px" alt="Icon ET" class="animated bounceInLeft"/>
		</a>

		<div class="header-link"><?php 
			if($is_login == false) {
				echo '<a href="./signup.php" btn="flate">GET STARTED</a>'; 
			} else {
				echo '<a href="#" btn="flate">UPLOAD</a>'; 
			}
		?></div>
	</div>
	
		
		