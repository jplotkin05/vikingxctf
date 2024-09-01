<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" type="image/jpg" href="/images/logo.png" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script data-ad-client="ca-pub-9004808495184063" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<title>Calendar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/mainAssets.css">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9004808495184063"
     crossorigin="anonymous"></script>
	<style type="text/css">
		@media only screen and (min-width:541px) {
			.mobileMessage {
				display: none;
			}
		}

		@media only screen and (max-width:540px) {
			#calendar {
				height: 300px;
				width: 80%;
			}

			.mobileMessage {
				color: red;
				text-align: center;
			}
		}
	</style>
</head>

<body>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/nav.php"); ?>
	<h1 align="center">Calendar</h1>
	<p align="center">
		Important Races And Events Can Be Found Here
		 <br><strong class="mobileMessage">Tilt device horizontally for best display.</strong></br></strong>

	</p>

	<p align="center">
		<iframe id="calendar" style="background-color:black;" src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FNew_York&amp;src=N2xxOTM3NTRzNDR0bGRzNmc1cTlwNTMzNTRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23E4C441" style="border:solid 1px #777" width="75%" height="750" frameborder="0" scrolling="no"></iframe>
		
	</p>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<?php
include 'footer.php';
	?>
</body>

</html>
