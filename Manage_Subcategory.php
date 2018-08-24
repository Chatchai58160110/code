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
	<title>Manage subcategory</title>
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
			$('.modal-body #Sub_id').val( id );
		});
		$(document).on("click", ".btn-warning", function () 
		{
		  var id = $(this).data('id');
		  var name = $(this).data('name');
		  
		  $(".modal-body #Sub_idd").val( id );
		  $(".modal-body #Sub_id").val( id );
		  $(".modal-body #Sub_name ").val( name );
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
	#manage_sub{
		border-bottom: solid 3px #00a29e;
		color: #00a29e;
	}
</style>
<body>
<!-- add subcategories -->
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading" >
				<h2>เพิ่มหมวดหมู่ย่อย</h2>
			</div>
			<div class="panel-body">
				<!--  -->
				<form name="insert" method="post" action="Manage_Subcategory.php">
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-3" style="padding-top: 7px; margin-left: 150px;">รหัสหมวดหมู่ย่อย</label>
						<div class="col-xs-4"><input name="Sub_id" id="Sub_id" class="form-control" required="" type="text" placeholder="กรอกรหัสหมวดหมู่" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">
						<label class="col-sm-3" style="padding-top: 7px; margin-left: 150px;">ชื่อหมวดหมู่ย่อย</label>
						<div class="col-xs-4"><input name="Sub_name" id="Sub_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหมวดหมู่" data-parsley-minlength="6"></div>
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="reset" value="Reset" class="btn btn-default" style="margin-left: 25px;">เคลียร์</button>
							</div>
							<div style='float: right;'>
								<button type="submit" class="btn btn-success"  name="save" style="margin-right: 25px;">ยืนยัน</button>
							</div>
						</div>
					</div>
				</form>
			</div>		
		</div>		
	</div>	
	
	<?php 
	if(isset($_REQUEST['save'])){
		$check = '';
		$Sub_id = $conn->real_escape_string($_REQUEST['Sub_id']);
		$Sub_name = $conn->real_escape_string($_REQUEST['Sub_name']);
		
		$sql_check = "SELECT * 
						FROM category_";
		$result_check = $conn->query($sql_check);
		if ($result_check->num_rows > 0) {
			while($row = $result_check->fetch_assoc()) {
				if($row['Cat_name'] === $Cat_name){
					$check = $row['Cat_name'];
				}	
			}
		}
		if($check === ''){
			$sql = 	"insert into subcategories (Sub_id,Sub_name)
					VALUES ('$Sub_id','$Sub_name')";
			$insert_sub =$conn->query($sql);
		}
	}					
	?>	
	
<!-- end add subcategories -->	

<!-- Modal modify -->
	<div class="modal fade" id="Modal_modify" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content Modify-->
			<form method="post" action="Manage_Subcategory.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">แก้ไขข้อมูล</h2>
				</div>
				<div class="modal-body">
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-4" style="padding-top: 7px; margin-left: 50px;">รหัสหมวดหมู่ย่อย</label>
						<div class="col-xs-4"><input name="Sub_idd" id="Sub_idd" class="form-control" required="" type="text" placeholder="กรอกรหัสหมวดหมู่" data-parsley-minlength="6"  disabled></div>
						<input name="Sub_id" id="Sub_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					</div>
					<div class="row" style="margin-bottom: 10px;">	
						<label class="col-sm-4" style="padding-top: 7px; margin-left: 50px;">ชื่อหมวดหมู่ย่อย</label>
						<div class="col-xs-4"><input name="Sub_name" id="Sub_name" class="form-control" required="" type="text" placeholder="กรอกชื่อหมวดหมู่" data-parsley-minlength="6"></div>
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
						$Sub_id = $conn->real_escape_string($_REQUEST['Sub_id']);
						$Sub_name = $conn->real_escape_string($_REQUEST['Sub_name']);
						
						//Update
						$sql_upm = "Update subcategories Set Sub_id = '$Sub_id' ,
									Sub_name = '$Sub_name'
									where Sub_id = '$Sub_id' ";
						$insert_upm =$conn->query($sql_upm);
					}
				?>
			<!-- end Modal magazine db -->
	
<!-- Modal modify -->

<!-- Modal delete -->
	<div class="modal fade" id="Modal_delete" role="dialog">
		<div class="modal-dialog" style='min-width: 400px;'>
			<!-- Modal content Modify-->
			<form method="post" action="Manage_Subcategory.php">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">ลบข้อมูล</h2>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบข้อมูลหรือไม่</h4>
					<h4 ></h4>
					<input name="Sub_id" id="Sub_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					<span id="idHolder"></span>	
				</div>
				<div class="modal-footer">
					<form method="post" action="Manage_Subcategory.php">	
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
						
						$Sub_id = $conn->real_escape_string($_REQUEST['Sub_id']);
						
						//DELETE 
						$sql_de = "DELETE FROM subcategories
									WHERE Sub_id = '$Sub_id'";
						$insert_de =$conn->query($sql_de);
						
						//echo '<script>window.location.href = '\'Add_book.php\''</script>';
					}
				?>
			<!-- end delete book db -->
	</div>
<!-- Modal delete -->

<!-- show data subcategories -->	
	<div class="col-xs-12">
		<div class="panel panel-default" style="margin-right:20px; display: block; visibility: visible; opacity: 1; transform: translateY(0px);" data-widget='{"draggable": "false"}' data-widget-static="">
			<div class="panel-heading">
				<h2>รายการหมวดหมู่ย่อยหนังสือ</h2>
				<div class="panel-ctrls" data-action-collapse='{"target": ".panel-body"}' data-actions-container=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span><i class="separator"></i></div>
			</div>
			<div class="panel-body">
				<!--  -->
				<table class="table table-bordered" id="example">
					<thead>
						<tr bgcolor="rgba(0, 162, 158, .6)" >
							<th>ลำดับ</th>
							<th>รหัสหมวดหมู่ย่อย</th>
							<th>ชื่อหมวดหมู่ย่อย</th>
							<th>ดำเนินการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * 
									FROM subcategories";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$i = 0;
								while($row = $result->fetch_assoc()) {
									$i++; ?>
									<tr>
										<td><?php echo $i ?></td>
										<td><?php echo $row["Sub_id"] ?></td>
										<td><?php echo $row["Sub_name"] ?></td>
										<td align="center">
											<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify"
												data-id="<?php echo $row['Sub_id'] ?>"
												data-name="<?php echo $row['Sub_name'] ?>"
											>
												<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
											</button>
											<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete"
												data-id="<?php echo $row['Sub_id'] ?>" 
											>
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
<!-- end show data subcategories -->	


</body>
</html>