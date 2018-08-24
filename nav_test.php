<?php 
	session_start();
	ob_start();
	//echo $_SESSION['abc'];
	// if($_SESSION['abc']){
		// echo 'okkkk';
	// }else{
		// echo 'noooo';
	// }
?>

<html>
<head>
	<script src="resource/js/jquery-1.11.0.js"></script>
	<script src="resources/js/bootstrap.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<script type="text/javascript">
$(document).ready(function() {
    $('dropdown-toggle').dropdown();
	
	    $('ul a').click(function(){
          $('a').removeClass("active");
          $(this).addClass("active");
      	});
	 
});
</script>

<style>


li {
    float: right;
}

li a {
    display:inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
.active{
	border-bottom: solid 3px #00a29e;
    color: #00a29e;
}

li a:hover, .dropbtn:hover .dropbtn{
    border-bottom: solid 3px #00a29e;
}
li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
.dropdown-content a:hover {background-color: #00a29e}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-    target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="Homepage.php">Brand</a>
	</div>
<?php //echo $_SESSION['abc']; ?>
	<!-- admin -->
	<?php if($_SESSION['abc'] === '2') {?>		
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		  <ul class="nav navbar-nav navbar-right">
			<li><a href="Homepage.php" id="home">HOME</a></li>
			<li><a href="#">MANAGE</a></li>
			<li class="dropdown">
			  <a href="#" id="setting" class="dropdown-toggle" data-toggle="dropdown">SETTING <b class="caret"></b></a>
			  <ul class="dropdown-menu">
				<li><a href="Add_book.php" id="manage_book">จัดการหนังสือ</a></li>
				<li><a href="Add_Magazine.php" id="manage_mag">จัดการวารสาร</a></li>
				<li><a href="Add_audio.php">จัดการโสตทัศนวัตถุ</a></li>
				<li><a href="Add_author.php">จัดการผู้แต่ง</a></li>
				<li><a href="Add_publisher.php">จัดการสำนักพิมพ์</a></li>
				<li><a href="Manage_category.php" id="manage_cat">จัดการหมวดหมู่</a></li>
				<li><a href="Manage_Subcategory.php" id="manage_sub">จัดการหมวดหมู่ย่อย</a></li>
				<li><a href="Manage_user.php" id="manage_user">จัดการผู้ใช้งาน</a></li>
				
				<li class="divider"></li> <!-- เส้นแบ่ง -->
				<li><a href="#">รายงาน</a></li>
			  </ul>
			</li>
			<li><a href="Logout_main.php">LOGOUT</a></li>
		  </ul>
		</div>
	<!-- user -->
	<?php  
	}else if($_SESSION['abc'] === '1') {		
	?>
				
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		  <ul class="nav navbar-nav navbar-right">
			<li><a href="Homepage.php" id="home">HOME</a></li>
			<li><a href="#">CATALOG</a></li>
			<li><a href="#">HISTORY</a></li>
			<li><a href="Logout_main.php">LOGOUT</a></li>
		  </ul>
		</div>
	<?php  
	}else{
	?>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		  <ul class="nav navbar-nav navbar-right">
			<li><a href="Homepage.php" id="home">HOME</a></li>
			<li><a href="#">CATALOG</a></li>
			<li><a href="Login.php" id="signin">SIGN IN</a></li>
		  </ul>
		</div>
	<?php } ?>

</nav>
</body>
</html>