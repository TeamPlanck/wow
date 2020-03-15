<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="generator" content="Ygohel18">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="assets/img/ic-wow.png" type="image/x-icon">
		<meta name="description" content="">
		<title>wow - Signup</title>
		
		<!-- CSS File -->	
			<link rel="stylesheet" href="assets/css/style.css">
	</head>
	
	<body> 

        <section id="cover" center>
            <a href="index.php"><img src="assets/img/ic-wow.png" class="auth-icon"></a>
        </section>

    
        <div class="row cl-1 show" id="wow-auth-3" max-width="320" pos="center">
			<form class="txt-center" name="auth_card_3" method="post" action="../planck/api.php">
                <p heading style="margin-top: 24px!important;" class="auth-p">WOW</p>
                <p subheading class="auth-p">first party auth</p>
				<div class="mg-32 row cl-1">
                    <input type="hidden" value="<?php echo $_COOKIE['fname']; ?>" name="fname" />
                    <input type="hidden" value="<?php echo $_COOKIE['lname']; ?>" name="lname" />
                    <input type="hidden" value="<?php echo $_COOKIE['cc']; ?>" name="cc" />
                    <input type="hidden" value="<?php echo $_COOKIE['no']; ?>" name="no" />
                    <input type="hidden" value="<?php echo $_COOKIE['email']; ?>" name="email" />
                    <input type="hidden" value="signup" name="api" />
                    <input type="hidden" value="http://localhost/wow/index.php" name="url" />        
                    <input type="text" placeholder="Set Username" name="username" value=""/>
                    <input type="password" placeholder="Set Password" name="password" value=""/>
                    <input type="password" placeholder="Retype Password" name="pass" value=""/>
                </div>
                <div btn class="auth-btn" id="auth-3-btn" name="signup">SIGNUP</div>
			</form>
        </div>


        <div center id="auth-link">
            <a href="login.php" btn="flate" id="auth-login" class="block">Already have an account</a>
            <div btn="flate" id="auth-otp" class="hide">Resend OTP</div>
        </div>

        <script src="assets/js/script.js"></script>

        <script>
     
            var btn_3 = document.querySelector('#auth-3-btn');

            btn_3.addEventListener('click', (e) => { 

                var username = document.auth_card_3.username.value;
                var pass = document.auth_card_3.password.value;
                var pass_2 = document.auth_card_3.pass.value;

                if ( !(username =="" || pass =="") ) {
                    if( pass != pass_2 ) {
                        showMessage('Enter same password',1);
                    } else {
                        document.forms['auth_card_3'].submit();
                    }
                } else {
                    showMessage('Fill all the details',1);
                }
            })
        </script>
	</body>
</html>