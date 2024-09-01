<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
	<title>Rankings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/tables.css">
	<link rel="stylesheet" type="text/css" href="./mainAssets.css">

</head>

<body>
	<?php include "./nav.php";
	include "./dbInfo.php" ?>

	<h1>Event Rankings</h1>


	<br>Standings are subject to change upon addition of future races.</br>


	<p>
	<div>
		<form style="display:inline-block;" method="post">

			<label>Choose Event</label>
			<select id="event" name="search">
				<option value="5">Boys 2 Mile XC</option>
				<option value="6">Girls 2 Mile XC</option>
				<option value="1">Boys 5000m XC</option>
				<option value="2">Girls 5000m XC</option>
				<option value="3">Boys 3 Mile XC</option>
				<option value="4">Girls 3 Mile XC</option>
				<option value="21">Boys 55m Dash</option>
				<option value="22">Girls 55m Dash</option>
				<option value="27">Boys 55m Hurdles</option>
				<option value="28">Girls 55m Hurdles</option>
				<option value="9">Boys 100m</option>
				<option value="10">Girls 100m</option>
				<!-- <option value="">Boys 100m Hurdles</option>
				<option value="">Girls 100m Hurdles</option> -->
				<option value="11">Boys 200m</option>
				<option value="12">Girls 200m</option>
				<option value="23">Boys 300m</option>
				<option value="24">Girls 300m</option>
				<option value="13">Boys 400m</option>
				<option value="14">Girls 400m</option>
				<option value="25">Boys 500m</option>
				<option value="26">Girls 500m</option>
				<option value="15">Boys 800m</option>
				<option value="16">Girls 800m</option>
				<option value="17">Boys 1600m</option>
				<option value="18">Girls 1600m</option>
				<option value="19">Boys 3200m</option>
				<option value="20">Girls 3200m</option>
				<option value="29">Boys Shot Put</option>
				<option value="30">Girls Shot Put</option>
				<option value="31">Boys High Jump</option>
				<option value="32">Girls High Jump</option>
				<option value="33">Boys Long Jump</option>
				<option value="34">Girls Long Jump</option>
				<option value="35">Boys Triple Jump</option>
				<option value="36">Girls Triple Jump</option>
				<!-- <option value="">Boys 110m Hurdles</option>
				<option value="">Girls 110m Hurdles</option>
				<option value="">Boys 300m Hurdles</option>
				<option value="">Girls 300m Hurdles</option>
				<option value="">Boys 4x100m Relay</option>
				<option value="">Girls 4x100m Relay</option>
				<option value="">Boys 4x200m Relay</option>
				<option value="">Girls 4x200m Relay</option>
				<option value="">Boys 4x400m Relay</option>
				<option value="">Girls 4x400m Relay</option>
				<option value="">Boys 4x800m Relay</option>
				<option value="">Girls 4x800m Relay</option>
				<option value="">Boys 4x1600m Relay</option>
				<option value="">Girls 4x1600m Relay</option>
				<option value="">Boys 1600m Sprint Medley Relay</option>
				<option value="">Girls 1600m Sprint Medley Relay</option>
				<option value="">Boys 4000m Distance Medley Relay</option>
				<option value="">Girls 4000m Distance Medley Relay</option>
				<option value="">Boys Discus</option>
				<option value="">Girls Discus</option>
				<option value="">Boys Pole Vault</option>
				<option value="">Girls Pole Vault</option> -->

			</select>
			<br>
			<label>Grade</label>
			<select name="grade">
				<option value="">All Grades</option>
				<?php
				$findYears = "SELECT DISTINCT REDACTED FROM REDACTED WHERE LENGTH(REDACTED)=4 ORDER BY REDACTED DESC";
				$getYears = mysqli_query($conn, $findYears);

				while ($years = mysqli_fetch_array($getYears)) {
					echo '<option value="' . $years['REDACTED'] . '">' . $years['REDACTED'] . '</option>';
				}

				?>
			</select>
			<br>
			<label>Season</label>
			<select name="season">
				<option value="">All Seasons</option>
				<?php
				$findSeasons = "SELECT DISTINCT REDACTED,REDACTED FROM REDACTED ORDER BY REDACTED DESC";
				$getSeasons = mysqli_query($conn, $findSeasons);

				while ($szn = mysqli_fetch_array($getSeasons)) {

					echo '<option value="' . $szn['REDACTED'] . '">' . $szn['REDACTED'] . '</option>';
				}
				?>
			</select>

			<input type="submit" name="submit">
		</form>
	</div>
	</p>
	<p>
		<?php
                   
		include './dbInfo.php';
		$start = microtime(true);
		if (isset($_POST['submit'])) {

			$event = $_POST['search'];
			$grade = $_POST['grade'];
			$selectedSeason = $_POST['season'];
			if ($event != 29 && $event != 30 && $event != 31 && $event != 32 && $event != 33 && $event != 34 && $event != 35 && $event != 36) {
				if ($grade != null && $selectedSeason == null) {
					$query = "SELECT DISTINCT MIN(REDACTED) AS REDACTED,REDACTED,REDACTED FROM REDACTED 
				JOIN REDACTED ON REDACTED = REDACTED 
				JOIN REDACTED ON REDACTED=REDACTED
				WHERE REDACTED = '$event' AND REDACTED = '$grade' AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MIN(REDACTED) ASC";
				} elseif ($grade != null && $selectedSeason != null) {
					$query = "
					SELECT DISTINCT MIN(REDACTED) AS REDACTED,REDACTED,REDACTED  FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED 
					WHERE REDACTED='$event'  AND REDACTED ='$selectedSeason' AND REDACTED = '$grade' AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MIN(REDACTED) ASC";
				} elseif ($selectedSeason != null && $grade == null) {
					$query = "
					SELECT DISTINCT MIN(REDACTED) AS REDACTED,REDACTED,REDACTED  FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED
					WHERE REDACTED = '$event' AND REDACTED ='$selectedSeason'  AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MIN(REDACTED) ASC";
				} else {

					$query = "SELECT DISTINCT MIN(REDACTED) AS REDACTED,REDACTED,REDACTED  FROM REDACTED 
				JOIN REDACTED ON REDACTED = REDACTED JOIN REDACTED ON REDACTED=REDACTED 
				WHERE REDACTED = '$event' AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MIN(REDACTED) ASC ";
				}
			} else {
				if ($grade != null && $selectedSeason == null) {
					$query = "SELECT DISTINCT MAX(REDACTED) AS REDACTED,REDACTED,REDACTED FROM REDACTED 
				JOIN REDACTED ON REDACTED = REDACTED 
				JOIN REDACTED ON REDACTED=REDACTED
				WHERE REDACTED = '$event' AND REDACTED = '$grade' AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MAX(REDACTED) DESC";
				} elseif ($grade != null && $selectedSeason != null) {
					$query = "
					SELECT DISTINCT MAX(REDACTED) AS REDACTED,REDACTED,REDACTED  FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED 
					WHERE REDACTED='$event'  AND REDACTED ='$selectedSeason' AND REDACTED = '$grade' AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MAX(REDACTED) DESC";
				} elseif ($selectedSeason != null && $grade == null) {
					$query = "
					SELECT DISTINCT MAX(REDACTED) AS REDACTED,REDACTED,REDACTED  FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED
					WHERE REDACTED = '$event' AND REDACTED ='$selectedSeason'  AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MAX(REDACTED) DESC";
				} else {

					$query = "SELECT DISTINCT MAX(REDACTED) AS REDACTED,REDACTED,REDACTED  FROM REDACTED 
				JOIN REDACTED ON REDACTED = REDACTED JOIN REDACTED ON REDACTED=REDACTED 
				WHERE REDACTED = '$event' AND REDACTED='Walt Whitman' GROUP BY REDACTED ORDER BY MAX(REDACTED) DESC ";
				}
			}
                        
			$query_run = mysqli_query($conn, $query) or die("Search Failed");
			$end = microtime(true);
			$dif = $end - $start;
			$queryTime = number_format($dif, 4);
			echo "Query Execution Took ", $queryTime, " Seconds";
			if (mysqli_num_rows($query_run) > 0) {
				$o = 0;
				$t = 0;
				$l = 0;
				$Q = 0;
				$nameId = array();
				$names = array();
				$time = array();


				echo

				"
		
		 <table><tr>
		<th>Number</th>
		 <th>Time</th>
		 <th>Name</th>
		 <th>Grad Year</th>
		 <th>Meet</th>
		 <th>Date</th>
		 </tr>";
			}
			$rank = 1;
			while ($stuff = mysqli_fetch_array($query_run)) {
				$nameId[] = $stuff['REDACTED'];
				$names[] = $stuff['REDACTED'];
				$time[] = $stuff['REDACTED'];
				echo "<tr>";
				echo "<td>#" . $rank++ . "</td>";
				echo "<td>" . $time[$Q++] . "</td>";
				echo "<td><a href='/profile?user=" . $nameId[$o++] . "'</a>" . $names[$t++] . "</td>";
				if ($event != 29 && $event != 30 && $event != 31 && $event != 32 && $event != 33 && $event != 34 && $event != 35 && $event != 36) {
					if ($selectedSeason != null) {
						$more = "SELECT DISTINCT REDACTED,REDACTED,REDACTED,REDACTED FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED
					WHERE REDACTED=$event AND REDACTED = " . $nameId[$l++] . " AND REDACTED = 'Walt Whitman' AND REDACTED ='$selectedSeason'
					 ORDER BY REDACTED ASC LIMIT 1";
					} else {
						$more = "SELECT DISTINCT REDACTED,REDACTED,REDACTED,REDACTED FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED
					WHERE REDACTED= $event AND REDACTED = " . $nameId[$l++] . " AND REDACTED = 'Walt Whitman'
					 ORDER BY REDACTED ASC LIMIT 1";
					}
				} else {
					if ($selectedSeason != null) {
						$more = "SELECT DISTINCT REDACTED,REDACTED,REDACTED,REDACTED FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED
					WHERE REDACTED=$event AND REDACTED = " . $nameId[$l++] . " AND REDACTED = 'Walt Whitman' AND REDACTED ='$selectedSeason'
					 ORDER BY REDACTED DESC LIMIT 1";
					} else {
						$more = "SELECT DISTINCT REDACTED,REDACTED,REDACTED,REDACTED FROM REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED 
					JOIN REDACTED ON REDACTED = REDACTED
					JOIN REDACTED ON REDACTED=REDACTED
					WHERE REDACTED= $event AND REDACTED = " . $nameId[$l++] . " AND REDACTED = 'Walt Whitman'
					 ORDER BY REDACTED DESC LIMIT 1";
					}
				}
				$getMore = mysqli_query($conn, $more) or die("query failed");
				while ($extra = mysqli_fetch_array($getMore)) {
					echo "<td>" . $extra['gradYear'] . "</td>";
					echo "<td> <a href='/Race REDACTED?REDACTED=" . $extra['REDACTED'] . "'> " . $extra['REDACTED'] . " </a> </td>";
					echo "<td>" . $extra['REDACTED'] . "</td>";
					echo "</tr>";
				}
			}
		}


		?>
	</p>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>
