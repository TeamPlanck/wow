<div class="container" style="margin-top: 16px;">

<p class="heading mg-32">Promoted Design</p>
    <div class="row gap-32 cl-2 xl-6 mg-16">
        
        <?php 
            $query = 'SELECT * FROM `wow_post` WHERE `post_archive` = 1 AND `post_promo` = 0 LIMIT 6'; 
            $data = $db->queryFetchAll($query);
            foreach ( $data as $row ) {
                $post->setPostThumb( $app->getPostPreview( $row['post_id'] ) );
                echo '<a href="post.php?id='.$row['post_id'].'" target="_blanck">';
                echo '<img src="'.$post->getPostThumb().'" class="post-thumb animated fadeInLeft" style="border-radius: 16px;"/>';
                echo '</a>';
            }
        ?>
    </div>

    <p class="heading mg-32">Trending Design</p>
    <div class="row gap-32 cl-2 xl-6 mg-16">
        
        <?php 
            $query = 'SELECT * FROM `wow_post` WHERE `post_archive` = 1 AND `post_count` > 10 and `post_promo` = 1 LIMIT 6'; 
            $data = $db->queryFetchAll($query);
            foreach ( $data as $row ) {
                $post->setPostThumb( $app->getPostPreview( $row['post_id'] ) );
                echo '<a href="post.php?id='.$row['post_id'].'" target="_blanck">';
                echo '<img src="'.$post->getPostThumb().'" class="post-thumb animated fadeInLeft" style="border-radius: 16px;"/>';
                echo '</a>';
            }
        ?>
    </div>

    <p class="heading mg-32">Latest Design</p>
    <div class="row gap-32 cl-1 xl-3 mg-16" style="margin-top: 32px;">
        <?php
            $query = 'SELECT * FROM `wow_post` WHERE `post_archive` = 1 ORDER BY `post_id` DESC LIMIT 100'; 
            $data = $db->queryFetchAll($query);
            foreach ( $data as $row ) {
                $user->setUserId( $row['post_uid'] );
                $user->setUserName( $app->getUserName( $user->getUserId() ) );
                $user->setUserDp( $app->getUSerDp( $user->getUserName() ) );
                $post->setPostThumb( $app->getPostPreview( $row['post_id'] ) );
                echo '<div class="card row gap-none cl-1 animated fadeInDown" id="'.$row['post_id'].'">';
                echo '<div class="row gap-none cl-10">';
                echo '<a href="profile.php?username=%27'.$user->getUserName().'%27"><img src="'.$user->getUserDp().'" class="post-user-dp"></a>';
                echo '<a class="title post-auther" href="profile.php?username=%27'.$user->getUserName().'%27">'.$user->getUserName().'</a>';
                echo '</div>';
                echo '<a href="post.php?id='.$row['post_id'].'" target="_blanck"><img src="'.$post->getPostThumb().'" class="post-thumb"/></a>';
                echo '<div class="mg-8" style="min-height: 42px!important;">';
                echo '<a class="subheading post-link center" href="post.php?id='.$row['post_id'].'" target="_blanck">'.$row['post_title'].'</a>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
</div>



