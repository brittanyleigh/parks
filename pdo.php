<?php 
	try {
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=Parks', 'root', '');
	} catch (PDOException $e) {
		die('Could not connect!');
	}



	function listParks($state){
		global $pdo;
		$parks = $pdo->prepare("SELECT * FROM parks WHERE state = :state");
		$parks->bindValue(":state", $state, PDO::PARAM_STR);
		$parks->execute();
		$park_list = $parks->fetchAll(PDO::FETCH_ASSOC);
		foreach ($park_list as $row) {
			$pk_div = "<div class=\"park ";
			$pk_div .= $row["type"];
			$pk_div .= "-pk\" data-type=\"";
			$pk_div .= $row["type"];
			$pk_div .= "\" data-visited=\"unvisited\">";
			if (isLoggedIn()){
				$pk_div .= "<i class=\"fa checkbox fa-circle-thin\"></i> ";
			}
			$pk_div .= "<a target=\"_blank\" href=\""; 
			$pk_div .= $row["link"];
			$pk_div .= "\">";
			$pk_div .= $row["name"];
			$pk_div .= "</a>";
			$pk_div .= " <i class=\"fa fa-tree\"></i>";
			$pk_div .= "</div>";
			echo $pk_div;
		}
	}

	function createUser($username, $password){
		global $pdo;
	    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
	    $stmt = $pdo->prepare($sql);
	    // Create a hash of the password, to make a stolen user database (nearly) worthless
	    $hash = password_hash($password, PASSWORD_DEFAULT);
	    // Insert user details, including hashed password
	    $stmt->bindParam(':username', $username);
	    $stmt->bindParam(':password', $hash);
		$stmt->execute();
    }

    function tryLogin($username, $password){
    	global $pdo;
	    $sql = "
	        SELECT
	            password
	        FROM
	            users
	        WHERE
	            username = :username
	    	";
	    $stmt = $pdo->prepare($sql);
	    $stmt->execute(
	        array('username' => $username, )
	    );
	    // Get the hash from this row, and use the third-party hashing library to check it
	    $hash = $stmt->fetchColumn();
	    $success = password_verify($password, $hash);
	    return $success;
	}

	function login($username){
	    session_regenerate_id();
	    $_SESSION['logged_in_username'] = $username;
	}

	function isLoggedIn(){
    	return isset($_SESSION['logged_in_username']);
	}

	function logout(){
	    unset($_SESSION['logged_in_username']);
	}



 ?>