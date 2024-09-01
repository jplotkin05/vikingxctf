<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
	<meta name="description" content="Whitman Runners, the unofficial website of the Walt Whitman High School Cross Country, Track and Field Team. Get your stats, race results from meets, ranksings, and more! WWXC, WWTF for life!">
	<meta name="keywords" content="Whitman Runners, Runners, Walt Whitman, Whitman, Cross Country, Track, Field, XC, TF, Results, Races, Bethesda, Maryland, MD, MCPS, Athletics, Meets, High School">
	<title>Whitman Runners Home</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<style type="text/css">
		body {
			margin: none;
		}

		.body {
			margin-top: 5%;
		}

		#bar {
			width: 50%;
			background-color: #48A4C8;
			color: black;
			outline: none;
			margin: 0;
			padding: 0px;
			border: solid white 5px;
			border-radius: 0;
		}

		.wrapper {
			display: flex;
			justify-content: center;
			margin: 0;
		}

		#button {
			margin: 0;
			background-color: white;
			border: solid white 5px;
			outline: none;
			padding: 0px;
		}

		input:focus::placeholder {
			color: black;
		}

		.userTitle {
			background-color: #48A4C8;
			margin: none;
			padding: none;
		}

		.uT {
			text-align: center;

		}

		.uInfo {
			display: inline-block;
			background-color: #48A4C8;
			padding: 1%;
			border-radius: 7px;
		}

		.header {
			/* background: #48A4C8; */
			background-image: url('/images/hallway.png');
			padding: 0;
			text-align: center;
			color: #48A4C8;
			font-size: 30px;
			background-repeat: no-repeat;
			background-size: 100%;
			background-position: bottom;

			text-shadow: 3px 3px black;
			box-shadow: inset 0px 0px 3px black;
		}


		.text {
			padding: 5%;
		}

		@media only screen and (max-width: 600px) {
			.text {
				padding: 12%;
			}
		}
	</style>
	<link rel="stylesheet" type="text/css" href="/mainAssets.css">
</head>

<body>
	<?php
	include 'dbInfo.php';

	if (isset($_POST['submit'])) {


		$entry = mysqli_real_escape_string($conn, $_POST['search']);

		header("Location: /search.php?find=" . $entry . "");
	}
	?>
	<?php include "./nav.php";
	?>
	<div class="header">
		<div class="text">
			<h1>WWXCTF</h1>

		</div>
	</div>
	<br>
	 <center>
	
		<p style="font-size:20px;">
			This is a database for Whitman High School's Cross Country and Track/Field teams. Users can view current and archived <a href="/results">race results</a>, see individual profiles, and view <a href="/rankings">event rankings</a>.
		</p>
		<p style="font-size:20px;">
		Join the <a href="REDACTED">team group chat</a> and the <a style="color:orangered;" href="REDACTED">strava group.</a><br>Check the calendar to find upcomming meets and events.
		</p>
	</center> 
	<?php
	$getTotals = "SELECT COUNT(REDACTED) FROM REDACTED UNION
					SELECT COUNT(REDACTED) FROM REDACTED UNION
					SELECT COUNT(REDACTED) FROM REDACTED WHERE REDACTED = 'Walt Whitman'";
	$return = mysqli_query($conn, $getTotals);
	$values = mysqli_fetch_all($return);

	echo "<p align='center' style='font-size:20px;'>
	There are " . $values[2][0] . " whitman athletes, " . $values[1][0] . " meets, and " . $values[0][0] . " individual results stored on this site.
	</p>";
	?>
	<p align="center">
	<div class="body">
		<h4 align="center" style="color:white;">Search for an athlete or meet</h4>
		<form align="center" method="post" onsubmit=" return blankCheck()">
			<div class="wrapper">
				<input id="bar" type="text" name="search" autocomplete="off" placeholder="Click Here to Search">
				<button id="button" type="submit" name="submit" autocomplete="off" value="Search">Search</button>
			</div>
			<strong><br><label style="color:red;" id="warning"></label></br></strong>
		</form>
	</div>
	</p>


	<script>
		function blankCheck() {
			var searchInput = document.getElementById('bar').value;
			var message = document.getElementById('warning');
			if (searchInput == '') {
				message.textContent = 'Field Incomplete';
				return false;
			}
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	
	<?php
include 'footer.php';
	?>
</body>

</html>
