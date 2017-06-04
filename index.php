<?php 
	require 'pdo.php';
	session_start();

	$username = '';
	$user_msg = 'Log in to track the parks you\'ve been to!';


	if ($_POST['username'])
	{
	    // login user
	    $username = $_POST['username'];
	    $ok = tryLogin($username, $_POST['password']);
	    if ($ok)
	    {
	        login($username);
	        $user_msg = "The mountains are calling and I must go. --John Muir";
	    }
	    else {
	    	$user_msg = "Oops! Login failed, try again.";
	    }
	} // LOGIN 

	if ($_POST['uname']){
			    //new user creation
	    $newuser = $_POST['uname'];
	    $newpw = $_POST['psw'];
	    $confirmpw = $_POST['psw-repeat'];
	    if (!checkUser($newuser)){
		    if ($newpw === $confirmpw){
		    	$user_msg = createUser($newuser, $newpw);  
			}
			else {
				$user_msg = "Oops, try again!";
			}
	    }
	    else {
	    	$user_msg = "Username taken, sorry!";
	    }	    
	} // CREATE USER

	if($_POST['visit'] == "visit"){
		addVisit($_POST['park']);
	}
	if($_POST['visit'] == "unvisit"){
		removeVisit($_POST['park']);
	} // ADD & REMOVE VISITED PARKS


	
 ?>

<head>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="parks.js"></script>
	<link rel="stylesheet" href="parks.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="heading">
		<h1>Welcome <?php echo $_SESSION['logged_in_username'] ?>! These are the USA's Best Parks!</h1>
		
		<?php if (isLoggedIn()): ?>
	        <a href="logout.php" class="button logout"><h4>Log Out</h4></a>
	    <?php else: ?>
	    	<div class="button login"><h4>Log In</h4></div>
			<div class="button createAcct"><h4>Sign Up</h4></div>
	    <?php endif ?>

	    <form action="" method="post" id="log-in">
			<input class="large" type="text" placeholder="Enter Username" name="username" required>
			<input class="large" type="password" placeholder="Enter Password" name="password" required>
			<button class="large" type="submit">Login</button>
			<button class="large cancel" type="button">Cancel</button>
		</form>

		<form id="new-account" action="" method="post">
			<input class="large" type="text" placeholder="Enter Username" name="uname" required>
			<input class="large" type="password" placeholder="Enter Password" name="psw" required>
			<input class="large" type="password" placeholder="Confirm Password" name="psw-repeat" required>
			<p>Password must be at least 8 characters, include 1 uppercase letter, 1 lowercase letter, and 1 number.</p>
			<div class="form-buttons">
				<button id="signup" class="large" type="submit">Sign Up</button>
				<button class="large cancel" type="button">Cancel</button>
			</div>
		</form>

		<div id="user-msg"><h3><?php echo $user_msg ?></h3></div>

		<h4 class="key">
			<span class="national-pk"><i class="fa fa-lg fa-tree"></i> = National Park </span>
			<span class="state-pk"><i class="fa fa-lg fa-tree"></i> = State Park</span>
			<span class="city-pk"><i class="fa fa-lg fa-tree"></i> = City Park</span>
		</h4>
		<div class="button show-hide hide"><h4>Hide All</h4></div>
		<div class="button show-hide show"><h4>Show All</h4></div>
		<div class="button filter"><h4>Filter <i class="fa fa-lg fa-angle-down"></i></h4></div>
		<div class="options">
			<h4>
				<span><i id="natl" class="fa fa-lg fa-check-circle-o"></i> National Parks </span>
				<span><i id="st" class="fa fa-lg fa-check-circle-o"></i> State Parks </span>
				<span><i id="cty" class="fa fa-lg fa-check-circle-o"></i> City Parks </span>
			</h4>
			<?php if (isLoggedIn()): ?>
			<h4>
				<span><i id="visited" class="fa fa-lg fa-check-circle-o"></i> Visited </span>
				<span><i id="unvisited" class="fa fa-lg fa-check-circle-o"></i> Unvisited </span>
			</h4>
			<?php endif ?>
		</div>

	</div>
	<div class="list">
		<div id="Alabama" class="state hidden">
			<h3>Alabama <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Alabama"); ?>
		</div>
		<div id="Alaska" class="state hidden">
			<h3>Alaska <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Alaska"); ?>
		</div>
		<div id="Arizona" class="state hidden">
			<h3>Arizona <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Arizona"); ?>
		</div>
		<div id="Arkansas" class="state hidden">
			<h3>Arkansas <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Arkansas"); ?>
		</div>
		<div id="California" class="state hidden">
			<h3>California <i class="fa fa-angle-down"></i></h3>
			<?php listParks("California"); ?>
		</div>
		<div id="Colorado" class="state hidden">
			<h3>Colorado <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Colorado"); ?>
		</div>
		<div id="Connecticut" class="state hidden">
			<h3>Connecticut <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Connecticut"); ?>
		</div>
		<div id="Delaware" class="state hidden">
			<h3>Delaware <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Delaware"); ?>
		</div>
		<div id="Florida" class="state hidden">
			<h3>Florida <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Florida"); ?>
		</div>
		<div id="Georgia" class="state hidden">
			<h3>Georgia <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Georgia"); ?>
		</div>
		<div id="Hawaii" class="state hidden">
			<h3>Hawaii <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Hawaii"); ?>
		</div>
		<div id="Idaho" class="state hidden">
			<h3>Idaho <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Idaho"); ?>
		</div>
		<div id="Illinois" class="state hidden">
			<h3>Illinois <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Illinois"); ?>
		</div>
		<div id="Indiana" class="state hidden">
			<h3>Indiana <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Indiana"); ?>
		</div>
		<div id="Iowa" class="state hidden">
			<h3>Iowa <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Iowa"); ?>
		</div>
		<div id="Kansas" class="state hidden">
			<h3>Kansas <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Kansas"); ?>
		</div>
		<div id="Kentucky" class="state hidden">
			<h3>Kentucky <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Kentucky"); ?>
		</div>
		<div id="Louisiana" class="state hidden">
			<h3>Louisiana <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Louisiana"); ?>
		</div>
		<div id="Maine" class="state hidden">
			<h3>Maine <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Maine"); ?>
		</div>
		<div id="Maryland" class="state hidden">
			<h3>Maryland <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Maryland"); ?>
		</div>
		<div id="Massachusetts" class="state hidden">
			<h3>Massachusetts <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Massachusetts"); ?>
		</div>
		<div id="Michigan" class="state hidden">
			<h3>Michigan <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Michigan"); ?>
		</div>
		<div id="Minnesota" class="state hidden">
			<h3>Minnesota <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Minnesota"); ?>
		</div>
		<div id="Mississippi" class="state hidden">
			<h3>Mississippi <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Mississippi"); ?>
		</div>
		<div id="Missouri" class="state hidden">
			<h3>Missouri <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Missouri"); ?>
		</div>
		<div id="Montana" class="state hidden">
			<h3>Montana <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Montana"); ?>
		</div>
		<div id="Nebraska" class="state hidden">
			<h3>Nebraska <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Nebraska"); ?>
		</div>
		<div id="Nevada" class="state hidden">
			<h3>Nevada <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Nevada"); ?>
		</div>
		<div id="NewHampshire" class="state hidden">
			<h3>New Hampshire <i class="fa fa-angle-down"></i></h3>
			<?php listParks("New Hampshire"); ?>
		</div>
		<div id="NewJersey" class="state hidden">
			<h3>New Jersey <i class="fa fa-angle-down"></i></h3>
			<?php listParks("New Jersey"); ?>
		</div>
		<div id="NewMexico" class="state hidden">
			<h3>New Mexico <i class="fa fa-angle-down"></i></h3>
			<?php listParks("New Mexico"); ?>
		</div>
		<div id="NewYork" class="state hidden">
			<h3>New York <i class="fa fa-angle-down"></i></h3>
			<?php listParks("New York"); ?>
		</div>
		<div id="NorthCarolina" class="state hidden">
			<h3>North Carolina <i class="fa fa-angle-down"></i></h3>
			<?php listParks("North Carolina"); ?>
		</div>
		<div id="NorthDakota" class="state hidden">
			<h3>North Dakota <i class="fa fa-angle-down"></i></h3>
			<?php listParks("North Dakota"); ?>
		</div>
		<div id="Ohio" class="state hidden">
			<h3>Ohio <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Ohio"); ?>
		</div>
		<div id="Oklahoma" class="state hidden">
			<h3>Oklahoma <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Oklahoma"); ?>
		</div>
		<div id="Oregon" class="state hidden">
			<h3>Oregon <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Oregon"); ?>
		</div>
		<div id="Pennsylvania" class="state hidden">
			<h3>Pennsylvania <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Pennsylvania"); ?>
		</div>
		<div id="RhodeIsland" class="state hidden">
			<h3>Rhode Island <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Rhode Island"); ?>
		</div>
		<div id="SouthCarolina" class="state hidden">
			<h3>South Carolina <i class="fa fa-angle-down"></i></h3>
			<?php listParks("South Carolina"); ?>
		</div>
		<div id="SouthDakota" class="state hidden">
			<h3>South Dakota <i class="fa fa-angle-down"></i></h3>
			<?php listParks("South Dakota"); ?>
		</div>
		<div id="Tennessee" class="state hidden">
			<h3>Tennessee <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Tennessee"); ?>
		</div>
		<div id="Texas" class="state hidden">
			<h3>Texas <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Texas"); ?>
		</div>
		<div id="Utah" class="state hidden">
			<h3>Utah <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Utah"); ?>
		</div>
		<div id="Vermont" class="state hidden">
			<h3>Vermont <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Vermont"); ?>
		</div>
		<div id="Virginia" class="state hidden">
			<h3>Virginia <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Virginia"); ?>
		</div>
		<div id="Washington" class="state hidden">
			<h3>Washington <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Washington"); ?>
		</div>
		<div id="WestVirginia" class="state hidden">
			<h3>West Virginia <i class="fa fa-angle-down"></i></h3>
			<?php listParks("West Virginia"); ?>
		</div>
		<div id="Wisconsin" class="state hidden">
			<h3>Wisconsin <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Wisconsin"); ?>
		</div>
		<div id="Wyoming" class="state hidden">
			<h3>Wyoming <i class="fa fa-angle-down"></i></h3>
			<?php listParks("Wyoming"); ?>
		</div>
	</div>
</body>