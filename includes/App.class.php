<?php

namespace Wow;

require_once 'Database.class.php';
require_once 'Link.class.php';

class App {

    //public static $db;
    //public static $con;
    //public static $msg;

    public function __construct() {
        $this->db = new Database();
        $this->con = $this->db->connect();
    }

    public function checkRecord($query) {
        try {  
            $flag = false;
            $result = $this->db->queryFetch($query);

            if ( count($result) == 1 ) {
                $flag = true;
            }

            return $flag;
        }
        catch (PDOException $e) {
            self::$msg = 'Some error: ' . $e->getMessage();
            die();
        }
    }

    public function addUser($data) {

        try {
            $query = 'INSERT INTO `wow_user`(
                `user_name`, 
                `user_fname`, 
                `user_lname`, 
                `user_email`,
                `user_password`) VALUES (?, ?, ?, ?, ?)';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
                $data->getUserName(), 
                $data->getFirstName(), 
                $data->getLastName(), 
                $data->getEmail(),
                self::incryptPassword($data->getUserPassword())
            ]);

            $loc = "assets/upload/img/profile-0.png";
            self::addImage( self::getUserId( $data->getUserName()), $loc, "profile");
            $l = new Link();
            $l->setId(self::getUserId( $data->getUserName()));
            self::addSocialLink($l);
            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'User Register Failed: ' . $e->getMessage();
            die();
        }
    }

    public function addPost($data) {
        try {
            $query = 'INSERT INTO `wow_post`(
                `post_title`, 
                `post_info`,
                `post_uid`) VALUES (?, ?, ?)';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
                $data->getPostTitle(), 
                $data->getPostInfo(),
                $data->getPostUserId()
            ]);

            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'User Register Failed: ' . $e->getMessage();
            die();
        }
    }

    public function addSocialLink($data) {
        try {
            $query = 'INSERT INTO `user_link`(
                `link_uid`, 
                `link_fb`,
                `link_ig`,
                `link_tw`,
                `link_li`,
                `link_md`,
                `link_web`,) VALUES (?, ?, ?, ?, ?, ?, ?)';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
                $data->getId(), 
                $data->getFb(),
                $data->getIg(),
                $data->getTw(),
                $data->getLi(),
                $data->getMd(),
                $data->getWeb()
            ]);

            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'Adding social link failed: ' . $e->getMessage();
            die();
        }
    }

    public function changeSocialLink($data) {
        try {
            $query = 'UPDATE `user_link` SET 
                `link_fb` = ?,
                `link_ig` = ?,
                `link_tw` = ?,
                `link_li` = ?,
                `link_md` = ?,
                `link_web` = ? WHERE `link_uid` = ?';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
               $data['fb'],
               $data['ig'],
               $data['tw'],
               $data['li'],
               $data['md'],
               $data['web'],
               $data['id']
            ]);

            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'Updating social link failed: ' . $e->getMessage();
            die();
        }
    }

    public function changePublicInfo($data) {
        try {
            $query = 'UPDATE `wow_user` SET 
                `user_fname` = ?,
                `user_lname` = ?,
                `user_email` = ? WHERE `user_name` LIKE ?';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
                $data->getFirstName(), 
                $data->getLastName(),
                $data->getEmail(),
                $data->getUserName()
            ]);

            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'Failur Public Information: ' . $e->getMessage();
            die();
        }
    }

    public function addImage($id, $loc, $type) {
        try {
            $query = 'INSERT INTO `wow_image`(
                `image_did`, 
                `image_type`,
                `image_url` ) VALUES (?, ?, ?)';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
                $id, 
                $type,
                $loc
            ]);

            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'Image upload failed: ' . $e->getMessage();
            die();
        }
    }

    public function changeImage($id, $loc, $type) {
        try {
            $query = 'UPDATE `wow_image` SET `image_url` = ? WHERE `image_did` = ? AND `image_type` LIKE ?';
    
            $sql = $this->con->prepare($query);
    
            $sql->execute([
                $loc,
                $id,
                $type
            ]);

            $this->db->close();
        }
        catch (PDOException $e) {
            self::$msg = 'Dp change failed: ' . $e->getMessage();
            die();
        }
    }

    public function userLogin($data) {
        try {

            $query = 'SELECT `user_password` FROM `wow_user` WHERE `user_name` LIKE ?';

            $sql = $this->con->prepare($query);
            $sql->execute([ $data->getUserName() ]);
            $result = $sql->fetch();

            if ( count($result) < 1 ) {
                return false;
            } else if ( $result['user_password'] == self::incryptPassword( $data->getUserPassword() ) ) {    
                return true;
            } else { 
                return false;
            }

        }
        catch (PDOException $e) {
            $_SESSION['login'] = false;
            self::$msg = 'User Login Failed: ' . $e->getMessage();
            die();
        }
    }

    public function getUserDp($username) {
        $query = "SELECT `image_url` FROM `wow_image` WHERE `image_did` LIKE (SELECT `user_id` FROM `wow_user` WHERE `user_name` LIKE '{$username}')";
        $userdp = $this->db->queryFetch($query);
        return $userdp['image_url'];
    }

    public function getUserId($username) {
        $query = "SELECT `user_id` FROM `wow_user` WHERE `user_name` LIKE '{$username}'";   
        $userid = $this->db->queryFetch($query);
        return $userid['user_id'];
    }

    public function getUserName($userid) {
        $query = "SELECT `user_name` FROM `wow_user` WHERE `user_id` LIKE '{$userid}'";   
        $userid = $this->db->queryFetch($query);
        return $userid['user_name'];
    }

    public function getPostPreview($id) {
        $query = "SELECT `image_url` FROM `wow_image` WHERE `image_did` LIKE {$id}";   
        $preview = $this->db->queryFetch($query);
        return $preview['image_url'];
    }

    function postCount($id) {
        $sql = 'UPDATE `wow_post` SET `post_count` = `post_count` + 1 WHERE `post_id` = '.$id; 
        $this->db->queryExec($sql);
    }

    function userCount($username) {
        $sql = 'UPDATE `wow_user` SET `user_count` = `user_count` + 1 WHERE `user_name` = '.$username; 
        $this->db->queryExec($sql);
    }

    function siteCount() {
        $sql = "UPDATE `wow_data` SET `data_value` = `data_value` + 1 WHERE `data_name` = 'count'"; 
        $this->db->queryExec($sql);
    }

    public function getLastPostId($uid) {
        $query = "SELECT `post_id` FROM `wow_post` WHERE `post_uid` LIKE {$uid} ORDER BY `post_id` DESC LIMIT 1";   
        $postid = $this->db->queryFetch($query);
        return $postid['post_id'];
    }

    public function getUser($username) {
        $query = "SELECT * FROM `wow_user` WHERE `user_name` LIKE {$username} LIMIT 1";
        $data = $this->db->queryFetch($query);
        return $data;
    }

    public function getLink($user) {
        $query = "SELECT * FROM `user_link` WHERE `link_uid` = {$user} LIMIT 1";
        $data = $this->db->queryFetch($query);
        return $data;
    }

    public function incryptPassword($password) {
        return SHA1($password, 256);
    }

    public function resetPostInfo($info) {
        $tmp = explode(" ", $info);

        for ( $i=0; $i<count($tmp); $i++ ) {
            if (  strstr($tmp[$i], "@") ) {
                $url = substr($tmp[$i], 1);
                $tmp[$i] = '<a href="profile.php?username=%27'.$url.'%27" target="_blanck">@'.$url.'</a>';
            }
        }

        $info = implode(" ", $tmp);
        return $info;
    }

    public function validText($value) {
        $tmp = explode(" ", $value);

        for ( $i=0; $i<count($tmp); $i++ ) {
            if (  strstr($tmp[$i], "<script>") ) {
                $fs = $i;
            } else if ( strstr($tmp[$i], "</script>") ) {
                $fe = $i;
            }
        }

        for( $i=$fs; $i<=$fe; $i++) {
            $tmp[$i] = "";
        }

        $info = implode(" ", $tmp);
        return $info;
        
    }
  
}


?>