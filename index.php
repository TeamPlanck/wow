<?php 

namespace Planck;
session_start();

	# echo htmlspecialchars($_SERVER['PHP_SELF']);
	#Set variables
	$page_title = "WOW";

	if ( isset($_COOKIE['login']) ) {
		$is_login = $_COOKIE['login'];
	} else {
		$is_login = false;
	}
	
	//include '../planck/includes/Database.class.php';
	//include '../planck/includes/Auth.class.php';
	
	//$db = new Database();
	//$auth = new Auth($db);
	
	//$post = $auth->getPost();

	include 'includes/header.php';
	include 'includes/post.php';
?>

</section>
<script>
	window.onload = function() {

	<?php if($is_login == true) {
		$string = "showMessage('Welcome back, {$_COOKIE['username']}', 0)";
		echo $string;
	} 
	?>
};

</script>
</body>
</html>

