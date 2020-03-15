<?php session_start(); ?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="generator" content="Ygohel18">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="assets/img/ic-wow.png" type="image/x-icon">
		<meta name="description" content="">
		<title>wow - Login</title>
		
		<!-- CSS File -->	
            <link rel="stylesheet" href="assets/css/style.css">
	</head>
	
	<body> 

        <section id="cover" center>
            <a href="index.php"><img src="assets/img/ic-wow.png" class="auth-icon"></a>
        </section>

        <div class="row cl-1 show" id="wow-auth-1" max-width="320" pos="center">
			<form class="txt-center" name="login" method="post" action="../planck/api.php">
                <p heading style="margin-top: 24px!important;" class="auth-p">WOW</p>
                <p subheading class="auth-p">first party login</p>
				<div class="mg-32 row cl-1">
                    <input type="text" placeholder="Username" name="login_username" value=""/>
                    <input type="password" placeholder="Password" name="login_password" value=""/>
                    <input type="hidden" value="login" name="api" />
                    <input type="hidden" value="http://localhost/wow/index.php" name="url" />
                </div>
                <a btn class="auth-btn" id="login-btn">LOGIN</a>
			</form>
        </div>

        <div center id="auth-link">
            <a href="signup.php" btn="flate" id="auth-signup" class="block">Didn't have an account</a>
        </div>

        <script src="js/fun.js"></script>

        <script>
        // var auth_1 = document.querySelector('#wow-auth-1');
        var login_btn = document.querySelector('#login-btn');

        login_btn.addEventListener('click', (e) => { 

            var username = document.login.login_username.value;
            var pass = document.login.login_password.value;

            if ( !(username =="" || pass =="") ) {
                 document.forms['login'].submit();
            } else {
                showMessage('Fill all the details',1);
            }
        })
        </script>
	</body>
</html>