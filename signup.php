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
      
        <div class="row cl-1 show" id="wow-auth-1" max-width="320" pos="center">
			<form class="txt-center" name="auth_card_1" method="post" action="otp.php">
                <p heading style="margin-top: 24px!important;" class="auth-p">WOW</p>
                <p subheading class="auth-p">first party auth</p>
				<div class="mg-32 row cl-1">
                    <input type="text" placeholder="Full Name" name="auth_name" value=""/>
                    <div class="row cl-1">
                        <input type="number" min="0" max="299" placeholder="Country Code" name="auth_cc" value=""/>    
                        <input type="number" placeholder="Mobile Number" maxlength="10" name="auth_no" value=""/>
                    </div>
                    <input type="text" placeholder="Email" name="auth_email" value=""/>
					
                </div>
                <div btn class="auth-btn" id="auth-1-btn">GET OTP</div>
			</form>
        </div>

        <div center id="auth-link">
            <a href="login.php" btn="flate" id="auth-login" class="block">Already have an account</a>
            <div btn="flate" id="auth-otp" class="hide">Resend OTP</div>
        </div>

        <script src="assets/js/script.js"></script>

        <script>
            var btn_1 = document.querySelector('#auth-1-btn');

            btn_1.addEventListener('click', (e) => { 
                var name = document.auth_card_1.auth_name.value;
                var cc = document.auth_card_1.auth_cc.value;
                var no = document.auth_card_1.auth_no.value;
                var email = document.auth_card_1.auth_email.value;
                var fullname = name.split(' ');

                if ( !(name =="" || cc =="" || no =="" || email =="") ) {
                    document.forms['auth_card_1'].submit();
                } else {
                    showMessage('Fill all the details',1);
                }
            })
        </script>
	</body>
</html>