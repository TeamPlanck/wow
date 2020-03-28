<?php namespace Wow;

class Post {

    private $post = array();

    public function __construct() {
        //
    }

    public function setPostId($post_id) {
		$this->post['post_id'] = $post_id;
	}
	
	public function getPostId() {
		return $this->post['post_id'];
    }
    
    public function setPostUserid($post_user_id) {
		$this->post['post_user_id'] = $post_user_id;
	}
	
	public function getPostUserId() {
		return $this->post['post_user_id'];
    }
    
    public function setPostTitle($post_title) {
		$this->post['post_title'] = $post_title;
	}
	
	public function getPostTitle() {
		return $this->post['post_title'];
    }
    
    public function setPostInfo($post_info) {
		$this->post['post_info'] = $post_info;
	}
	
	public function getPostInfo() {
		return $this->post['post_info'];
    }
    
    public function setPostPrice($post_price) {
		$this->post['post_price'] = $post_price;
	}
	
	public function getPostPrice() {
		return $this->post['post_price'];
    }
    
    public function setPostThumb($post_thumb) {
		$this->post['post_thumb'] = $post_thumb;
	}
	
	public function getPostThumb() {
		return $this->post['post_thumb'];
	}
	
	public function setPostThumbType($post_thumb_type) {
		$this->post['post_thumb_type'] = $post_thumb_type;
	}
	
	public function getPostThumbType() {
		return $this->post['post_thumb_type'];
    }
    
    public function setPostCount($post_count) {
		$this->post['post_count'] = $post_count;
	}
	
	public function getPostcount() {
		return $this->post['post_count'];
    }
	
	public function setPostDLink($post_dlink) {
		$this->post['post_dlink'] = $post_dlink;
	}
	
	public function getPostDLink() {
		return $this->post['post_dlink'];
    }

    public function setPostArchive($post_archive) {
		$this->post['post_archive'] = $post_archive;
	}
	
	public function getPostArchive() {
		return $this->post['post_archive'];
    }
    
    public function setPostDate($post_date) {
		$this->post['post_date'] = $post_date;
	}
	
	public function getPostDate() {
		return $this->post['post_date'];
	}
}