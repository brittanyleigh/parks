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
			$pk_div .= "-pk\">";
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


 ?>