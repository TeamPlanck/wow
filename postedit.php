<?php 
    $flag_upload = true;
    include 'includes/common.php';
    include 'includes/header.php';

    $query = 'SELECT * FROM `wow_post` WHERE `post_id` = '.$_GET['id']; 
    $data = $db->queryFetchAll($query);
    foreach ( $data as $row ) {
        $post->setPostId($row['post_id']);
        $post->setPostInfo($row['post_title']);
        $post->setPostInfo($row['post_info']);
        $post->setPostThumb($row['post_thumb']);
    }

    

?>

<div class="container center">
    <div class="row cl-1 gap-32 card single-post" id="upload">
        
        <form class="txt-center" name="upload" method="post" action="request.php" enctype="multipart/form-data">
            <div id="upload-box" class="center preview-image" style="background-image: url(<?php echo $post->getPostThumb(); ?>);"></div>
			<div class="mg-32 row cl-1">
                <input type="text" onchange="textEmptyValue(this)" placeholder="Title" name="post_title" value="<?php echo $post->getPostTitle(); ?>"/>
                <textarea rows="3" onchange="textEmptyValue(this)" placeholder="Post Info - some HTML Tags allowed" name="post_info"><?php echo $_GET['info']?></textarea>
                <input type="hidden" id="thumb" /> 
                <input type="hidden" value="wow_upload" name="request" />
            </div>
            <a btn class="auth-btn" id="upload-btn">CHANGE</a>
		</form>    
    </div>
</div>

<script>
    var btn = document.querySelector('#upload-btn');

    btn.addEventListener('click', (e) => { 
        var title = document.upload.post_title.value;
        var info = document.upload.post_info.value;
        var thumb = document.querySelector('#thumb').value;

        if ( !(title =="" || info =="" || thumb =="") ) {
            document.forms['upload'].submit();
        } else {
            showMessage('Fill all the details',1);
        }
    })
</script>

<?php 
    include 'includes/footer.php';
?>