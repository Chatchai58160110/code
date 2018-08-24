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
	<title>Manage user</title>
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
		$(document).on("click", ".btn-warning", function () 
		{
		  var id = $(this).data('id');
		  var fname = $(this).data('fname');
		  var lname = $(this).data('lname');
		  var stac = $(this).data('stac');
		  var pass = $(this).data('pass');
		  var name = fname.concat(" ", lname);
		  
		  $(".modal-body #Emp_id").val( id );
		  $(".modal-body #Emp_fname").val( name );
		  $(".modal-body #Stac_name").val( stac );
		  $(".modal-body #Emp_password").val( pass );
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
		min-width: 700px;  
	}
	.panel panel-default{
		margin-right:20px;
	}
	#setting{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
	#manage_user{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
</style>
<body>
	
		<!-- Modal modify -->
	<div class="modal fade" id="Modal_modify" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content Modify-->
			<form method="post" action="Manage_user.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">แก้ไขข้อมูล</h2>
				</div>
				<div class="modal-body">
					<div class="row" style="margin-bottom: 10px;">	
						<input name="Mag_id" id="Mag_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6"> <!-- !!!!!! -->
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">รหัสพนักงาน</label>
						<div class="col-xs-3"><input name="Emp_id" id="Emp_id" class="form-control" required="" type="text" placeholder="" data-parsley-minlength="6" disabled></div>
						<label class="col-sm-2" style="padding-top: 7px;">ชื่อ นามสกุล</label>
						<div class="col-xs-3"><input name="Emp_fname" id="Emp_fname" class="form-control" required="" type="text" placeholder="" data-parsley-minlength="6" disabled></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-2" style="padding-top: 7px; margin-left: 40px;">ตำแหน่ง</label>
						<div class="col-xs-3"><input name="Stac_name" id="Stac_name" class="form-control" required="" type="text" placeholder="" data-parsley-minlength="6" disabled></div>
						<label class="col-sm-2" style="padding-top: 7px;">Password</label>
						<div class="col-xs-3"><input name="Emp_password" id="Emp_password" class="form-control" required="" type="text" placeholder="" data-parsley-minlength="6"></div>
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
		
<!-- show data user -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading">
				<h2>รายการผู้ใช้งาน</h2>
				<div class="panel-ctrls" data-action-collapse='{"target": ".panel-body"}' data-actions-container=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span><i class="separator"></i></div>
			</div>
			<div class="panel-body">
				<!--  -->
				<table class="table table-bordered" id="example">
					<thead>
						<tr bgcolor="rgba(0, 162, 158, .6)" >
							<th>ลำดับ</th>
							<th>รหัสพนักงาน</th>
							<th>ชื่อ นามสกุล</th>
							<th>ตำแหน่ง</th>
							<th>Password</th>
							<th>ดำเนินการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT Emp_id,Emp_fname,Emp_lname,Stac_name,Emp_password
									FROM employee_
									JOIN status_account on employee_.Emp_stac_id  = status_account.Stac_id";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$i = 0;
								while($row = $result->fetch_assoc()) { 
									$i++;   ?>
									<tr>
										<td><?php echo   $i ?></td>
										<td><?php echo  $row["Emp_id"] ?> </td>
										<td><?php echo  $row["Emp_fname"]. " " . $row["Emp_lname"] ?> </td>
										<td><?php echo  $row["Stac_name"] ?> </td>
										<td><?php echo  $row["Emp_password"] ?> </td>
										<td align="center">
											<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify"
												data-id="<?php echo $row['Emp_id'] ?>"
												data-fname="<?php echo $row['Emp_fname'] ?>"
												data-lname="<?php echo $row['Emp_lname'] ?>"
												data-stac="<?php echo $row['Stac_name'] ?>"
												data-pass="<?php echo $row['Emp_password'] ?>"
											>
												<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
											</button>
											<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete">
												<span class="glyphicon glyphicon-trash"></span><i ="ti ti-close"></i>
											</button>
										</td>
									</tr>
								<?php }
							}
							$conn->close();
						?>
					</tbody>
				</table>
			</div>		
		</div>	
	</div>
<!-- end show data user -->

</body>
</html>