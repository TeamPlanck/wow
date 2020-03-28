<?php 

namespace Wow;
    
    include 'includes/common.php';
    include 'includes/header.php';

    if ( isset($_SESSION['login']) ) { 
        
        if ( $_SESSION['login'] == false) {
            header('Location: login.php');
        } else {
            $profile = $app->getUser($_GET['username']);

            $user->setUserId( $profile['user_id'] );
            $user->setUserName( $profile['user_name'] );
            $user->setFirstName( $profile['user_fname'] );
            $user->setLastName( $profile['user_lname'] );
            $user->setEmail( $profile['user_email'] );
            $user->setVerified( $profile['user_verified'] );
            $user->setUserDp( $app->getUserDp( $user->getUserName() ) );

            $l = $app->getLink( $user->getUserId() );
            $linkd = new Link();
            $linkd->setFb($l['link_fb']);
            $linkd->setIg($l['link_ig']);
            $linkd->setTw($l['link_tw']);
            $linkd->setMd($l['link_md']);
            $linkd->setLi($l['link_li']);
            $linkd->setWeb($l['link_web']);
        }

    }
?>

<script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                 var preview = e.target.files[0];

                 var reader = new FileReader();

                reader.onload = function (e) {
                    var img = "background-image: url("+e.target.result+");";
                    $('.preview-dp').attr('style', img);
                }

                reader.readAsDataURL(preview);

                var fileName = e.target.files[0].name;
            });
        });
</script>

<div class="container">

    <div class="row cl-1 single-post pos-center">

    <form class="card center animated fadeInUp" name="edit_dp" method="post" action="request.php" enctype="multipart/form-data">
        <div class="pd-32">
            <p class="heading txt-center">Profile Picture</p>
            <p class="subheading txt-center">Click on your profile picture below to change</p>
            <div id="upload-dp" class="preview-dp mg-32 pos-center" style="background-image: url(<?php echo $dp?>);">
                <input class="file-btn" type="file" name="u_dp" id="file"  accept="image/png, image/jpeg"/>
                <label for="file" style="display: block; padding: 42px; border-radius: 64px;" btn="flate"></label>
            </div>
            <input type="hidden" value="wow_edit_dp" name="request" />
            <div btn="flate" style="margin-top: 16px;" id="change-dp-btn">CHANGE</div>
        </div>
    </form>

    <form class="card center animated fadeInUp" name="edit_public" id="#public" method="post" action="request.php">
        <div class="pd-32">
            <p class="heading txt-center">Public Information</p>
            <p class="subheading txt-center">This all information are visible to public</p>
            <div class="pd-16 row cl-1">
                <div class="row xs-2 cl-1">
                    <input type="text" onchange="textEmptyValue(this)" placeholder="First Name" name="public_fname" value="<?php echo $user->getFirstName();?>"/>
                    <input type="text" onchange="textEmptyValue(this)" placeholder="Last Name" name="public_lname" value="<?php echo $user->getLastName();?>"/>
                </div>
                <input type="email" onchange="textEmptyValue(this)" placeholder="Email" name="public_email" value="<?php echo $user->getEmail();?>"/>
                <input type="hidden" value="wow_edit_pi" name="request" />
                <div btn="flate" id="change-pi-btn">CHANGE</div>
            </div>
        </div>
    </form>

    <form class="card center animated fadeInUp" name="edit_ss" method="post" action="request.php">
        <div class="pd-32">
            <p class="heading txt-center">Social Accounts</p>
            <p class="subheading txt-center">Provide username of your social media accounts</p>
            <div class="pd-16 row cl-1">

                <div class="row cl-12">
                    <i class="fas fa-link center social-edit"></i>
                    <input type="text"placeholder="Website" name="link_web" value="<?php echo $linkd->getWeb(); ?>"
                    style="grid-column: span 11;"/>
                </div>

                <div class="row cl-12">
                    <i class="fab fa-instagram center social-edit"></i>
                    <input type="text"placeholder="Instagram" name="link_ig" value="<?php echo $linkd->getIg(); ?>"
                    style="grid-column: span 11;"/>
                </div>

                <div class="row cl-12">
                    <i class="fab fa-twitter center social-edit"></i>
                    <input type="text"placeholder="Twitter" name="link_tw" value="<?php echo $linkd->getTw(); ?>"
                    style="grid-column: span 11;"/>
                </div>

                <div class="row cl-12">
                    <i class="fab fa-linkedin-in center social-edit"></i>
                    <input type="text"placeholder="Linkedin" name="link_li" value="<?php echo $linkd->getLi(); ?>"
                    style="grid-column: span 11;"/>
                </div>

                <div class="row cl-12">
                    <i class="fab fa-facebook-f center social-edit"></i>
                    <input type="text"placeholder="Facebook" name="link_fb" value="<?php echo $linkd->getFb(); ?>"
                    style="grid-column: span 11;"/>
                </div>

                <div class="row cl-12">
                    <i class="fab fa-medium-m center social-edit"></i>
                    <input type="text"placeholder="Medium" name="link_md" value="<?php echo $linkd->getMd(); ?>"
                    style="grid-column: span 11;"/>
                </div>

                <input type="hidden" value="wow_edit_ss" name="request" />
                <div btn="flate" id="change-ss-btn">CHANGE</div>
            </div>
        </div>
    </form>

    <!--
    <form class="card center animated fadeInUp" name="edit_pass" id="#public" method="post" action="request.php">
        <div class="pd-32">
            <p class="heading txt-center">Change Password</p>
            <p class="subheading txt-center">Use Long password for security</p>
            <div class="pd-16 row cl-1">
                <input type="password" onchange="textEmptyValue(this)" placeholder="New Password" name="pass_new" />
                <input type="password" onchange="textEmptyValue(this)" placeholder="Retype Password" name="pass_re"/>
                <input type="hidden" value="wow_edit_pass" name="request" />
                <div btn="flate" style="color: red;" id="change-pass-btn">CHANGE</div>
            </div>
        </div>
    </form>
    -->

    </div>
</div>
<script>
    var btn_1 = document.querySelector('#change-dp-btn');
    var btn_2 = document.querySelector('#change-pi-btn');
    var btn_3 = document.querySelector('#change-ss-btn');
    var btn_4 = document.querySelector('#change-pass-btn');

    btn_1.addEventListener('click', (e) => { 
        document.forms['edit_dp'].submit();
    })

    btn_2.addEventListener('click', (e) => { 
        var fname = document.edit_public.public_fname.value;
        var lname = document.edit_public.public_lname.value;
        var email = document.edit_public.public_email.value;

        if ( !(fname =="" || lname =="" || email =="") ) {
            document.forms['edit_public'].submit();
        } else {
            showMessage('Fill all the public details',1);
        }
    })

    btn_3.addEventListener('click', (e) => { 
        document.forms['edit_ss'].submit();
    })

    btn_4.addEventListener('click', (e) => { 
        var p1 = document.edit_pass.pass_new.value;
        var p2 = document.edit_pass.pass_re.value;

        if ( !(p1 =="" || p2 =="") ) {
            
            if ( p1 == p2 ) {
                document.forms['edit_pass'].submit();
            } else {
                showMessage('Enter same new password',1);
            }
            
        } else {
            showMessage('Fill both fields',1);
        }
    })
</script>

<?php include 'includes/footer.php'; ?>