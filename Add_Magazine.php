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
?>

<!DOCTYPE html>
<html>
<head>

	<title>Add magazine</title>
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
			$('.modal-body #Mag_id').val( id );
			$('.modal-body #Mag_Call_id').val( call );
		});
		$(document).on("click", ".btn-warning", function () 
		{
		  var id = $(this).data('id');
		  var name = $(this).data('name');
		  var year = $(this).data('year');
		  var copy = $(this).data('copy');
		  var magt = $(this).data('magt');
		  var price = $(this).data('price');
		  
		  $(".modal-body #Mag_id").val( id );
		  $(".modal-body #Mag_name").val( name );
		  $(".modal-body #Mag_year").val( year );
		  $(".modal-body #Mag_copy").val( copy );
		  $(".modal-body #Mag_Magt_id").val( magt );
		  $(".modal-body #Mag_price").val( magt );
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
	#manage_mag{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
</style>
<body>
	<!-- from add magazine -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading" >
				<h2>เพิ่มวารสาร</h2>
			</div>
			<div class="panel-body">
				<!--  -->
				<form method="post" action="Add_Magazine.php">	
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ชื่อวารสาร</label>
						<div class="col-xs-3"><input name="Mag_name" id="Mag_name" class="form-control" required="" type="text" placeholder="กรอกชื่อวารสาร" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ปี</label>
						<div class="col-xs-3"><input name="Mag_year" id="Mag_year" class="form-control" required="" type="text" placeholder="กรอก  ปีที่พิมพ์" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ฉบับ</label>
						<div class="col-xs-3"><input name="Mag_copy" id="Mag_copy" class="form-control" required="" type="text" placeholder="กรอกฉบับ" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ราย</label>
						<div class="col-xs-3">
							<!-- <input name="name_book" class="form-control" required="" type="text" placeholder="กรอกฉบับ" data-parsley-minlength="6">-->
							<select class="form-control" id="Mag_Magt_id" name="Mag_Magt_id">
								<option value="" disabled selected hidden>เลือกราย </option>
								<?php
								$sql = "SELECT *
										FROM magzine_type_";
								$result_mag = $conn->query($sql);
								if ($result_mag->num_rows > 0) {
									while($row = $result_mag->fetch_assoc()) { ?>
										<option value="<?php echo $row["Magt"];?>"><?php echo $row["Magt_name"]?></option>
									<?php }
								}
								?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 50px;">ราคาต่อฉบับ</label>
						<div class="col-xs-3"><input name="Mag_price" id="Mag_price" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
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
	<!-- end from add magazine -->
	<!-- add magazine db -->
	<?php 
		if(isset($_REQUEST['save'])){
			$check = '';
			$Mag_name = $conn->real_escape_string($_REQUEST['Mag_name']);
			$Mag_year = $conn->real_escape_string($_REQUEST['Mag_year']);
			$Mag_Magt_id = $conn->real_escape_string($_REQUEST['Mag_Magt_id']);
			$Mag_price = $conn->real_escape_string($_REQUEST['Mag_price']);
			$Mag_copy = $conn->real_escape_string($_REQUEST['Mag_copy']);
						
			$sql_check = "SELECT * 
						FROM magzine_";
			$result_check = $conn->query($sql_check);
			if ($result_check->num_rows > 0) {
				while($row = $result_check->fetch_assoc()) {
					if($row['Mag_name'] === $Mag_name){
						$check = $row['Mag_name'];
					}	
				}
			}
			
			if($check === ''){
				$Call_number =  'Test';
				$Call_Cnt_id = 3;
				$sql_c = 	"insert into call_number (Call_number,Call_Cnt_id) 
							values ('$Call_number','$Call_Cnt_id')";
				$insert_c =$conn->query($sql_c);
							
				$sql_ca = "SELECT *
							FROM call_number";
				$result = $conn->query($sql_ca);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if($row['Call_number'] === $Call_number){
							$Mag_Call_id = $row['Call_id'];
							$sql = "insert into magzine_ (Mag_name,Mag_year,Mag_Magt_id,Mag_price,Mag_Call_id,Mag_copy )
									values ('$Mag_name','$Mag_year','$Mag_Magt_id','$Mag_price','$Mag_Call_id','$Mag_copy')";
							$insert_mag =$conn->query($sql);
							//echo "2222222";
						}
					}
				}
				$sql_mag = "SELECT Mag_id,Call_number,Mag_name,Call_id,Mag_Call_id,Mag_copy 
							FROM magzine_
							JOIN call_number on magzine_.Mag_Call_id = call_number.Call_id";
				$result_mag = $conn->query($sql_mag);
				if ($result_mag->num_rows > 0) {
					while($row = $result_mag->fetch_assoc()) {
						if($row['Call_number'] === $Call_number){
							$Mag_id = $row['Mag_id'];
							$Mag_copy = $row['Mag_copy'];
							$Call_id = $row['Call_id'];
							$Call_number =  $Mag_id .".". $Mag_copy .".". (string)$Mag_year;
							//Update
							$sql_up = "Update call_number Set Call_number = '$Call_number' where Call_id = '$Call_id' ";
							$insert_up =$conn->query($sql_up);
						}
					}
				}
			}
		}
	?>
	<!-- end add magazine db -->
	<!-- Modal modify -->
	<div class="modal fade" id="Modal_modify" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content Modify-->
			<form method="post" action="Add_Magazine.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">แก้ไขข้อมูล</h2>
				</div>
				<div class="modal-body">
					<div class="row" style="margin-bottom: 10px;">	
						<input name="Mag_id" id="Mag_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6"> <!-- !!!!!! -->
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">ชื่อวารสาร</label>
						<div class="col-xs-3"><input name="Mag_name" id="Mag_name" class="form-control" required="" type="text" placeholder="กรอกชื่อวารสาร" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ปี</label>
						<div class="col-xs-3"><input name="Mag_year" id="Mag_year" class="form-control" required="" type="text" placeholder="กรอก  ปีที่พิมพ์" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">ฉบับ</label>
						<div class="col-xs-3"><input name="Mag_copy" id="Mag_copy" class="form-control" required="" type="text" placeholder="กรอกฉบับ" data-parsley-minlength="6"></div>
						<label class="col-sm-2" style="padding-top: 7px;">ราย</label>
						<div class="col-xs-3">
							<!-- <input name="name_book" class="form-control" required="" type="text" placeholder="กรอกฉบับ" data-parsley-minlength="6">-->
							<select class="form-control" id="Mag_Magt_id" name="Mag_Magt_id">
								<option value="" disabled selected hidden>เลือกราย </option>
								<?php
								$sql = "SELECT *
										FROM magzine_type_";
								$result_mag = $conn->query($sql);
								if ($result_mag->num_rows > 0) {
									while($row = $result_mag->fetch_assoc()) { ?>
										<option value="<?php echo $row["Magt"];?>"><?php echo $row["Magt_name"]?></option>
									<?php }
								}
								?>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">ราคาต่อฉบับ</label>
						<div class="col-xs-3"><input name="Mag_price" id="Mag_price" class="form-control" required="" type="text" placeholder="กรอกราคา" data-parsley-minlength="6"></div>
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
	
				<!-- Modal magazine db -->
				<?php 
					if(isset($_REQUEST['bt_up'])){
						$Mag_id = $conn->real_escape_string($_REQUEST['Mag_id']);
						$Mag_name = $conn->real_escape_string($_REQUEST['Mag_name']);
						$Mag_year = $conn->real_escape_string($_REQUEST['Mag_year']);
						$Mag_copy = $conn->real_escape_string($_REQUEST['Mag_copy']);
						$Mag_Magt_id = $conn->real_escape_string($_REQUEST['Mag_Magt_id']);
						$Mag_price = $conn->real_escape_string($_REQUEST['Mag_price']);
						
						//Update
						$sql_upm = "Update magzine_ Set Mag_name = '$Mag_name' ,
									Mag_year = '$Mag_year' ,
									Mag_copy = '$Mag_copy' ,
									Mag_Magt_id = '$Mag_Magt_id' ,
									Mag_price = '$Mag_price' 
									where Mag_id = '$Mag_id' ";
						$insert_upm =$conn->query($sql_upm);
					}
				?>
			<!-- end Modal magazine db -->
	
	<!-- Modal modify -->
	
	<!-- Modal delete -->
	<div class="modal fade" id="Modal_delete" role="dialog">
		<div class="modal-dialog" style='min-width: 400px;'>
			<!-- Modal content Modify-->
			<form method="post" action="Add_Magazine.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">ลบข้อมูล</h2>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบข้อมูลหรือไม่</h4>
					<h4 ></h4>
					<input name="Mag_id" id="Mag_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					<input name="Mag_Call_id" id="Mag_Call_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					<span id="idHolder"></span>	
				</div>
				<div class="modal-footer">
					<form method="post" action="Add_Magazine.php">	
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
						$Mag_id = $conn->real_escape_string($_REQUEST['Mag_id']);
						$Mag_Call_id = $conn->real_escape_string($_REQUEST['Mag_Call_id']);
						
						//DELETE 
						$sql_de = "DELETE FROM magzine_
									WHERE Mag_id = '$Mag_id'";
						$insert_de =$conn->query($sql_de);
						$sql_dec = "DELETE FROM call_number
									WHERE Call_id  = '$Mag_Call_id'";
						$insert_dec =$conn->query($sql_dec);
						
						//echo '<script>window.location.href = '\'Add_book.php\''</script>';
					}
				?>
			<!-- end delete book db -->
	</div>
	<!-- Modal delete -->
	
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading">
				<h2>รายการวารสาร</h2>
				<div class="panel-ctrls" data-action-collapse='{"target": ".panel-body"}' data-actions-container=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span><i class="separator"></i></div>
			</div>
			<div class="panel-body">
				<!--  -->
				<table class="table table-bordered" id="example">
					<thead>
						<tr bgcolor="rgba(0, 162, 158, .6)" >
							<th>ลำดับ</th>
							<th>เลขเรียกวารสาร</th>
							<th>ชื่อวารสาร</th>
							<th>ฉบับ</th>
							<th>ราย</th>
							<th>ปี</th>
							<th>ดำเนินการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT Mag_id,Call_number,Mag_name,Magt_name,Mag_year,Mag_copy,Mag_Call_id,Mag_Magt_id,Mag_price 
									FROM magzine_
									JOIN call_number on magzine_.Mag_Call_id = call_number.Call_id
									JOIN magzine_type_ on magzine_.Mag_Magt_id = magzine_type_.Magt";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$i = 0;
								while($row = $result->fetch_assoc()) { 	
									$i++; ?>
									<tr>
										<td><?php echo $i ?></td>
										<td><?php echo $row["Call_number"] ?></td>
										<td><?php echo $row["Mag_name"] ?></td>
										<td><?php echo $row["Mag_copy"] ?></td>
										<td><?php echo $row["Magt_name"] ?></td>
										<td><?php echo $row["Mag_year"] ?></td>
										<td align="center">
											<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify"
												data-id="<?php echo $row['Mag_id'] ?>"
												data-name="<?php echo $row['Mag_name'] ?>"
												data-year="<?php echo $row['Mag_year'] ?>"
												data-copy="<?php echo $row['Mag_copy'] ?>"
												data-magt="<?php echo $row['Mag_Magt_id'] ?>"
												data-price="<?php echo $row['Mag_price'] ?>"
											>
												<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
											</button>
											<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete"
												data-id="<?php echo $row['Mag_id'] ?>" 
												data-call="<?php echo $row['Mag_Call_id']?>" 
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
		


</body>
</html>