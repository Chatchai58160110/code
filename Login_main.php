<?
include"Db_connect.php";
session_start();
ob_start();

$username = $conn->real_escape_string($_REQUEST['username']);
$password = $conn->real_escape_string($_REQUEST['password']);
$check = 0;
$sqlemp = "SELECT *
			FROM employee_";
$result_emp = $conn->query($sqlemp);
if ($result_emp->num_rows > 0) {
	while($row = $result_emp->fetch_assoc()) {
		if($username === $row['Emp_id'] && $password === $row['Emp_password'] ){
			$Emp_stac_id = $row['Emp_stac_id'];
		}
	}
}	

if($Emp_stac_id === "2"){ //login admin
	echo"เข้าระบบได้สำเร็จ ";
	echo"Admin รึ ! ?";
	//$_SESSION['username']="$username";
	$_SESSION['abc']=$Emp_stac_id;
	echo"<meta http-equiv='refresh' content='1;url=Homepage.php' >";
	//echo"<meta http-equiv='refresh' content='1;url=test_session.php' >";
}
else if($Emp_stac_id === "1"){
	echo"เข้าระบบได้สำเร็จ ";
	echo"เจ้าเป็นแค่ User ?";
	$_SESSION['abc']=$Emp_stac_id;
	echo"<meta http-equiv='refresh' content='1;url=Homepage.php' >";
}
else {
	echo"ไม่สามารถเข้าระบบได้ โปรดตรวจสอบ Login และ  Password ";
	echo"<meta http-equiv='refresh' content='3;url=Login.php' >";
}
	





?>