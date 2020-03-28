<?php 
namespace Wow;
session_start();

	#Set variables
	$page_title = "WOW";

	include 'includes/Database.class.php';
	include 'includes/App.class.php';
	include 'includes/User.class.php';
	include 'includes/Post.class.php';
	//include 'includes/Link.class.php';

	$db = new Database();
	$app = new App();
	$user = new User();
	$post = new Post();
	//$linkd = new Link();
	$dp = NULL;

	if ( isset($_SESSION['login']) ) {
		$upload = true;
		echo '<script>';
			echo 'window.onload = function() {';
                //echo "showMessage('Welcome Back, {$_SESSION['username']}', 0)";
            echo '};';
		echo '</script>';

		if ( isset($_SESSION['username']) ) {
			$dp = $app->getUserDp($_SESSION['username']);
		}

	} else {
		$upload = false;
		$_SESSION['login'] = false;
	}
?>