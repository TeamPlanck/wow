<?php 
    $flag_upload = true;
    include 'includes/common.php';
    include 'includes/header.php';
?>

	<script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                 var preview = e.target.files[0];

                 var reader = new FileReader();

                reader.onload = function (e) {
                    var img = "background-image: url("+e.target.result+");";
                    $('.preview-image').attr('style', img);
                    $('#thumb').attr('value', true);
                }

                reader.readAsDataURL(preview);

                var fileName = e.target.files[0].name;
            });
        });
    </script>

<div class="container center">
    <div class="row cl-1 gap-32 card single-post" id="upload">
        
        <form class="txt-center" name="upload" method="post" action="request.php" enctype="multipart/form-data">
            <div id="upload-box" class="center preview-image">
                <input class="file-btn" type="file" id="file" name="post_thumb" accept="image/png, image/jpeg, image/gif"/>
                <label for="file" btn="flate">CHANGE PREVIEW IMAGE</label>
            </div>
			<div class="mg-32 row cl-1">
                <input type="text" onchange="textEmptyValue(this)" placeholder="Title" name="post_title" value=""/>
                <textarea rows="3" onchange="textEmptyValue(this)" placeholder="Post Info - some HTML Tags allowed" name="post_info"></textarea>
                <input type="hidden" id="thumb" /> 
                <input type="hidden" value="wow_upload" name="request" />
            </div>
            <a btn class="auth-btn" id="upload-btn">UPLOAD</a>
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