<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dbInfo.php");
$meet =  mysqli_real_escape_string($conn, $_GET['results']);
  $getTitle = "SELECT meetName,rawResults,meetDate FROM meets WHERE id = '$meet' ";
  $titleQuery = mysqli_query($conn, $getTitle) or die("Could not fetch title");
  $title = mysqli_fetch_array($titleQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $title['meetName']; ?> Results">
  <meta name="keywords" content="<?php echo $title['meetName']; ?> times race results events placement performances">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
  <title>Meet Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <style>
    a {
      color: purple;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="/mainAssets.css">


</head>

<body>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . "/nav.php");
  echo '<h1 id="title" align="center">';
  echo $title['REDACTED'] . '</h1>';
  if ($meet == "%" || $meet == "") {
    header("Location: /index");
  }
  $x = 1;
  $getEvent = "SELECT REDACTED, REDACTED FROM REDACTED WHERE REDACTED = '$meet'";
  $fetch = mysqli_query($conn, $getEvent) or die("Falied to get events");
  $events = array();
  while ($data = mysqli_fetch_array($fetch)) {
    $eventId[] = $data['REDACTED'];
    $events[] = $data['REDACTED'];
  }

  
  

  echo ' <p><div align="center">';
  date_default_timezone_set("America/New_York");
 $currentDate = date("Y-m-d");
if($title['REDACTED']!=NULL){
  if($currrentDate==$title['REDACTED']){
      echo '<a href="/rawResults.php?meet=' . $meet . '">Raw Results Live🔴</a>';
  }
  else{
  echo'<a href="/rawResults.php?meet='.$meet. '">Complete Raw Results✔️</a>';
  }
}

echo'<table>
  <th>#</th>
  <th>Event</th>';

  $entries = 1;
  for($a=0; $a< mysqli_num_rows($fetch); $a++){
    echo '  
  <tr>                                       
<td>' . $entries++ . '. </td>
  <td><a href="/times?eventId=' . $eventId[$a] . '&meetId=' . $meet . '&meetName=' . $title['REDACTED'] . ' &eventName=' . $events[$a] . '"> ' . $events[$a] . '</a></td>
    </tr>';
  }
  echo "</p>";
  ?>

<?php
include 'footer.php';
	?>
</body>
</html>
