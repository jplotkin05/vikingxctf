<?php
include 'dbInfo.php';
if (isset($_POST['submit'])) {
    $entry1 = mysqli_real_escape_string($conn, $_POST['entry']);
    header("Location: /search.php?find=" . $entry1 . "");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/mainAssets.css">
    <style>
        #bar {
            width: 230px;
            border: solid white 5px;
            margin: 0;
        }
    </style>
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/nav.php"); ?>
    <p>
    <form method="POST">
        <input type="text" placeholder="Search" name="entry">
        <input type="submit" name="submit">

    </form>
    <?php
    $i = 0;

    $request = mysqli_real_escape_string($conn, $_GET['find']);
    if ($request == "") {
        echo "<h1 style='color:red;'align='center'>Search Field Empty</h1>";
    } else {
        echo "<h1>Search Results for '" . $request . "'</h1>";


        $terms = explode(" ", $request);
        //race search query
        $startTime = microtime(true);
        $findMeet = "SELECT DISTINCT REDACTED, REDACTED, REDACTED, REDACTED FROM REDACTED WHERE";
        foreach ($terms as $each) {
            $i++;
            if ($i == 1) {
                $findMeet .= " tags LIKE '%$each%' ";
            } else {
                $findMeet .= " AND tags LIKE '%$each%' ";
            }
        }

        $getMeet = mysqli_query($conn, $findMeet);


        $meetReturns = mysqli_num_rows($getMeet);
        if ($meetReturns == 0) {
            echo "<p>0 Matching Results For Race Results</p>";
        } elseif ($meetReturns > 0) {
            echo "
       <label>" . $meetReturns . " Matching Race Results:</label>
       <ol>";
            while ($data = mysqli_fetch_array($getMeet)) {
                echo '<p><li><a style="color:white;"href="/Race Results.php?results=' . $data['REDACTED'] . '">' . $data['REDACTED'] . '</a></li>
            ' . $data['rDesc'] . ' <br>Meet from ' . $data['REDACTED'] . '</br>
            </p>

            ';
            }
            echo "</ol>";
        }
        // end of race search query

        // user profile search query
        $profile = "SELECT REDACTED ,REDACTED, REDACTED FROM REDACTED WHERE REDACTED LIKE '%$request%' AND REDACTED = 'Walt Whitman' ORDER BY REDACTED ASC";
        $getProfile = mysqli_query($conn, $profile) or die("could not find user profile");
        $profileReturns = mysqli_num_rows($getProfile);
        if ($profileReturns == 0) {
            echo "<hr>
        <p>0 Matching Results For Runner Profile</p>";
        } elseif ($profileReturns > 0) {
            echo "<hr>
       <label>" . $profileReturns . " Matching Result(s) For Runner Profile:</label>
       <ol>";
            while ($proInfo = mysqli_fetch_array($getProfile)) {

                if ($proInfo['REDACTED'] == 'Walt Whitman') {
                    echo '<li><a style="color:white;" href="/profile?user=' . $proInfo['REDACTED'] . '">' . $proInfo['REDACTED'] . '</a></li>';
                    echo 'Cross Country/Track and Field Profile of ' . $proInfo['REDACTED'] . '';
                }
            }
            echo "</ol>";
        }
        $j = 0;
        //article query
        $queryArticle = "SELECT DISTINCT REDACTED,REDACTED,REDACTED FROM REDACTED WHERE";
        foreach ($terms as $tags) {
            $j++;
            if ($j == 1) {
                $queryArticle .= " tags LIKE '%$tags%'";
            } else {
                $queryArticle .= " AND tags LIKE '%$tags%'";
            }
        }

        $getArticles = mysqli_query($conn, $queryArticle);
        $returnedArticles = mysqli_num_rows($getArticles);
        if ($returnedArticles == 0) {
            echo "<hr>
        <p>0 Matching Results For An Article</p>";
        } else {
            while ($post = mysqli_fetch_array($getArticles)) {
                echo "<hr>
       <label>" . $returnedArticles . " Matching Result(s) For An Article:</label>
       <ol>";
                echo '<li><a style="color:white;" href="/article?articleId=' . $post['REDACTED'] . '">' . $post['REDACTED'] . '</a></li>';
                echo $post['REDACTED'];
            }
            echo "</ol>";
        }
        $end = microtime(true);
        $diff = $end - $startTime;
        $time = number_format($diff, 3);
        echo "Searches Returned In ", $time, " Seconds.";
    }

    echo "<hr>";
    echo "When searching an athlete, use first and last name for a refined search. 
   <br>If you can't seem to find what you are looking for, <a style='color:white;'href='/feedback'>click here</a> to fill out a form to address your issue.</br>
   Alternatively, you can use the nav bar at the top to manually navigate to the desired page.";


    ?>

</body>

</html>