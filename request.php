<?php 

namespace Wow;
session_start();

    include 'includes/User.class.php';
    include 'includes/Post.class.php';
    include 'includes/Link.class.php';
    include 'includes/App.class.php';

    if ( isset( $_POST['request'] ) ) {
        $request = $_POST['request'];

        $app = new App();
        $user = new User();
        $link = new Link();
        $post = new Post();

        if ( isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $user->setUserName( $_SESSION['username'] );
            $user->setUserId( $app->getUserId( $user->getUserName() ) );
        }

        
        $site = "localhost/wow/";

        if ( $request == "wow_signup" ) {

            $name = explode(" ", $_POST['auth_name'] );

            $user->setFirstName( $name[0] );
            $user->setLastName( $name[1] );
            $user->setEmail( $_POST['auth_email'] );
            $user->setUserName( $_POST['auth_username'] );
            $user->setUserPassword( $_POST['auth_password'] );

            $app->addUser($user);
            header('Location: login.php');
            
        }

        if ( $request == "wow_login" ) {
            $user->setUserName( $_POST['auth_username'] );
            $user->setUserPassword( $_POST['auth_password'] );

            $result = $app->userLogin($user);

            if ( $result ) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user->getUserName();
                setcookie("username", $user->getUserName(), 0, "/");
                header('Location: index.php');
            } else {
                $_SESSION['login'] = false;
                header('Location: login.php');
            }

            
        }

        if ( $request == "wow_upload" ) {
            $post->setPostTitle( $app->validText( $_POST['post_title'] ) );
            $post->setPostInfo( $app->validText( $_POST['post_info'] ) );
            $post->setPostUserId( $user->getUserId() );

            $app->addPost($post);
            $post->setPostId( $app->getLastPostId( $user->getUserId() ) ) ;
            $post->setPostUserId( $user->getUserId() );

            $thumbname = $_FILES['post_thumb']['name'];
            $thumbtype = $_FILES['post_thumb']['type'];

            if ( $thumbtype == "image/png" ) {
                $ext = "png";
            } else if ( $thumbtype == "image/jpeg" ) {
                $ext = "jpeg";
            } else if ( $thumbtype == "image/gif" ) {
                $ext = "gif";
            }

            $imagename = "post-user-".$post->getPostUserId()."-".$post->getPostId();
            $loc = $imagename.".".$thumbtype;

            $upload_dir = "assets/upload/img/".$imagename.".".$ext;

            move_uploaded_file( $_FILES['post_thumb']['tmp_name'], $upload_dir );

            $app->addImage($post->getPostId() , $upload_dir, "post");

            header('Location: index.php');

        }

        if ( $request == "wow_edit_dp" ) {

            if ( isset( $_SESSION['login'] ) && $_SESSION['login'] == true ) {

                $dpname = $_FILES['u_dp']['name'];
                $dptype = $_FILES['u_dp']['type'];
    
                if ( $dptype == "image/png" ) {
                    $ext = "png";
                } else if ( $dptype == "image/jpeg" ) {
                    $ext = "jpeg";
                }

                $imagename = "profile-".$user->getUserId();
                $loc = $imagename.".".$dptype;
    
                $upload_dir = "assets/upload/img/".$imagename.".".$ext;
    
                move_uploaded_file( $_FILES['u_dp']['tmp_name'], $upload_dir );

                $query = 'SELECT * FROM `wow_image` WHERE `image_did` = '.$user->getUserId();

                $app->changeImage($user->getUserId() , $upload_dir, "profile");
    
                header('Location: edit.php?username=%27'.$user->getUserName().'%27');
            } else {
                header('Location: login.php');
            }
        }

        if ( $request == "wow_edit_pi" ) {

            if ( isset($_POST['public_fname']) ) {
                $user->setFirstName($_POST['public_fname']);
            }

            if ( isset($_POST['public_lname']) ) {
                $user->setLastName($_POST['public_lname']);
            }
               
            if ( isset($_POST['public_email']) ) {
                $user->setEmail($_POST['public_email']);
            }

                $app->changePublicInfo($user);
                header('Location: edit.php?username=%27'.$user->getUserName().'%27');
        }

        if ( $request == "wow_edit_ss" ) {

            $link->setFb($_POST['link_fb']);
            $link->setIg($_POST['link_ig']);
            $link->setTw($_POST['link_tw']);
            $link->setLi($_POST['link_li']);
            $link->setMd($_POST['link_md']);
            $link->setWeb($_POST['link_web']);

            $l = array();

            $l['fb'] = $_POST['link_fb'];
            $l['ig'] = $_POST['link_ig'];
            $l['tw'] = $_POST['link_tw'];
            $l['li'] = $_POST['link_li'];
            $l['md'] = $_POST['link_md'];
            $l['web'] = $_POST['link_web'];
            $l['id'] = $user->getUserId();

            $app->changeSocialLink($l);
            header('Location: edit.php?username=%27'.$user->getUserName().'%27');
            
        }
        
    } else {
        header('Location: index.php');
    }

?>