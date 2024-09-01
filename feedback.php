<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/tables.css">
    <link rel="stylesheet" type="text/css" href="/mainAssets.css">
</head>

<body>
    <?php
    include "./nav.php";
    ?>
    <h1>Provide Feedback/Report Issues</h1>
    <p>If you have any suggestions, comments, or concerns regarding the website, <br>you can share them by completing the form below.</p>
    <p>Responses are only viewed and accessed by website owner.</p>
    <form method="post" name="feedback form" onsubmit="return emptyCheck()">
        <label for="Name">Name</label>
        <br>
        <input type="text" name="Name" id="getName" autocomplete="off" placeholder="(Optional)">
        <p>
            Enter your number or email if you wish to be contacted regarding your submission.
            <br>
            <label for="contact">Contact Info</label>
            <br>
            <input type="text" name="contact" id="getContact" autocomplete="off" placeholder="(Optional)">
        </p>
        <label for="response">Response<font color="red">*</font></label>
        <br>
        <textarea name="response" id="userResponse" autocomplete="off" placeholder="(Required)" rows="4" cols="50"></textarea>
        <br>
        <label style="color:red;" id="warning"></label>
        <br>
        <button type="submit" name="submission">Submit</button>
    </form>
    <script>
        function emptyCheck() {
            var searchInput = document.getElementById('userResponse').value;
            var message = document.getElementById('warning');
            if (searchInput == "") {
                message.textContent = 'Must complete response in order to submit!';
                return false;
            }
        }
    </script>
    <?php
    include './dbInfo.php';
    if (isset($_POST["submission"])) {
        $subName = mysqli_real_escape_string($conn, $_POST["Name"]);
        $contactInfo = mysqli_real_escape_string($conn, $_POST["contact"]);
        $uResponse = mysqli_real_escape_string($conn, $_POST["response"]);
        $subInfo = "INSERT INTO `REDACTED` (`REDACTED`, `REDACTED`, `REDACTED`, `REDACTED`) VALUES (NULL, '$subName', '$contactInfo', '$uResponse')";
        $sendInfo  = mysqli_query($conn, $subInfo);
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
</body>

</html>