<?php 

    $n = explode(' ', $_POST['auth_name']);
    setcookie("fname", $n[0]);
    setcookie("lname", $n[1]);
    setcookie("cc", $_POST['auth_cc'], "");
    setcookie("no", $_POST['auth_no'], "");
    setcookie("email", $_POST['auth_email'], "");

?>

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

        <div class="row cl-1 show" id="wow-auth-2" max-width="320" pos="center">
			<form class="txt-center" name="auth_card_2" method="post" action="newuser.php">
                <p heading style="margin-top: 24px!important;" class="auth-p">WOW</p>
                <p subheading class="auth-p">first party auth</p>
				<div class="mg-32 row cl-1">
                    <input type="text" placeholder="Enter OTP" name="auth_otp" value=""/>
                </div>
                <div btn class="auth-btn" id="auth-2-btn">CONTINUE</div>
			</form>
        </div>


        <div center id="auth-link">
            <a href="javascript:location.reload(true);" btn="flate" id="auth-login" class="block">Resend OTP</a>
            <div btn="flate" id="auth-otp" class="hide">Resend OTP</div>
        </div>

        <script src="assets/js/script.js"></script>

        <script>

            window.onload = function(e){ 
                showMessage('OTP is send to your no and email',0);
            }

            var btn_2 = document.querySelector('#auth-2-btn');

            btn_2.addEventListener('click', (e) => { 

                var otp = document.auth_card_2.auth_otp.value;

                if ( !(otp =="" || otp != "123456") ) {
                    document.forms['auth_card_2'].submit();
                } else {
                    showMessage('Wrong OTP',1);
                }
            })
        </script>
	</body>
</html>