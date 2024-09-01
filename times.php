<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dbInfo.php");
$meetName = mysqli_real_escape_string($conn, $_GET['REDACTED']);
$raceEvent = mysqli_real_escape_string($conn, $_GET['REDACTED']);
$meetId =  mysqli_real_escape_string($conn, $_GET['REDACTED']);
$eventId = mysqli_real_escape_string($conn, $_GET['REDACTED']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo $raceEvent . " race results from " . $meetName ?>">
  <meta name="keywords" content="<?php echo $raceEvent . " " . $meetName." " ?>race results times place placement xc cross country tf track and field event">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $raceEvent; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <style>
    a {
      color: purple;
    }
  </style>

  <link rel="stylesheet" type="text/css" href="/tables.css">
  <link rel="stylesheet" type="text/css" href="/mainAssets.css">
</head>

<body>
  <?php
  include($_SERVER['DOCUMENT_ROOT'] . "/nav.php");
  echo "<div id='top'>
   <center>
   <h1>" . $meetName . "</h1><br>
  <h2>" . $raceEvent . "</h2>";

  $checkTimes = "SELECT REDACTED FROM REDACTED WHERE REDACTED = '$meetId' AND REDACTED = '$eventId' ORDER BY REDACTED ASC";
  $verify = mysqli_query($conn, $checkTimes) or die("Could not fetch results");
  $t = mysqli_fetch_array($verify);

  if (strpos($t['mark'], "-") !== false) {
    $findResults = "SELECT REDACTED,REDACTED,REDACTED,REDACTED,REDACTED,REDACTED,REDACTED,REDACTED FROM REDACTED JOIN REDACTED ON REDACTED = REDACTED WHERE REDACTED = '$meetId' AND REDACTED = '$eventId' ORDER BY REDACTED ASC";
  } else {
    $findResults = "SELECT REDACTED,REDACTED,REDACTED,REDACTED,REDACTED,REDACTED,REDACTED,REDACTED FROM REDACTED JOIN REDACTED ON REDACTED = REDACTED WHERE REDACTED = '$meetId' AND REDACTED = '$eventId' ORDER BY REDACTED ASC ";
  }



  // }
  $getTimes = mysqli_query($conn, $findResults);
  if (mysqli_num_rows($getTimes) > 0) {
    echo "
    <div style='overflow-x:auto;'>
   <center>
   <a href='#score'>Click Here to Get Team Scores</a></div>
       <table><tr>
        <th>Place</th>
        <th>Name</th>
        <th>Mark</th>
        <th>Pace</th>
        <th>Grad Year</th>
        <th>Team</th>
        </tr>";

    while ($row = mysqli_fetch_array($getTimes)) {
      if($row['REDACTED']!=""){
      echo "<tr><td>" . $row['place'] . "</td>";
      if ($row['REDACTED'] == 'Walt Whitman') {
        echo "<td><a href='/profile?user=" . $row['REDACTED'] . "'>" . $row['REDACTED'] . "</a></td>";
      } else {
        echo "<td>" . $row['REDACTED'] . "</td>";
      }
      echo "<td>" . $row['REDACTED'] . "</td>";
      echo "<td>" . $row['REDACTED'] . "</td>";
      echo "<td>" . $row['REDACTED'] . "</td>";
      echo "<td>" . $row['REDACTED'] . "</td>";
      echo "</tr>
    </center>
    ";
    }
  }
  }

  ?>
  <?php

  $queryScores = "SELECT REDACTED, REDACTED, REDACTED FROM REDACTED WHERE REDACTED='$meetId' AND REDACTED='$eventId' ORDER BY REDACTED ASC";
  $getScores = mysqli_query($conn, $queryScores) or die("Failed to get scores.");
  $check = mysqli_fetch_array($getScores);
  if($check['score']==''){
    $queryScores = "SELECT REDACTED, REDACTED, REDACTED FROM REDACTED WHERE REDACTED='$meetId' AND REDACTED='$eventId' ORDER BY REDACTED ASC";
    $getScores = mysqli_query($conn, $queryScores) or die("Failed to get scores.");
  }
  $numResults = mysqli_num_rows($getScores);

  if ($numResults > 0) {

    echo '
  <center>
  <p ><table id="score">
  <tr>
  <th>Place</th>
  <th>School</th>
  <th>Mark</th>
  </tr></center>';
    $place = 1;
    while ($datas = mysqli_fetch_array($getScores)) {
      echo '
    <tr>
    <td>' . $place++ . '</td>
    <td>' . $datas['REDACTED'] . '</td>
    <td>' . $datas['REDACTED'] . $datas['REDACTED'] . '</td>
    </tr>
    ';
    }
    if (mysqli_num_rows($getTimes) > 0) {
      echo '

<a href="#top">Back to Top</a>';
    }
    echo '

</center>
';
  }
  ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>
