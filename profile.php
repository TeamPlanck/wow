<?php 

namespace Wow;
    
    include 'includes/common.php';
    
    if ( isset($_GET['username']) ) {

        $app->userCount($_GET['username']);

        $profile = $app->getUser($_GET['username']);

        $user->setUserId( $profile['user_id'] );
        $user->setUserName( $profile['user_name'] );
        $user->setFirstName( $profile['user_fname'] );
        $user->setLastName( $profile['user_lname'] );
        $user->setEmail( $profile['user_email'] );
        $user->setVerified( $profile['user_verified'] );
        $user->setUserDp( $app->getUserDp( $user->getUserName() ) );

	} else {
        $profile = "wow";
        $profileid = 0;
    }

    $page_title = $user->getUserName();
    
	
	include 'includes/header.php';
?>

<div class="container" style="margin-top: 16px;">

    <div class="mg-32 center">
        <img class="preview-dp mg-16 pos-right" width="64px" src="<?php echo $user->getUserDp();?>" />
        <div class="row cl-1 gap-none">
            <div class="row gap-none cl-3" style="color: var(--primary);">
                <p class="heading"><?php echo $user->getFirstName() .' '. $user->getLastName(); ?></p>
                <?php if ( $user->getVerified() ) { echo '<i class="material-icons" style="margin: 10px 8px;">verified_user</i>'; } ?>
            </div>
            
            <a class="subheading" href="mailto:<?php echo $user->getEmail(); ?>" target="_top"><?php echo $user->getEmail();?></a>
            <?php 
                if ( isset( $_SESSION['username']) && ($user->getUserName() == $_SESSION['username']) ) { 
                    echo '<a href="edit.php?username=%27'.$_SESSION['username'].'%27" class="subheading">Edit Profile</a>'; 
                } 
            ?>
        </div>
    </div>

    <div class="row gap-32 cl-1 xl-4 mg-16" style="margin-top: 32px;">
        <?php
            $query = "SELECT * FROM `wow_post` WHERE `post_uid` = '{$user->getUserId()}' AND `post_archive` = 1 ORDER BY `post_id` DESC"; 
            $data = $db->queryFetchAll($query);
            foreach ( $data as $row ) {
                $post->setPostThumb( $app->getPostPreview( $row['post_id'] ) );
                echo '<div class="card row gap-none cl-1 animated fadeInDown" id="'.$row['post_id'].'">';
                echo '<a href="post.php?id='.$row['post_id'].'" target="_blanck"><img src="'.$post->getPostThumb().'" class="post-thumb rounded"/></a>';
                echo '</div>';
            }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>