<div class="container">
    <div class="row xl-5 md-3 cl-1">
        <?php
            $con = mysqli_connect("localhost", "root", "", "planck");
            $sql = 'SELECT * FROM `wow_post`'; 
            if ($res = mysqli_query($con, $sql)) { 
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) { 
                        echo '<div class="post" id="'.$row['post_id'].'">';
                        echo '<img src="'.$row['post_thumb'].'" class="post-thumb"/>';
                        //echo '<p class="title">'.$row['post_title'].'</p>';
                        //echo '<p class="txt-center">'.$row['post_info'].'</p>';
                        echo '</div>';
                    }
                }
            }
            mysqli_close($con); 
        ?>
    </div>
</div>
</body>
</html>


