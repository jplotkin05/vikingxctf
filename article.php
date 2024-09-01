<?php
include './dbInfo.php';
$article = mysqli_real_escape_string($conn, $_GET['articleId']);
    $findArticle = "SELECT REDACTED, REDACTED, REDACTED,REDACTED FROM REDACTED WHERE id=$article";
    $fetchRequest = mysqli_query($conn, $findArticle) or die("Could not fetch article contents");
    $data = mysqli_fetch_array($fetchRequest);

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
    <title><?php echo $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/tables.css">
    <link rel="stylesheet" href="/mainAssets.css">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9004808495184063"
     crossorigin="anonymous"></script>
    <style>
      td{
          margin:none;
          padding:none;
      }
        @media only screen and (max-width:540px) {
            #topImg {
                height: 200px;
                width: 100%;
            }
        }
      
    </style>
</head>

<body>

    <?php
    //standard assets
    include 'nav.php';
  
    
    echo "<h1>" . $data['REDACTED'] . "</h1>";
    if ($data['REDACTED'] != null) {

        echo "<p>Written By " . $data['REDACTED'] . "</p>";
    } else {
        echo "<p>Written By Website Contributer<p>";
    }
    echo "<p>" . $data['pubDate'] . "</p>";
    echo "<hr>
    <pre style='font-family:arial;font-size:12pt;  white-space:pre-wrap;'>
    ".$data['contents']."
    </pre>
    </p>"
    ?>
    <?php
    if (isset($_GET['REDACTED'])) {
        $artId = $_GET["REDACTED"];
        $queryLinks = "SELECT REDACTED FROM REDACTED WHERE id ='$artId'";
        $getClicks = mysqli_query($conn, $queryLinks) or die("Could not get clicks.");
        $currentClicks = mysqli_fetch_array($getClicks);
        $newCount = $currentClicks['REDACTED'] + 1;
        $update = "UPDATE REDACTED SET REDACTED ='$newCount' WHERE id='$artId'";
        $setUpdate = mysqli_query($conn, $update) or die("Could not update clicks.");
    }
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>
