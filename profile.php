<?php
include 'dbInfo.php';
$search = $_GET['user'];

$nameKeys = "SELECT REDACTED FROM REDACTED WHERE REDACTED =$search";
$getKeys = mysqli_query($conn, $nameKeys);
$uName = mysqli_fetch_array($getKeys);
$finalName = $uName['REDACTED'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?php echo $finalName; ?> wwhs wwxc wwtf vikings whitman runners athlete profile">
	<meta name="description" content=" <?php echo $uName['REDACTED'], "'s "; ?>Whitman Athlete Cross Country/Track and Field Profile on vikingxctf.com">
	<title><?php echo $uName['REDACTED'], "'s "; ?>Athlete Profile</title>
	<link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     crossorigin="anonymous"></script>
	<style>
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

		table {
			background-color: none;
		}
	</style>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" type="text/css" href="/mainAssets.css">
</head>

<body>

	<?php include($_SERVER['DOCUMENT_ROOT'] . "/nav.php");

	?>

	<?php

	include 'dbInfo.php';
	include 'info.php';
	if ($item['REDACTED'] != 'Walt Whitman') {
		echo ("<script>location.href = '/index.php';</script>");
	}
	include 'chart.php';


	$runnerEvents = "SELECT DISTINCT REDACTED,REDACTED FROM REDACTED JOIN REDACTED ON REDACTED=REDACTED JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED= $search ORDER BY REDACTED ASC ";
	
	$getEvents = mysqli_query($conn, $runnerEvents);
	$numberOfResults = mysqli_num_rows($getEvents);
	
	if ($numberOfResults > 0) {
		echo "Times are in order by more recent dates being at the top.";

		$events = array();
		while ($eventData = mysqli_fetch_array($getEvents)) {
			$events[] = $eventData['REDACTED'];
			$eventId[] = $eventData['REDACTED'];
		}
		
		for($x=0; $x<$numberOfResults; $x++) {
			$findTime = "SELECT REDACTED FROM REDACTED JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED = $search AND REDACTED=" . $eventId[$x] . " ORDER BY REDACTED ASC LIMIT 1;";
			$getTime = mysqli_query($conn, $findTime) or die("Failed to get prs.");
			$check =mysqli_fetch_array($getTime);
			$scan= $check['mark'];
			
			
			if(strpos($scan,"-")){
				$findPr = "SELECT REDACTED FROM REDACTED JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED = $search AND REDACTED=" . $eventId[$x] . " ORDER BY REDACTED DESC LIMIT 1;";
			}
			else{
				$findPr = "SELECT REDACTED FROM REDACTED JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED = $search AND REDACTED=" . $eventId[$x] . " ORDER BY REDACTED ASC LIMIT 1;";

			}
			
			$getPRs = mysqli_query($conn, $findPr) or die("Failed to get prs.");
			$prs = mysqli_fetch_array($getPRs);
			
			$times = "SELECT REDACTED,REDACTED,REDACTED,REDACTED, REDACTED FROM REDACTED JOIN REDACTED ON REDACTED = REDACTED  JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED = '$search'AND REDACTED = " . $eventId[$x] . " ORDER BY REDACTED DESC";
			$minYear = $item['REDACTED']-4 ."-08-01";
			$maxYear = $item['REDACTED'] ."-06-20";
			
			$getRest = "SELECT DISTINCT MIN(REDACTED) AS REDACTED,REDACTED FROM REDACTED JOIN REDACTED ON REDACTED=REDACTED JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED= ".$eventId[$x]." AND REDACTED!=$search AND REDACTED BETWEEN '$minYear' AND '$maxYear' GROUP BY REDACTED ORDER BY MIN(REDACTED) ASC";
			
			
			$fetchRest = mysqli_query($conn,$getRest) or die('fail');
			$faster = 0;
			$slower = 0;
			$myPr = $prs['REDACTED'];
			
			while($compTimes=mysqli_fetch_array($fetchRest)){
				
				if($compTimes['REDACTED']>$myPr){
					$faster++;
				}
				else{
					$slower++;
				}
			}
		$percent = round($faster / ($faster + $slower) * 100, 1);
			
			
			$getTimes = mysqli_query($conn, $times) or die("Could not find user times.");
			//table info
			
			echo "<table>
				<tr>
				<th>Time</th>
				<th>Place</th>
				<th>&nbsp;&nbsp;Meet</th>
				<th>&nbsp;&nbsp;Date</th>
				</tr>";
			while ($eventData = mysqli_fetch_array($getTimes)) {
				
				if ($eventData['REDACTED'] == $prs['REDACTED'] && $eventData['REDACTED'] != "DNS") {
					echo "
						<tr>
						<td>" . $eventData['REDACTED'] . " <font style='font-weight:bold;'color ='gold'>PR</fontr></td>
						<td align='right'>" . $eventData['place'] . "&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;<a href='/Race%20Results?results=" . $eventData['REDACTED'] . "'>" . $eventData['REDACTED'] . "</a></td>
						<td align='right'>&nbsp;&nbsp;" . $eventData['REDACTED'] . "</td>
						
						</tr>
						";
				} else {
					echo "
					<tr>
					<td>" . $eventData['REDACTED'] . "</td>
					<td align='right'>" . $eventData['REDACTED'] . "&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;<a href='/Race%20Results?results=" . $eventData['REDACTED'] . "'>" . $eventData['REDACTED'] . "</a></td>
						<td align='right'>&nbsp;&nbsp;" . $eventData['REDACTED'] . "</td>
					</tr>
					";
				}
			}



			echo "<hr style='height:4px;'><h3>" . $events[$x] . "</h3>";
			
			if($percent>55){
			echo "Your PR is better than " . $percent  . "% of the athletes you've competed against.";
			}
			
		}
	} else {
		echo "<h2 align='center'>No Data Available</h2>";
	}

	?>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
