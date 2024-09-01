


	<?php
//variables for for db info for connection below
	
	include 'dbInfo.php';

	//connects to database

		$query = "SELECT REDACTED, REDACTED,REDACTED FROM REDACTED WHERE REDACTED =$search";
		$query_run = mysqli_query($conn, $query);
		
		
	
			$item = mysqli_fetch_array($query_run);
			
				echo "<div class='uT'>";
			echo "<h2 align='center'class='uInfo'>".$item['REDACTED']."<br>".$item['REDACTED']."\t".'Class of'."\t".$item['REDACTED']."</br>"."</h2>";
			echo "</div>";

			
	
		
	
	?>


