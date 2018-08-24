<?php include"Db_connect.php"; ?>
<?php //include"Navbar_guest.php"; ?>
<?php //include"navigationbar.php"; ?>
<?php include"nav_test.php"; ?>

<?php 
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<style>
	#home{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
</style>
<body>

	<div class="container">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
		<!-- Indicators -->
		
		<ol class="carousel-indicators" style="width: 32%">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		  <div class="item active">
			<img src="Image/BOOK_READING.jpg" alt="" style="width:100%;">
			<div class="carousel-caption">
				<h2>"A book is a device to ignite the imagination."</h2>
				<h4>Alan Bennett, The Uncommon Reader</h4>
			</div>
		  </div>

		  <div class="item">
			<img src="Image/Library3.jpg" alt="" style="width:100%;">
			<div class="carousel-caption">
				<h2>"No entertainment is so cheap as reading,</h2>
				<h2>nor any pleasure so lasting."</h2>
				<h4>Lady M. W. Montagu</h4>
			</div>
		  </div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	</div>

</body>
</html>
