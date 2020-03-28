<?php namespace Wow;
use \PDO as PDO;

class Database extends PDO {
    private static $dns = "mysql:host=localhost;dbname=wow;";
	private static $user = "root";
	private static $pass = "";
	private static $con = null;
	
	public function __construct() {
		//die('Not Allow');
    }
    
    public static function connect() {
		if (self::$con == null) {
			try {
				self::$con = new PDO(self::$dns, self::$user, self::$pass);
			}
			catch (PDOException $e) {
				echo "Connection to Database impossible: " . $e->getMessage();
				die();
			}
			return self::$con;
		}
    }
    
    public static function close() {
		self::$con = null;
    }

    public function insert($query, array $value) {
        try {
            $sql = self::$con->prepare($query);
        }
        catch (PDOException $e) {
            echo "Data Insert Failed: " . $e->getMessage();
            die();
        }
    }
    
    public function queryExec($query) {
        try {
            self::$con->exec($query);
        } 
        catch (PDOException $e) {
            echo "Query didn't executed: " . $e->getMessage();
            die();
        }
    }

    public function queryFetchAll($query) {
        try {
            self::connect();
            return self::$con->query($query)->fetchAll();
            self::close();
        } 
        catch (PDOException $e) {
            echo "Query didn't executed: " . $e->getMessage();
            die();
        }
    }

    public function queryFetch($query) {
        try {
            self::connect();
            return self::$con->query($query)->fetch();
            self::close();
        } 
        catch (PDOException $e) {
            echo "Query didn't executed: " . $e->getMessage();
            die();
        }
    }
}

?>
