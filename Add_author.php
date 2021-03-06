<?php include"Db_connect.php"; ?>
<?php //include"Navbar_guest.php"; ?>
<?php //include"navigationbar.php"; ?>
<?php include"nav_test.php"; ?>

<?php 
	session_start();
	ob_start();
?>

<html>
	<head>
		<title>Add_authors </title>
		<meta charset="ISO-8859-1">	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
		
		<script>
			$(function(){
					//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
					$('#example').dataTable();
				});
			
			$(document).on("click", ".btn-warning", function () 
			{
			  var name = $(this).data('name');
			  var surname = $(this).data('surname');
			  var id = $(this).data('id');

			  $(".modal-body #Aut_name").val( name );
			  $(".modal-body #Aut_surname").val( surname );
			  $(".modal-body #Aut_id").val( id );
			});
			$(document).on("click", ".btn-danger", function () {
				var id = $(this).data('id');
				
				$(".modal-body #del").val( id );
			});
		</script>
		
		<style>
			.modal-header{
				background-color: rgb(0, 162, 158);
				border-top-right-radius: 3px;
				border-top-left-radius: 3px;
			}
			body{
				background-color: rgba(0,162,158,0.4);
				font-size:14px;
			}
			h2{
				font-size:20px;
				color: white; 
			}
			label{
				text-align: right;
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
			
		</style>
		
	</head>
	 
	<body>
			<?php 
				$Aut_name = $conn->real_escape_string($_REQUEST['Aut_name']);
				$Aut_surname = $conn->real_escape_string($_REQUEST['Aut_surname']);
				if(isset($_REQUEST['save'])){
					$sql = "insert into author_(Aut_name,Aut_surname)
							value('".$_REQUEST["Aut_name"]."','".$_REQUEST["Aut_surname"]."')";
					$insert_aut = $conn->query($sql);	
			}?>
			<div class="col-xs-12" style="padding-top: 15px; padding-bottom: 0px;">
				<div class="panel panel-default" style="margin-right:20px;">
					<div class="panel-heading" style="background-color:#00a29e">
						<h2 style="margin-top:5px; margin-bottom:5px;">เพิ่มรายการผู้แต่ง</h2>
					</div>
					
					<div class="panel-body">
						<form method="post" action="">
							<div class="tab-content">
								<div class="tab-pane active" id="dowizard">
									<div class="row" style="padding:10px">
											<label class="col-sm-2 control-label" style="margin-left:250px;">ชื่อ</label>
											<div class="col-sm-4"><input name="Aut_name" class="form-control" required="" type="text" placeholder="กรอกชื่อ" data-parsley-minlength="6"></input></div>
									</div>
									<div class="row" style="padding:10px">
											<label class="col-sm-2 control-label" style="margin-left:250px;">นามสกุล</label>
											<div class="col-sm-4"><input name="Aut_surname" class="form-control" required="" type="text" placeholder="กรอกนามสกุล" data-parsley-minlength="6"></input></div>
									</div>
									<div class="row">
										<div style="float: left;"><button class="btn btn-default" style="margin-left: 25px;" type="reset">เคลียร์</button></div>
										<div style="float: right;"><button class="btn btn-success" name="save" style="margin-right: 25px;" type="submit">ยืนยัน</button></div>
									</div>
								</div>	
							</div>
						</form>	
					</div>
				</div>
			</div>
			
			
			
			<!-- Modal modify -->
			<div class="modal fade" id="Modal_modify" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content Modify-->
					<form method="post" id="update">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title">แก้ไขข้อมูล</h2>
						</div>
						<div class="modal-body">
									<div class="row" style="padding:10px">
										<input name="Aut_id" id="Aut_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6"> <!-- !!!!!! -->
											<label class="col-sm-2 control-label" style="margin-left:100px;">ชื่อ</label>
											<div class="col-sm-6"><input id="Aut_name" name="Aut_name" class="form-control" required="" type="text" placeholder="กรอกชื่อ" data-parsley-minlength="6"></input></div>
									</div>
									<div class="row" style="padding:10px">
											<label class="col-sm-2 control-label" style="margin-left:100px;">นามสกุล</label>
											<div class="col-sm-6"><input id="Aut_surname" name="Aut_surname" class="form-control" required="" type="text" placeholder="กรอกนามสกุล" data-parsley-minlength="6"></input></div>
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
										<button type="submit" name="update" id="update" class="btn btn-success" style="margin-right: 20px;">ยืนยัน</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>	
				</div>
			</div>
			
			<?php 
				$Aut_name = $conn->real_escape_string($_REQUEST['Aut_name']);
				$Aut_id = $conn->real_escape_string($_REQUEST['Aut_id']);
				$Aut_surname = $conn->real_escape_string($_REQUEST['Aut_surname']);
				if(isset($_REQUEST['update'])){
					$sql = "update author_ set Aut_name = '$Aut_name',
							Aut_surname = '$Aut_surname' 
							where Aut_id = '$Aut_id'";
					$update_pub = $conn->query($sql);}
			?>
<!-- Modal modify -->

<!-- Modal delete -->
	<div class="modal fade" id="Modal_delete" role="dialog">
		<div class="modal-dialog" style='min-width: 400px;'>
			<!-- Modal content Modify-->
			<form method="post" action="">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">ลบข้อมูล</h2>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบข้อมูลหรือไม่</h4>
					<h4 ></h4>
					<input name="del" id="del" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6">
					<span id="idHolder"></span>	
				</div>
				<div class="modal-footer">
					<form method="post" action="Add_author_.php">	
					<div class="row">	
						<!-- <button type="button" class="btn btn-default">Default</button> -->
						<div class='test'>
							<div style='float: left;'>
								<button type="button"  class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="margin-left: 20px;">ยกเลิก</button>
							</div>
							<div style='float: right;'>
								<button type="submit" name="delete" id="delete" class="btn btn-success" style="margin-right: 20px;">ยืนยัน</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
			</form>
		</div>
	</div>	
		<!-- delete book db -->
			<?php 
				if(isset($_REQUEST['delete'])){
					$delete = $conn->real_escape_string($_REQUEST['del']);
					
					//DELETE 
					$sql = "DELETE FROM author_
								WHERE Aut_id = '$delete'";
					$delete_aut =$conn->query($sql);
					
					
				}
			?>
		<!-- end delete book db -->
	
<!-- Modal delete -->			
			
			<!-- PANEL TABLE -->
			<div class="col-xs-12" style="padding: 0px 15px 15px; pading: 10px;">
				<div class="panel panel-default" style="margin-right:20px;">
					<div class="panel-heading" style="background-color:#00a29e">
						<h2 style="margin-top:5px; margin-bottom:5px;">รายการผู้แต่ง</h2>
					</div>
					
					<div class="panel-body" style="margin:20px">
						<table class="table table-striped table-borded" id="example">
							<thead>
								<tr bgcolor="rgba(0,162,158,0.6)">
									<th>ลำดับ</th>
									<th>ชื่อ</th>
									<th>นามสกุล</th>
									<th>ตัวดำเนินการ</th>
								</tr>
							</thead>
							<tbody> 
								<?php
								$Get_Aut= "select * from author_ ";		
								$result = $conn->query($Get_Aut);
								if ($result->num_rows > 0) {
									$i=0;
									while($row = $result->fetch_assoc()) {
									$i++ ?>
										<tr>
											<td><?php echo $i ?></td>
											<td><?php echo $row["Aut_name"] ?></td>
											<td><?php echo $row["Aut_surname"] ?></td>
											<td align="center">
												<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify"
												data-name="<?php echo $row["Aut_name"] ?>"
												data-surname="<?php echo $row["Aut_surname"]?>"
												data-id="<?php echo $row["Aut_id"]?>"
												>
													<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
												</button>
												<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete"
												data-id="<?php echo $row["Aut_id"]?>">
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
			<!-- END TABLE -->	
	</body>
</html>