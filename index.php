<?php 
	require 'pdo.php';

 ?>

<head>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="parks.js"></script>
	<link rel="stylesheet" href="parks.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	<div class="heading">
		<h1>Best USA Parks</h1>
		<h4>
			<span class="national-pk"><i class="fa fa-tree"></i> = National Park </span>
			<span class="state-pk"><i class="fa fa-tree"></i> = State Park</span>
			<span class="city-pk"><i class="fa fa-tree"></i> = City Park</span>
		</h4>
	</div>
	<div class="list">
		<div id="Alabama" class="state">
			<h3>Alabama <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Alabama\""); ?>
		</div>
		<div id="Alaska" class="state">
			<h3>Alaska <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Alaska\""); ?>
		</div>
		<div id="Arizona" class="state">
			<h3>Arizona <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Arizona\""); ?>
		</div>
		<div id="Arkansas" class="state">
			<h3>Arkansas <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Arkansas\""); ?>
		</div>
		<div id="California" class="state">
			<h3>California <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"California\""); ?>
		</div>
		<div id="Colorado" class="state">
			<h3>Colorado <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Colorado\""); ?>
		</div>
		<div id="Connecticut" class="state">
			<h3>Connecticut <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Connecticut\""); ?>
		</div>
		<div id="Delaware" class="state">
			<h3>Delaware <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Delaware\""); ?>
		</div>
		<div id="Florida" class="state">
			<h3>Florida <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Florida\""); ?>
		</div>
		<div id="Georgia" class="state">
			<h3>Georgia <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Georgia\""); ?>
		</div>
		<div id="Hawaii" class="state">
			<h3>Hawaii <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Hawaii\""); ?>
		</div>
		<div id="Idaho" class="state">
			<h3>Idaho <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Idaho\""); ?>
		</div>
		<div id="Illinois" class="state">
			<h3>Illinois <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Illinois\""); ?>
		</div>
		<div id="Indiana" class="state">
			<h3>Indiana <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Indiana\""); ?>
		</div>
		<div id="Iowa" class="state">
			<h3>Iowa <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Iowa\""); ?>
		</div>
		<div id="Kansas" class="state">
			<h3>Kansas <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Kansas\""); ?>
		</div>
		<div id="Kentucky" class="state">
			<h3>Kentucky <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Kentucky\""); ?>
		</div>
		<div id="Louisiana" class="state">
			<h3>Louisiana <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Louisiana\""); ?>
		</div>
		<div id="Maine" class="state">
			<h3>Maine <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Maine\""); ?>
		</div>
		<div id="Maryland" class="state">
			<h3>Maryland <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Maryland\""); ?>
		</div>
		<div id="Massachusetts" class="state">
			<h3>Massachusetts <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Massachusetts\""); ?>
		</div>
		<div id="Michigan" class="state">
			<h3>Michigan <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Michigan\""); ?>
		</div>
		<div id="Minnesota" class="state">
			<h3>Minnesota <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Minnesota\""); ?>
		</div>
		<div id="Mississippi" class="state">
			<h3>Mississippi <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Mississippi\""); ?>
		</div>
		<div id="Missouri" class="state">
			<h3>Missouri <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Missouri\""); ?>
		</div>
		<div id="Montana" class="state">
			<h3>Montana <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Montana\""); ?>
		</div>
		<div id="Nebraska" class="state">
			<h3>Nebraska <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Nebraska\""); ?>
		</div>
		<div id="Nevada" class="state">
			<h3>Nevada <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Nevada\""); ?>
		</div>
		<div id="NewHampshire" class="state">
			<h3>New Hampshire <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"New Hampshire\""); ?>
		</div>
		<div id="NewJersey" class="state">
			<h3>New Jersey <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"New Jersey\""); ?>
		</div>
		<div id="NewMexico" class="state">
			<h3>New Mexico <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"New Mexico\""); ?>
		</div>
		<div id="NewYork" class="state">
			<h3>New York <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"New York\""); ?>
		</div>
		<div id="NorthCarolina" class="state">
			<h3>North Carolina <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"North Carolina\""); ?>
		</div>
		<div id="NorthDakota" class="state">
			<h3>North Dakota <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"North Dakota\""); ?>
		</div>
		<div id="Ohio" class="state">
			<h3>Ohio <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Ohio\""); ?>
		</div>
		<div id="Oklahoma" class="state">
			<h3>Oklahoma <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Oklahoma\""); ?>
		</div>
		<div id="Oregon" class="state">
			<h3>Oregon <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Oregon\""); ?>
		</div>
		<div id="Pennsylvania" class="state">
			<h3>Pennsylvania <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Pennsylvania\""); ?>
		</div>
		<div id="RhodeIsland" class="state">
			<h3>Rhode Island <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Rhode Island\""); ?>
		</div>
		<div id="SouthCarolina" class="state">
			<h3>South Carolina <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"South Carolina\""); ?>
		</div>
		<div id="SouthDakota" class="state">
			<h3>South Dakota <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"South Dakota\""); ?>
		</div>
		<div id="Tennessee" class="state">
			<h3>Tennessee <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Tennessee\""); ?>
		</div>
		<div id="Texas" class="state">
			<h3>Texas <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Texas\""); ?>
		</div>
		<div id="Utah" class="state">
			<h3>Utah <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Utah\""); ?>
		</div>
		<div id="Vermont" class="state">
			<h3>Vermont <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Vermont\""); ?>
		</div>
		<div id="Virginia" class="state">
			<h3>Virginia <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Virginia\""); ?>
		</div>
		<div id="Washington" class="state">
			<h3>Washington <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Washington\""); ?>
		</div>
		<div id="WestVirginia" class="state">
			<h3>West Virginia <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"West Virginia\""); ?>
		</div>
		<div id="Wisconsin" class="state">
			<h3>Wisconsin <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Wisconsin\""); ?>
		</div>
		<div id="Wyoming" class="state">
			<h3>Wyoming <i class="fa fa-angle-down"></i></h3>
			<?php listParks("\"Wyoming\""); ?>
		</div>


	</div>
</body>