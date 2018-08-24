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
		<title>Add_audio </title>
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
				var id = $(this).data('id');
				var name = $(this).data('name');
				var reference = $(this).data('reference');
				var amount = $(this).data('amount');
				var language = $(this).data('language');
				var price = $(this).data('price');
				var cat_id = $(this).data('cat_id');
				
				$(".modal-body #aud_id").val( id );
				$(".modal-body #aud_name").val( name );
				$(".modal-body #aud_reference").val( reference );
				$(".modal-body #aud_amount").val( amount );
				$(".modal-body #aud_language").val( language );
				$(".modal-body #aud_price").val( price );
				$(".modal-body #cat_id").val( cat_id );
			  
			});
			
			$(document).on("click", ".btn-danger", function () 
			{
				var id = $(this).data('id');
				
				$(".modal-body #del").val( id );
			});	
			
		</script>
		
		<style>
			body {
			background-color: rgba(0, 162, 158, .4);
			}
			h2{
				font-size: 20px;
				color: white;
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
		</style>
		
	</head>
	
	<body>	
			
			<div class="col-xs-12" style="padding-top: 15px; padding-bottom: 0px;" >
				<div class="panel panel-default" style="margin-right:20px;">
					<div class="panel-heading" style="background-color:#00a29e">
						<h2 style="margin-top:5px; margin-bottom:5px;">เพิ่มรายการโสตทัศนวัสดุ</h2>
					</div>
					
					<div class="panel-body">
					<form method="post" action="Add_audio.php">	
						<div class="tab-content">
							<div class="" id="dowizard">
								<div class="row" style="padding:10px">
										<label class="col-sm-2 control-label" style="margin-left:40px;">ชื่อโสตทัศนวัสดุ</label>
										<div class="col-sm-3"><input name="Aud_name" id="Aud_name" class="form-control" required="" type="text" placeholder="กรอกชื่อโสตทัศนวัสดุ" data-parsley-minlength="6"></input></div>
										<label class="col-sm-2 control-label" style="margin-left: 0px;">อ้างอิง</label>
										<div class="col-sm-3"><input name="Aud_Reference" id="Aud_Reference"  class="form-control" required="" type="text" placeholder="กรอกหนังสืออ้างอิง" data-parsley-minlength="6"></input></div>
								</div>
								<div class="row" style="padding:10px">
										<label class="col-sm-2 control-label" style="margin-left:40px;">จำนวนแผ่น</label>
										<div class="col-sm-3"><input name="Aud_amount" id="Aud_amount" class="form-control" required="" type="text" placeholder="กรอกจำนวน" data-parsley-minlength="6"></input></div>
										<label class="col-sm-2 control-label" style="margin-left: 0px;">ภาษา</label>
										<div class="col-sm-3"><input name="Aud_language" id="Aud_language" class="form-control" required="" type="text" placeholder="กรอกภาษา" data-parsley-minlength="6"></input></div>
								</div>
								<div class="row" style="padding:10px">
										<label class="col-sm-2 control-label" style="margin-left:40px;">หมวดหมู่</label>
										<div class="col-sm-3">
											<select class="form-control" id="Aud_Cat_id" name="Aud_Cat_id">
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
										<label class="col-sm-2 control-label" style="margin-left: 0px;">ราคา</label>
										<div class="col-sm-3"><input name="Aud_price" id="Aud_price" class="form-control" required="" type="text" placeholder="กรอกภาษา" data-parsley-minlength="6"></input></div>
								</div>
								<div class="row">
									<div style="float: left;"><button class="btn btn-default" style="margin-left: 25px;" type="button">เคลียร์</button></div>
									<div style="float: right;"><button class="btn btn-success" name="save" style="margin-right: 25px;" type="submit">ยืนยัน</button></div>
								</div>
							</div>	
						</div>
						</form>
					</div>
				</div>
			</div>
<!-- INSERT AUDIOVISUAL -->
			<?php 
				if(isset($_REQUEST['save'])){
					
					$Aud_name = $conn->real_escape_string($_REQUEST['Aud_name']);
					$Aud_Reference = $conn->real_escape_string($_REQUEST['Aud_Reference']);
					$Aud_amount = $conn->real_escape_string($_REQUEST['Aud_amount']);
					$Aud_language = $conn->real_escape_string($_REQUEST['Aud_language']);
					$Aud_Cat_id = $conn->real_escape_string($_REQUEST['Aud_Cat_id']);
					$Aud_price = $conn->real_escape_string($_REQUEST['Aud_price']);
					
					$Call_number = "test";
					$Call_Cnt_id = 1;
					$sql_call_ins = "insert into call_number (Call_number,Call_Cnt_id) values ('$Call_number','$Call_Cnt_id')";
					$insert_call =$conn->query($sql_call_ins);
					
					$sql_call_sel ="SELECT *FROM call_number";
					$result = $conn->query($sql_call_sel);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							if($row['Call_number'] === $Call_number){
								$Aud_Call_id = $row['Call_id'];
								$sql = 	"insert into audiovisual_ (Aud_name,Aud_Reference,Aud_amount,Aud_language,Aud_Cat_id,Aud_price,Aud_Call_id ) 
										values ('$Aud_name','$Aud_Reference','$Aud_amount','$Aud_language'
										,'$Aud_Cat_id','$Aud_price','$Aud_Call_id')";
								$insert_audiovisual =$conn->query($sql);
							}
						}
					}
					
					$sql_audio_sel = "SELECT Aud_id,Call_number,Aud_name,Call_id,Aud_Call_id 
									FROM audiovisual_
									JOIN call_number on audiovisual_.Aud_Call_id = call_number.Call_id";	
					$result_audio = $conn->query($sql_audio_sel);	
					if ($result_audio->num_rows > 0) {
						while($row = $result_audio->fetch_assoc()) {
							if($row['Call_number'] === $Call_number){
								$Aud_id = $row['Aud_id'];
								$Call_id = $row['Call_id'];
								$Call_number =  $Aud_Cat_id ."."."cd". $Aud_id ;
								//Update
								$sql_update = "Update call_number Set Call_number = '$Call_number' where Call_id = '$Call_id' ";
								$insert_update =$conn->query($sql_update);
							}
						}
					}
				}
			?>
<!-- END PANEL INSERT-->
		
<!-- Modal modify -->
			<div class="modal fade" id="Modal_modify" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content Modify-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title">แก้ไขข้อมูล</h2>
						</div>
						<form method="post" action="">
						<div class="modal-body">
							<div class="row" style="padding:10px">
								<input name="aud_id" id="aud_id" style="display:none;" class="form-control" required="" type="text"  data-parsley-minlength="6"> <!-- !!!!!! -->
								<label class="col-sm-2 control-label" style="margin-left:40px;">ชื่อโสตทัศนวัสดุ</label>
								<div class="col-sm-3"><input name="aud_name" id="aud_name" class="form-control" required="" type="text" placeholder="กรอกชื่อโสตทัศนวัสดุ" data-parsley-minlength="6"></input></div>
								<label class="col-sm-2 control-label" style="margin-left: 0px;">อ้างอิง</label>
								<div class="col-sm-3"><input name="aud_reference" id="aud_reference"  class="form-control" required="" type="text" placeholder="กรอกหนังสืออ้างอิง" data-parsley-minlength="6"></input></div>
							</div>
							<div class="row" style="padding:10px">
								<label class="col-sm-2 control-label" style="margin-left:40px;">จำนวนแผ่น</label>
								<div class="col-sm-3"><input name="aud_amount" id="aud_amount" class="form-control" required="" type="text" placeholder="กรอกจำนวน" data-parsley-minlength="6"></input></div>
								<label class="col-sm-2 control-label" style="margin-left: 0px;">ภาษา</label>
								<div class="col-sm-3"><input name="aud_language" id="aud_language" class="form-control" required="" type="text" placeholder="กรอกภาษา" data-parsley-minlength="6"></input></div>
							</div>
							<div class="row" style="padding:10px">
										<label class="col-sm-2 control-label" style="margin-left:40px;">หมวดหมู่</label>
										<div class="col-sm-3">
											<select class="form-control" id="cat_id" name="cat_id">
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
										<label class="col-sm-2 control-label" style="margin-left: 0px;">ราคา</label>
										<div class="col-sm-3"><input name="aud_price" id="aud_price" class="form-control" required="" type="text" placeholder="กรอกภาษา" data-parsley-minlength="6"></input></div>
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
						</form>
					</div>
				</div>
			</div>
			
			<?php 
				$Aud_id = $conn->real_escape_string($_REQUEST['aud_id']);
				$Aud_name = $conn->real_escape_string($_REQUEST['aud_name']);
				$Aud_reference = $conn->real_escape_string($_REQUEST['aud_reference']);
				$Aud_amount = $conn->real_escape_string($_REQUEST['aud_amount']);
				$Aud_language = $conn->real_escape_string($_REQUEST['aud_language']);
				$Aud_price = $conn->real_escape_string($_REQUEST['aud_price']);
				$Aud_Cat_id = $conn->real_escape_string($_REQUEST['cat_id']);
				if(isset($_REQUEST['update'])){
					$sql = "update audiovisual_ set Aud_name = '$Aud_name',
							Aud_Reference = '$Aud_reference',
							Aud_Cat_id = '$Aud_Cat_id',
							Aud_amount = '$Aud_amount',
							Aud_language = '$Aud_language',
							Aud_price = '$Aud_price'
							where Aud_id = '$Aud_id'";
					$update_aud = $conn->query($sql);}
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
					<input name="del" id="del" style="display:none" class="form-control" required="" type="text"  data-parsley-minlength="6"> <!-- !!!!!! -->
					<span id="idHolder"></span>	
				</div>
				
				<div class="modal-footer">
					<form action="Add_audio" method="post">				
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
				<!-- delete book db -->
				<?php 
					if(isset($_REQUEST['delete'])){
						$delete = $conn->real_escape_string($_REQUEST['del']);
						
						//DELETE 
						$sql = "DELETE FROM audiovisual_
									WHERE Aud_id = '$delete'";
						$delete_aud =$conn->query($sql);
						
						
					}
				?>
			<!-- end delete book db -->
	</div>
<!-- Modal delete -->

<!--  START TABLE : SHOW AUDIOVISUAL -->
			<div class="col-xs-12" style="padding: 0px 15px 15px; pading: 10px;">
				<div class="panel panel-default" style="margin-right:20px;">
					<div class="panel-heading" style="background-color:#00a29e">
						<h2 style="margin-top:5px; margin-bottom:5px;">รายการโสตทัศนวัสดุ</h2>
					</div>
					
					<div class="panel-body" style="margin:20px">
						<table class="table table-striped table-borded" id="example">
							<thead>
								<tr bgcolor="rgba(0,162,158,0.6)">
									<th>ลำดับ</th>
									<th>เลขเรียก</th>
									<th>ชื่อ</th>
									<th>ประเภท</th>
									<th>อ้างอิง</th>
									<th>ตัวดำเนินการ</th>
								</tr>
							</thead>
							<tbody> 
								<?php
								$Get_Aud = "select Aud_Cat_id,Aud_language,Aud_amount,Aud_id,Aud_name,Aud_price,Aud_Reference,Call_number,Cat_name from audiovisual_ 
								left join call_number on audiovisual_.Aud_Call_id = call_number.Call_id
								left join category_ on audiovisual_.Aud_Cat_id = Category_.Cat_id";		
								$result = $conn->query($Get_Aud);
								
								if ($result->num_rows > 0) {
									$i=0;
									while($row = $result->fetch_assoc()) { 
									$i++ ?>
										<tr>
											<td><?php echo $i ?></td>
											<td><?php echo $row["Call_number"] ?></td>
											<td><?php echo $row["Aud_name"] ?></td>
											<td><?php echo $row["Cat_name"] ?></td>
											<td><?php echo $row["Aud_Reference"] ?></td>
											<td align="center">
												<button type="button" title="แก้ไข" class="btn btn-warning btn-ml" data-toggle="modal" data-target="#Modal_modify" 
												data-id="<?php echo $row["Aud_id"] ?>"
												data-name="<?php echo $row["Aud_name"] ?>"
												data-reference="<?php echo $row["Aud_Reference"] ?>"
												data-amount="<?php echo $row["Aud_amount"] ?>"
												data-language="<?php echo $row["Aud_language"] ?>"
												data-price="<?php echo $row["Aud_price"] ?>"
												data-cat_id="<?php echo $row["Aud_Cat_id"] ?>">
													<span class="glyphicon glyphicon-edit"></span><i class="ti ti-close"></i>
												</button>
												
												<button type="button" title="ลบ" class="btn btn-danger btn-ml" data-toggle="modal" data-target="#Modal_delete"
												data-id="<?php echo $row["Aud_id"] ?>">
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