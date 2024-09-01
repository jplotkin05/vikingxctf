<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content= "width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" type="image/jpg" href="/images/logo.png"/>
	<title>Results</title>
	<script data-ad-client="ca-pub-9004808495184063" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9004808495184063"
     crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="/mainAssets.css">
<link rel="stylesheet" type="text/css" href="/tables.css">
</head>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/nav.php");?>

	<h1>Race Results</h1>
	<p align="center"><strong>Pick which season you would like to view race results from.</strong></p>
	<p>
		<?php
			include 'dbInfo.php';
			$queryXC = "SELECT REDACTED, REDACTED FROM REDACTED JOIN REDACTED ON REDACTE = REDACTED WHERE REDACTED = 1 ORDER BY REDACTED.REDACTED DESC";
			$queryITF = "SELECT REDACTED, REDACTED  FROM REDACTED JOIN REDACTED ON REDACTED = REDACTED WHERE REDACTED = 2 ORDER BY REDACTED.REDACTED DESC";
			$queryOTF = "SELECT REDACTED, REDACTED  FROM REDACTED JOIN REDACTED ON REDACTED = REDACTED WHERE REDACTED = 3 ORDER BY REDACTED.REDACTED DESC";
			$getXC = mysqli_query($conn,$queryXC);
			$getITF = mysqli_query($conn, $queryITF);
			$getOTF = mysqli_query($conn, $queryOTF);
		if($getXC->num_rows>0){
		echo 
		 "<table align='center'><tr>
		 <th>Cross Country</th>
		 <th>Indoor Track</th>
		 <th>Outdoor Track</th>
		 </tr><tr>";
			while($rowXC = mysqli_fetch_array($getXC) AND $rowITF = mysqli_fetch_array($getITF) AND $rowOTF = mysqli_fetch_array($getOTF)){			
		echo "<tr><td><a href='/season.php?find=". $rowXC['REDACTED']."'> ".$rowXC['REDACTED']. "</a></td>
				<td><a href='/season.php?find=" . $rowITF['REDACTED']. "'> " . $rowITF['REDACTED'] . "</a></td>
				<td><a href='/season.php?find=" . $rowOTF['REDACTED']  . "'> " . $rowOTF['REDACTED'] . "</a></td>
		</tr>";
		}
			echo"</tr>";
			}
		?>
	</p>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<?php
include 'footer.php';
	?>
</body>

</html>
