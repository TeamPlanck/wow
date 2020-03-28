<?php 

namespace Wow;

include 'includes/common.php';
include 'includes/header.php';



if ( isset($_GET['id']) ) {
    $id = $_GET['id'];

    $sql = 'SELECT * FROM `wow_post` WHERE `post_id` = '.$id; 
    $p = $db->queryFetch($sql);

    $app->postCount($id);

    $post->setPostId( $id );
    $post->setPosttitle( $p['post_title'] );
    $post->setPostInfo( $app->resetPostInfo( $p['post_info'] ) );
    $post->setPostUserId( $p['post_uid'] );
    $post->setPostCount( $p['post_count'] );
    $post->setPostThumb( $app->getPostPreview( $post->getPostId() ) );
    $user->setUserId( $post->getPostUserId() ); 
    $user->setUserName( $app->getUserName( $user->getUserId() ) );
    $user->setUserDp( $app->getUSerDp( $user->getUserName() ) );
    $page_title = $post->getPostTitle();

} else {
    $profile = "wow";
    $profileid = 0;
}

?>

<?php 
/*
    if ( !$postdlink == null) {
        echo '<a class="download-btn center animated bounce" target="_blanck" href="'.$postdlink.'"><i class="material-icons">cloud_download</i></a>';
    }
*/
?>



<div class="container center" style="margin-top: 16px;">
<div class="row cl-1">
    <div class="card row cl-1 animated fadeInUp single-post pos-center">
        <div>
            <div class="row gap-none cl-12">
                <img src="<?php echo $user->getUserDp();?>" class="post-user-dp" style="height: 46px; width: 46px;" />
                <a href="<?php echo 'profile.php?username=%27'.$user->getUserName().'%27';?>"><p class="heading post-user"><?php echo $user->getUserName();?></p></a>
            </div>
            <img id="post-preview" src="<?php echo $post->getPostThumb();?>"/>
            <h2 class="post-title"><?php echo $post->getPosttitle(); ?></h2>
            <p class="post-info"><?php echo $post->getPostInfo(); ?></p>
            <p class="post-info"><?php echo $post->getPostCount();?> Views</p>
            <?php
            if ( isset( $_SESSION['username']) && ($user->getUserName() == $_SESSION['username']) ) { 
                echo '<a href="postedit.php?id='.$post->getPostId().'"><p class="post-info">Edit Post</p>';
            }
            ?>
        </div>
    </div>

    <p class="heading center pd-32">More Post From <?php echo $user->getUserName(); ?></p>
    <div class="row gap-32 cl-2 xl-6 mg-16 single-post pos-center">
        
        <?php 
            $query = 'SELECT * FROM `wow_post` WHERE `post_archive` = 1 AND `post_uid` = '.$post->getPostUserId().' ORDER BY `post_id` DESC LIMIT 6'; 
            $data = $db->queryFetchAll($query);
            foreach ( $data as $row ) {
                $post->setPostThumb( $app->getPostPreview( $row['post_id'] ) );
                echo '<a href="post.php?id='.$row['post_id'].'" target="_blanck">';
                echo '<img src="'.$post->getPostThumb().'" class="post-thumb animated fadeInLeft" style="border-radius: 16px;"/>';
                echo '</a>';
            }
        ?>
    </div>
</div>
</div>

    

<?php include 'includes/footer.php'; ?>