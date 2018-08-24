<?php
	// $servername= "localhost";
	// $username = "root";
	// $password = "12345678";
	// $dbname = "lms_demo_2";

	// $conn = new mysqli($servername, $username, $password, $dbname);
	// if ($conn->connect_error) {
        // die("Connection failed: " . $conn->connect_error);
    // }
?>
<?php include"Db_connect.php"; ?>
<?php //include"Navbar_guest.php"; ?>
<?php //include"navigationbar.php"; ?>
<?php include"nav_test.php"; ?>

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
<!DOCTYPE html>
<html>
<head>
	
	<title>Add book</title>
	<script src="https://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="home.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
	
	<script type="text/javascript">
        $(function(){
            $('#example').dataTable();
        });
		$(document).on("click", ".btn-danger", function () {
			var id = $(this).data('id');
			var call = $(this).data('call');
			$('.modal-body #testtt').val( id );
			$('.modal-body #Boo_Call_id').val( call );
		});
		
		$(document).on("click", ".btn-warning", function () 
		{
		  var id = $(this).data('id');
		  var name = $(this).data('name');
		  var year = $(this).data('year');
		  var cat = $(this).data('cat');
		  var sub = $(this).data('sub');
		  var pub = $(this).data('pub');
		  var price = $(this).data('price');
		  var copy = $(this).data('copy');
		  var aut = $(this).data('aut');

		  $(".modal-body #Boo_id").val( id );
		  $(".modal-body #Boo_name").val( name );
		  $(".modal-body #Boo_year").val( year );
		  $(".modal-body #Boo_Cat_id").val( cat );
		  $(".modal-body #Boo_Sub_id").val( sub );
		  $(".modal-body #Boo_Pub_id").val( pub );
		  $(".modal-body #Boo_price").val( price );
		  $(".modal-body #Boo_copy").val( copy );
		  $(".modal-body #Boo_Aut_id").val( aut );
		});
    </script>

	
</head>
<style>
	body {
		background-color: rgba(0, 162, 158, .4);
	}
	h2{
		font-size: 20px;
		text-align: center;
		color: white;
		line-height: 50%;
		font-weight: bold;
	}
	.panel .panel-heading{
		background-color: rgb(0, 162, 158);
		padding: 0px 16px 0px 16px;
		border-top-right-radius: 2px;
		border-top-left-radius: 2px;
		padding-top: 5px; 
		padding-bottom: 10px;
	}
	.modal-header{
		background-color: rgb(0, 162, 158);
		border-top-right-radius: 3px;
		border-top-left-radius: 3px;
	}
	label{
		text-align: right;
	}
	.btn btn-danger{
		width: 28.81px; 
		height: 20px;
	}
	th{
		text-align: center;
		color: white;
	}
	.modal-dialog{
		position: relative;
		display: table;
		overflow-y: auto;    
		overflow-x: auto;
		width: auto;
		min-width: 800px;  
	}
	.panel panel-default{
		margin-right:20px;
	}
	#setting{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
	#manage_book{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
</style>
<body>
<!-- Add book -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading" >
				<h2>เพิ่มหนังสือ</h2>
			</div>
			<div class="panel-body">
					<!-- input add book -->
				<form method="post" action="Add_book.php">	
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ชื่อหนังสือ</label>
						<div class="col-xs-3"><input name="Boo_name" id="Boo_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหนังสือ" data-parsley-minlength="6"></div>
						
						<label class="col-sm-2" style="padding-top: 7px;">ปีที่พิมพ์</label>
						<div class="col-xs-3"><input name="Boo_year" id="Boo_year" class="form-control" required="" type="text" placeholder="กรอกปีที่พิมพ์" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">หมวดหมู่</label>
						<div class="col-xs-3">
							<!-- <input name="Cat_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่" data-parsley-minlength="6"> -->
							<select class="form-control" id="Boo_Cat_id" name="Boo_Cat_id">
								<option value="" disabled selected hidden>เลือกหมวดหมู่ </option>
								<?php
									$sql = "SELECT *
											FROM category_";
									$result_cat = $conn->query($sql);
									if ($result_cat->num_rows > 0) {
										while($row = $result_cat->fetch_assoc()) { ?>
											<option value="<?php echo $row["Cat_id"];?>"><?php echo $row["Cat_name"]?></option>
										<?php }
									}
								?>
							</select>
						</div>
						<label class="col-sm-2" style="padding-top: 7px;">หมวดหมู่ย่อย</label>
						<div class="col-xs-3">
							<!-- <input name="Sub_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่ย่อย" data-parsley-minlength="6"> -->
							<select class="form-control" id="Boo_Sub_id" name="Boo_Sub_id">
								<option value="" disabled selected hidden>เลือกหมวดหมู่ย่อย </option>
								<?php
									$sql = "SELECT *
											FROM subcategories";
									$result_cat = $conn->query($sql);
									if ($result_cat->num_rows > 0) {
										while($row = $result_cat->fetch_assoc()) { ?>
											<option value="<?php echo $row["Sub_id"];?>"><?php echo $row["Sub_name"]?></option>
										<?php }
									}
								?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">สำนักพิมพ์</label>
						<div class="col-xs-3">
							<!-- <input name="Pub_name" class="form-control" required="" type="text" placeholder="เลือกสำนักพิมพ์" data-parsley-minlength="6"> -->
							<select class="form-control" id="Boo_Pub_id" name="Boo_Pub_id">
								<option value="" disabled selected hidden>เลือกสำนักพิมพ์</option>
									<?php
										$sql = "SELECT *
												FROM publisher_";
										$result_pub = $conn->query($sql);
										if ($result_pub->num_rows > 0) {
											while($row = $result_pub->fetch_assoc()) { ?>
												<option value="<?php echo $row["Pub_id"];?>"><?php echo $row["Pub_name"]?></option>
											<?php }
										}
									?>
							</select>
						</div>
						<label class="col-sm-2" style="padding-top: 7px;">ราคา</label>
						<div class="col-xs-3"><input name="Boo_price" id="Boo_price" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">เล่ม</label>
						<div class="col-xs-3"><input name="Boo_copy" id="Boo_copy" class="form-control" required="" type="text" placeholder="กรอกเล่ม" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ผู้แต่ง</label>
						<div class="col-xs-3">
							<!-- <input name="Aut_name" class="form-control" required="" type="text" placeholder="เลือกผู้แต่ง" data-parsley-minlength="6"> -->
							<select class="form-control" id="Boo_Aut_id" name="Boo_Aut_id">
								<option value="" disabled selected hidden>เลือกผู้แต่ง</option>
									<?php
										$sql = "SELECT *
												FROM author_";
										$result_aut = $conn->query($sql);
										if ($result_aut->num_rows > 0) {
											while($row = $result_aut->fetch_assoc()) { ?>
												<option value="<?php echo $row["Aut_id"];?>"><?php echo $row["Aut_name"] . " " . $row["Aut_surname"] ?></option>
											<?php }
										}
									?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="reset" value="Reset" class="btn btn-default" style="margin-left: 25px;">เคลียร์</button>
							</div>
							<div style='float: right;'>
								<button type="submit" name="save" class="btn btn-success" style="margin-right: 25px;">ยืนยัน</button>
							</div>
						</div>
					</div>
				</form>
			</div>		
		</div>		
	</div>		
	<!-- add book db -->
				<?php 
					if(isset($_REQUEST['save'])){
						$check = '';
						$Boo_name = $conn->real_escape_string($_REQUEST['Boo_name']);
						$Boo_year = $conn->real_escape_string($_REQUEST['Boo_year']);
						$Boo_price = $conn->real_escape_string($_REQUEST['Boo_price']);
						$Boo_copy = $conn->real_escape_string($_REQUEST['Boo_copy']);
						$Boo_Aut_id = $conn->real_escape_string($_REQUEST['Boo_Aut_id']);
						$Boo_Pub_id = $conn->real_escape_string($_REQUEST['Boo_Pub_id']);
						$Boo_Cat_id = $conn->real_escape_string($_REQUEST['Boo_Cat_id']);
						$Boo_Sub_id = $conn->real_escape_string($_REQUEST['Boo_Sub_id']);
						
						$sql_check = "SELECT * 
									FROM book_";
						$result_check = $conn->query($sql_check);
						if ($result_check->num_rows > 0) {
							while($row = $result_check->fetch_assoc()) {
								if($row['Boo_name'] === $Boo_name){
									$check = $row['Boo_name'];
								}	
							}
						}
						
						if($check === ''){
							$Call_number =  $Boo_Cat_id .".". $Boo_Sub_id;
							$Call_Cnt_id = 2;
							$sql_c = 	"insert into call_number (Call_number,Call_Cnt_id) 
									values ('$Call_number','$Call_Cnt_id')";
							$insert_c =$conn->query($sql_c);
							
							$sql_ca = "SELECT *
									FROM call_number";
							$result = $conn->query($sql_ca);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										if($row['Call_number'] === $Call_number){
											$Boo_Call_id = $row['Call_id'];
											$sql = 	"insert into book_ (Boo_name,Boo_year,Boo_price,Boo_copy,Boo_Aut_id,Boo_Pub_id,Boo_Cat_id,Boo_Sub_id,Boo_Call_id ) 
													values ('$Boo_name','$Boo_year','$Boo_price','$Boo_copy'
													,'$Boo_Aut_id','$Boo_Pub_id','$Boo_Cat_id','$Boo_Sub_id','$Boo_Call_id')";
											$insert_book =$conn->query($sql);
										}
									}
								}
								
							$sql_bo = "SELECT Boo_id,Call_number,Boo_name,Call_id,Boo_Call_id 
									FROM book_
									JOIN call_number on book_.Boo_Call_id = call_number.Call_id";
							$result_bo = $conn->query($sql_bo);
							if ($result_bo->num_rows > 0) {
								while($row = $result_bo->fetch_assoc()) {
									if($row['Call_number'] === $Call_number){
										$Boo_id = $row['Boo_id'];
										$Call_id = $row['Call_id'];
										$Call_number =  $Boo_Cat_id .".". $Boo_Sub_id .".". $Boo_id;
										//Update
										$sql_up = "Update call_number Set Call_number = '$Call_number' where Call_id = '$Call_id' ";
										$insert_up =$conn->query($sql_up);
									}
								}
							}
						}
						//คำสั่งรีเฟซหน้า
						//echo '<meta http-equiv="refresh" content="0;URL=Add_book.php" />';
						//exit;
					}
				?>
	<!-- end add book db -->

<!-- End Add book -->	

<!-- Modal modify -->
	<div class="modal fade" id="Modal_modify" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content Modify-->
			<form method="post" action="Add_book.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">แก้ไขข้อมูล</h2>
				</div>
				<div class="modal-body">
					<div class="row" style="margin-bottom: 10px;">	
						<input name="Boo_id" id="Boo_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6"> <!-- !!!!!! -->
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">ชื่อหนังสือ</label>
						<div class="col-xs-3"><input name="Boo_name" id="Boo_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหนังสือ" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ปีที่พิมพ์</label>
						<div class="col-xs-3"><input name="Boo_year" id="Boo_year" class="form-control" required="" type="text" placeholder="กรอกปีที่พิมพ์" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">หมวดหมู่</label>
						<div class="col-xs-3">
							<!--<input name="Cat_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่" data-parsley-minlength="6">-->
							<select class="form-control" id="Boo_Cat_id" name="Boo_Cat_id">
								<option value="" disabled selected hidden>เลือกหมวดหมู่ </option>
								<?php
									$sql = "SELECT *
											FROM category_";
									$result_catm = $conn->query($sql);
									if ($result_catm->num_rows > 0) {
										while($row = $result_catm->fetch_assoc()) { ?>
											<option value="<?php echo $row["Cat_id"];?>"><?php echo $row["Cat_name"]?></option>
										<?php }
									}
								?>
							</select>
						</div>
						<label class="col-sm-2" style="padding-top: 7px;">หมวดหมู่ย่อย</label>
						<div class="col-xs-3">
							<!--<input name="Sub_name" class="form-control" required="" type="text" placeholder="เลือกหมวดหมู่ย่อย" data-parsley-minlength="6">-->
							<select class="form-control" id="Boo_Sub_id" name="Boo_Sub_id">
								<option value="" disabled selected hidden>เลือกหมวดหมู่ย่อย </option>
								<?php
									$sql = "SELECT *
											FROM subcategories";
									$result_cat = $conn->query($sql);
									if ($result_cat->num_rows > 0) {
										while($row = $result_cat->fetch_assoc()) { ?>
											<option value="<?php echo $row["Sub_id"];?>"><?php echo $row["Sub_name"]?></option>
										<?php }
									}
								?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">สำนักพิมพ์</label>
						<div class="col-xs-3">
							<!--<input name="Pub_name" class="form-control" required="" type="text" placeholder="เลือกสำนักพิมพ์" data-parsley-minlength="6">-->
							<select class="form-control" id="Boo_Pub_id" name="Boo_Pub_id">
								<option value="" disabled selected hidden>เลือกสำนักพิมพ์</option>
									<?php
										$sql = "SELECT *
												FROM publisher_";
										$result_pub = $conn->query($sql);
										if ($result_pub->num_rows > 0) {
											while($row = $result_pub->fetch_assoc()) { ?>
												<option value="<?php echo $row["Pub_id"];?>"><?php echo $row["Pub_name"]?></option>
											<?php }
										}
									?>
							</select>
						</div>
						<label class="col-sm-2" style="padding-top: 7px;">ราคา</label>
						<div class="col-xs-3"><input name="Boo_price" id="Boo_price" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">เล่ม</label>
						<div class="col-xs-3"><input name="Boo_copy" id="Boo_copy" class="form-control" required="" type="text" placeholder="กรอกเล่ม" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ผู้แต่ง</label>
						<div class="col-xs-3">
							<!--<input name="Aut_name" class="form-control" required="" type="text" placeholder="เลือกผู้แต่ง" data-parsley-minlength="6">-->
							<select class="form-control" id="Boo_Aut_id" name="Boo_Aut_id">
								<option value="" disabled selected hidden>เลือกผู้แต่ง</option>
									<?php
										$sqlam = "SELECT *
												FROM author_";
										$result_autm = $conn->query($sqlam);
										if ($result_autm->num_rows > 0) {
											while($row = $result_autm->fetch_assoc()) { ?>
												<option value="<?php echo $row["Aut_id"];?>"><?php echo $row["Aut_name"] . " " . $row["Aut_surname"] ?></option>
											<?php }
										}
									?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="row">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="button"  class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left: 20px;">ยกเลิก</button>
							</div>
							<div style='float: right;'>
								<button type="submit" name="bt_up" id="bt_up" class="btn btn-success" style="margin-right: 20px;">ยืนยัน</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	
				<!-- Modal book db -->
				<?php 
					if(isset($_REQUEST['bt_up'])){
						$Boo_id = $conn->real_escape_string($_REQUEST['Boo_id']);
						$Boo_name = $conn->real_escape_string($_REQUEST['Boo_name']);
						$Boo_year = $conn->real_escape_string($_REQUEST['Boo_year']);
						$Boo_Cat_id = $conn->real_escape_string($_REQUEST['Boo_Cat_id']);
						$Boo_Sub_id = $conn->real_escape_string($_REQUEST['Boo_Sub_id']);
						$Boo_Pub_id = $conn->real_escape_string($_REQUEST['Boo_Pub_id']);
						$Boo_price = $conn->real_escape_string($_REQUEST['Boo_price']);
						$Boo_copy = $conn->real_escape_string($_REQUEST['Boo_copy']);
						$Boo_Aut_id = $conn->real_escape_string($_REQUEST['Boo_Aut_id']);
						
						//Update
						//echo $Boo_id;
						//echo $Boo_name;
						$sql_upb = "Update book_ Set Boo_name = '$Boo_name' ,
									Boo_year = '$Boo_year' ,
									Boo_Cat_id = '$Boo_Cat_id' ,
									Boo_Sub_id = '$Boo_Sub_id' ,
									Boo_Pub_id = '$Boo_Pub_id' ,
									Boo_price = '$Boo_price' ,
									Boo_copy = '$Boo_copy' ,
									Boo_Aut_id = '$Boo_Aut_id' 
									where Boo_id = '$Boo_id' ";
						$insert_upb =$conn->query($sql_upb);
						
					}
				?>
			<!-- end Modal book db -->
	
<!-- Modal modify -->


<!-- Modal delete -->
	<div class="modal fade" id="Modal_delete" role="dialog">
		<div class="modal-dialog" style='min-width: 400px;'>
			<!-- Modal content Modify-->
			<form method="post" action="Add_book.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">ลบข้อมูล</h2>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบข้อมูลหรือไม่</h4>
					<h4 ></h4>
					<input name="testtt" id="testtt" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					<input name="Boo_Call_id" id="Boo_Call_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					<span id="idHolder"></span>	
				</div>
				<div class="modal-footer">
					<form method="post" action="Add_book.php">	
					<div class="row">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="button"  class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left: 20px;">ยกเลิก</button>
							</div>
							<div style='float: right;'>
								<button type="submit" name="bt_de" id="bt_de" class="btn btn-success" style="margin-right: 20px;">ยืนยัน</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
			</form>
		</div>
					<!-- delete book db -->
				<?php 
					if(isset($_REQUEST['bt_de'])){
						$Boo_id = $conn->real_escape_string($_REQUEST['testtt']);
						$Boo_Call_id = $conn->real_escape_string($_REQUEST['Boo_Call_id']);
						
						//DELETE 
						$sql_de = "DELETE FROM book_
									WHERE Boo_id = '$Boo_id'";
						$insert_de =$conn->query($sql_de);
						$sql_dec = "DELETE FROM call_number
									WHERE Call_id  = '$Boo_Call_id'";
						$insert_dec =$conn->query($sql_dec);
						
						//echo '<script>window.location.href = '\'Add_book.php\''</script>';
					}
				?>
			<!-- end delete book db -->
	</div>
<!-- Modal delete -->


	
<!-- Table book -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading">
				<h2>รายการหนังสือ</h2>
			</div>
			<div class="panel-body">
				<!--  -->
				<table class="table table-bordered" id="example">
					<thead>
						<tr bgcolor="rgba(0, 162, 158, .6)" >
							<th>ลำดับ</th>
							<th>เลขเรียกหนังสือ</th>
							<th>ชื่อหนังสือ</th>
							<th>ชื่อผู้แต่ง</th>
							<th>หมวดหมู่</th>
							<th>ปีที่พิมพ์</th>
							<th>ดำเนินการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT Boo_id,Call_number,Boo_name,Aut_name,Aut_surname,Cat_name,Boo_year,Boo_Cat_id,Boo_Sub_id,Boo_Pub_id,Boo_price,Boo_copy,Boo_Aut_id,Boo_Call_id
									FROM book_
									JOIN call_number on book_.Boo_Call_id = call_number.Call_id
									JOIN author_ on book_.Boo_Aut_id = author_.Aut_id
									JOIN category_ on book_.Boo_Cat_id = category_.Cat_id";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$i = 0;
								while($row = $result->fetch_assoc()) { 
									$i++; ?>
									<tr>
										<td><?php echo $i ?></td>
										<td><?php echo $row["Call_number"] ?></td>
										<td><?php echo $row["Boo_name"] ?></td>
										<td><?php echo $row["Aut_name"] ?></td>
										<td><?php echo $row["Cat_name"] ?></td>
										<td><?php echo $row["Boo_year"] ?></td>
										<td align="center">
											<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify" 
													data-id="<?php echo $row['Boo_id'] ?>"
													data-name="<?php echo $row['Boo_name'] ?>"
													data-year="<?php echo $row['Boo_year']?>" 
													data-cat="<?php echo $row['Boo_Cat_id']?>" 
													data-sub="<?php echo $row['Boo_Sub_id']?>" 
													data-pub="<?php echo $row['Boo_Pub_id']?>" 
													data-price="<?php echo $row['Boo_price']?>" 
													data-copy="<?php echo $row['Boo_copy']?>" 
													data-aut="<?php echo $row['Boo_Aut_id']?>" 
											>
												<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
											</button>
											<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete" 
													data-id="<?php echo $row['Boo_id'] ?>" 
													data-call="<?php echo $row['Boo_Call_id']?>" 
											>
												<span class="glyphicon glyphicon-trash"></span><i ="ti ti-close"></i>
											</button>
										</td>
									</tr>
								<?php }
							}
							//$conn->close();
						?>
					</tbody>
				</table>
			</div>		
		</div>		
	</div>
<!-- End Table book -->
					





</body>
</html>