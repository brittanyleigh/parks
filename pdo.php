<?php 
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$server = $url["host"];
	$username = $url["user"];
	$pw = $url["pass"];
	$db = substr($url["path"], 1);

	try {
		$pdo = new PDO('mysql:host=' . $server . ';dbname=' . $db, $username, $pw);
	} catch (PDOException $e) {
		die('Could not connect!');
	}



	function listParks($state){
		global $pdo;
		$parks = $pdo->prepare("SELECT * FROM parks WHERE state = :state ORDER BY name");
		$parks->bindValue(":state", $state, PDO::PARAM_STR);
		$parks->execute();
		$park_list = $parks->fetchAll(PDO::FETCH_ASSOC);
		foreach ($park_list as $row) {
			$pk_id = $row["id"];
			$pk_url = $row["link"];
			if (substr( $pk_url, 0, 4 ) !== "http"){
				$pk_url = "http://" . $pk_url;
			}



			$pk_div = "<div class=\"park show-vis ";
			$pk_div .= $row["type"];
			$pk_div .= "-pk ";
			if (isLoggedIn()){
				
				if (checkVisit($pk_id)){
					$visit_val = "unvisit";
					$pk_div .= "visited\">";
					$pk_div .= "<form id=\"visit\" method=\"post\" action=\"\">";
					$pk_div .= "<i class=\"fa checkbox fa-check-circle-o\"></i> ";					
				}
				else {
					$visit_val = "visit";
					$pk_div .= "unvisited\">";
					$pk_div .= "<form id=\"visit\" method=\"post\" action=\"\">";
					$pk_div .= "<i class=\"fa checkbox fa-circle-thin\"></i> ";
					
				}
				$pk_div .= "<input type=\"hidden\" name=\"park\" value=\"";
				$pk_div .= $pk_id;
				$pk_div .= "\">";
				$pk_div .= "<input type=\"hidden\" name=\"visit\" value=\"";
				$pk_div .= $visit_val;
				$pk_div .= "\"></form>";
			}
			else {
				$pk_div .= "\">";
			}
			$pk_div .= "<a target=\"_blank\" href=\""; 
			$pk_div .= $pk_url;
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
		if (checkUsername($username) && checkPassword($password)){
			$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
		    $stmt = $pdo->prepare($sql);
		    // Create a hash of the password, to make a stolen user database (nearly) worthless
		    $hash = password_hash($password, PASSWORD_DEFAULT);
		    // Insert user details, including hashed password
		    $stmt->bindParam(':username', htmlspecialchars($username));
		    $stmt->bindParam(':password', $hash);
			$stmt->execute();
			$user_msg = "New user created, you can now login!"; 
			return $user_msg;
		}
		else if (!checkUsername($username)){
			$user_msg = "Username must contain only letters, numbers, or underscores!";
			return $user_msg;
		}
		else if (!checkPassword($password)){
			$user_msg = "Recheck your password - it must be at least 8 characters long, contain 1 uppercase letter, 1 lowercase letter, and 1 number!";
			return $user_msg;
		}

    }

    function checkUser($username){
		global $pdo;
		$users = $pdo->prepare("SELECT * FROM users WHERE username = :username");
		$users->bindValue(":username", $username, PDO::PARAM_STR);
		$users->execute();
		$users_list = $users->fetchAll(PDO::FETCH_ASSOC);
		return $users_list[0];
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

	function checkVisit($id){
		global $pdo;
		$visit = $pdo->prepare("SELECT * FROM Visits WHERE username = :username AND park_id = :id");
		$visit->bindValue(":username", $_SESSION['logged_in_username'], PDO::PARAM_STR);
		$visit->bindValue(":id", $id);
		$visit->execute();
		$visit_list = $visit->fetchAll(PDO::FETCH_ASSOC);
		return $visit_list[0];		
	}

	function addVisit($id){
		global $pdo;
		$visit = $pdo->prepare("INSERT INTO Visits (username, park_id) VALUES (:username, :id)");
		$visit->bindValue(":username", $_SESSION['logged_in_username'], PDO::PARAM_STR);
		$visit->bindValue(":id", $id);
		$visit->execute();
	}

	function removeVisit($id){
		global $pdo;
		$visit = $pdo->prepare("DELETE FROM Visits WHERE username = :username AND park_id = :id");
		$visit->bindValue(":username", $_SESSION['logged_in_username'], PDO::PARAM_STR);
		$visit->bindValue(":id", $id);
		$visit->execute();
	}

	function checkUsername($str){
		$regEx = "/^\w+$/";
		return preg_match($regEx, $str);
	}

	function checkPassword($str){
		$regEx = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
		return preg_match($regEx, $str);
	}

 ?>