<?php namespace Wow;

class Link {
    private $link = array();

    public function __construct() {
        self::setFb("");
        self::setIg("");
        self::setTw("");
        self::setLi("");
        self::setMd("");
        self::setWeb("");
    }

    public function setId($id) {
		$this->link['id'] = $id;
	}
	
	public function getId() {
		return $this->link['id'];
    }

    public function setFb($r) {
		$this->link['fb'] = $r;
	}
	
	public function getFb() {
		return $this->link['fb'];
    }

    public function setIg($ig) {
		$this->link['ig'] = $ig;
	}
	
	public function getIg() {
		return $this->link['ig'];
    }

    public function setTw($tw) {
		$this->link['tw'] = $tw;
	}
	
	public function getTw() {
		return $this->link['tw'];
    }

    public function setLi($li) {
		$this->link['li'] = $li;
	}
	
	public function getLi() {
		return $this->link['li'];
    }

    public function setMd($md) {
		$this->link['md'] = $md;
	}
	
	public function getMd() {
		return $this->link['md'];
    }

    public function setWeb($web) {
		$this->link['web'] = $web;
	}
	
	public function getWeb() {
		return $this->link['web'];
    }
}

?>