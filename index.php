<?php 

	include 'includes/common.php';
    include 'includes/header.php';
    include 'includes/posts.php';
	
	
	$app->siteCount();

?>

</section>
<script>
	window.onload = function() {
	
	//showMessage('Dont go outside without any reason, stay safe', 1);

	<?php if($is_login == true) {
		$string = "showMessage('Welcome back, {$_COOKIE['username']}', 0)";
		//echo $string;
	} 
	?>
};

</script>
</body>

<?php include 'includes/footer.php'; ?>