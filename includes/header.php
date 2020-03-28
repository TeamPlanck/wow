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
		<script src="https://kit.fontawesome.com/15cc6c2068.js" crossorigin="anonymous"></script>
		<script src="./assets/js/script.js"></script>

		<script>
			
		</script>

	</head>
	
	<body>
	<div header>
		<a href="index.php" > 
			<img src="./assets/img/icon.png" height="64px" width="64px" alt="Icon ET" class="header-icon animated bounceInLeft"/>
		</a>

		<?php 
			if ( isset( $_SESSION['login'] ) && $_SESSION['login'] == true ) {
				$user_url = "profile.php?username=%27".$_SESSION['username']."%27";
				echo '<a href="'.$user_url.'"><div class="header-profile" style="background-image: url('.$dp.');"></div></a>';
			}
		?>

		<div class="header-link"><?php 
			if( isset( $_SESSION['login'] ) && $_SESSION['login'] == false) {
				echo '<a href="./signup.php" btn="flate">GET STARTED</a>'; 
			} else {
				if ( isset($flag_upload) && $flag_upload == true ) {
					echo '<a href="index.php" btn="flate">CANCLE</a>';
				} else {
					echo '<a href="upload.php" btn="flate">UPLOAD</a>';
				}
			}
		?></div>
	</div>
	
		
		