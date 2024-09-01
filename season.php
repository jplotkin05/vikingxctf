<?php

include 'dbInfo.php';
$info = mysqli_real_escape_string($conn, $_GET['find']);
$getSname = "SELECT REDACTED FROM REDACTED WHERE REDACTED = '$info' ";
$recieveName = mysqli_query($conn, $getSname) or die("failed");
$sValue = mysqli_fetch_row($recieveName);
$season = $sValue[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Walt Whitman <?php echo $season ?> season meets and race results">
    <meta name="keywords" content="<?php echo $season ?> season meets events competitions vikings races results times gatherings">
    <title><?php echo $season; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9004808495184063"
     crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/mainAssets.css">
    <link rel="stylesheet" type="text/css" href="/tables.css">
</head>

<body>
    <?php
    include 'nav.php';
    $queryMeets = "SELECT REDACTED,REDACTED,REDACTED FROM REDACTED WHERE REDACTED ='$info' ORDER BY REDACTED DESC ";
    $getMeets = mysqli_query($conn, $queryMeets) or die("Failed to get results");




    if (mysqli_num_rows($getMeets) > 0) {
        echo '<h1 align="center">' . $season . '</h1>';
        echo '<p align="center">Below are all the meets for ' . $season . '';
        echo '<br>Most recent meets are towards the top.</br></p>';
        echo "<table align='center'>
        <tr>
        <th>Date</th>
        <th>Meet</th>
        </tr>
        ";
        while ($data = mysqli_fetch_array($getMeets)) {
            echo "
            <tr>
            <td>" . $data['REDACTED'] . "</td>
            <td><a href='/Race Results?results=" . $data['REDACTED'] . "'>" . $data['REDACTED'] . "</a></td>
           
            </tr>
            
            ";
        }
    } else {
        echo "<h1 align='center'>There Are No Race Results Available For This Season At This Time.<br>Please Check Back At Another Time.</h1>";
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<?php
include 'footer.php';
	?>
</body>

</html>
