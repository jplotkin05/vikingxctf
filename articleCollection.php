<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/mainAssets.css">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9004808495184063"
     crossorigin="anonymous"></script>
</head>

<body>

    <?php
    //standard assets
    include($_SERVER['DOCUMENT_ROOT'] . "/dbInfo.php");
    include($_SERVER['DOCUMENT_ROOT'] . "/nav.php");
    ?>
    <h1>Articles</h1>
<p>
    <form method="POST">
    <label for="sort">Sort By</label>
    <select name="sort" >
        <option value="recent">Most Recent</option>
        <option value="old">Oldest</option>
        <option value="popular">Most Viewed</option>
    </select>
    <input type="submit" name="submit" value="Submit">
    </form>
</p>
    <?php
    

        if(isset($_POST['submit'])){
          $queryMethod = $_POST['sort'];
        if($queryMethod=="recent"){
            $findArticles = "SELECT REDACTED, REDACTED, REDACTED, REDACTED,REDACTED FROM REDACTED ORDER BY REDACTED DESC";
        }
        else if($queryMethod == "old"){
            $findArticles = "SELECT REDACTED, REDACTED, REDACTED, REDACTED,REDACTED FROM REDACTED ORDER BY REDACTED ASC";
        }
        else if($queryMethod=="popular"){
        $findArticles = "SELECT REDACTED, REDACTED, REDACTED, REDACTED,REDACTED FROM REDACTED ORDER BY REDACTED DESC";
        }
      }
      else{
        $findArticles = "SELECT REDACTED, REDACTED, REDACTED, REDACTED,REDACTED FROM REDACTED ORDER BY REDACTED DESC";
      }
    $queryTopArt = "SELECT REDACTED FROM REDACTED ORDER BY REDACTED DESC LIMIT 1";
      $findIt = mysqli_query($conn,$queryTopArt);
      $match = mysqli_fetch_array($findIt);
    $getArticles = mysqli_query($conn,$findArticles)or die("Could not fetch articles");
    
    if(mysqli_num_rows($getArticles)>0){
       echo ' <div style= "padding-left:5%;"class="row row-cols-1 row-cols-md-3 g-4" >';
        
       while($information = mysqli_fetch_array($getArticles)){
           echo '<div class="col" style="color:black; width: 22rem;">
           <div width="200px", height="100px"class="card">
           <img src="'.$information['REDACTED'].'" class="card-img-top" alt="">
           <div class="card-body">
           <h5 class="card-title">'.$information['REDACTED']. '</h5>
           <h6 class="card-text">'.$information['REDACTED'].'</h6>
            <p class="card-text">'.$information['REDACTED']. '</p>';
            if($information['REDACTED']==$match['REDACTED']){
                echo'
            <svg width="30px" height="30px"xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="red">
  <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
</svg>Top Viewed<p>';
            }
            echo'
          <button class="btn btn-primary" name="goArticle" type="submit" value="'.$information['REDACTED'].'" > <a style="color:white; text-decoration:none; " href="/article.php?articleId='.$information['REDACTED']. '">Click Here</a></button> </p>
        </div>
        </div>
        </div>';
       }

       echo'</div>';
    }
  
    ?>
</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
