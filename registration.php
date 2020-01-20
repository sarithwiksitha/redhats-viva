<!DOCTYPE html>
<html>

<?php

if(isset($POST['sub']))
{
	$Full_Name= $_POST['Full_Name'];
	$Birthday= $_POST['Birthday'];
	$NIC = $_POST['NIC'];
	$Telephone= $_POST['Telephone'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$Faculty = $_POST['Faculty'];
	$Programme = $_POST['Programme'];

	if(!empty($Full_Name) || !empty($Birthday) || !empty($NIC) || !empty($Telephone) || !empty($Address) || !empty($Email) || !empty($Faculty) || !empty($Programme))
	{
		$servername="localhost";
		$username ="root";
		$password = "";
		$db ="reg";
		//create connection
		$conn =new mysqli($servername,$username,$password,$db);
		if(mysqli_connect_error())
		{
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}
		else
		{
			$SELECT = "SELECT Email from student where Email = ? limit 1";
			$INSERT = "INSERT into student (Full_Name, Birthday, NIC, Telephone, Address, Email, Faculty, Programme) values(?, ?, ?, ?, ?, ?, ?, ?)";

			//Prepare Statement
			 $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($Email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            if ($rnum==0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                stmt->bind_param("ssssssss", $Full_Name, $Birthday, $NIC, $Telephone, $Address, $Email, $Faculty, $Programme);
                $stmt->execute();
                echo "<script>window.alert('Successfully Logged In');</script>";
		}
		else
		{
			echo "<script>window.alert('Someone alredy register using this email');</script>";
		}
			$stmt->close();
            $conn->close();

	}
	else
	{
		echo "<script>window.alert('All field are required');</script>";
		die();
	}
}

 ?>




<head>

<style type="text/css">
	
body
{
	background-color: powderblue;
}

h1
{
	color: blue;
	text-align: center;
}

</style>

	
</head>

<body>

<h1>ENQUIRY FORM</h1>

<h4>
	Did you want to apply SLIT?<br>
	Please fill out the form below. We will get back to you with relevant course information, as well as how you can apply to the programme and faculty of your choice.
</h4>
<center>
<form action="#" method="POST">
  Full_Name:<br>
  <input type="text" name="Full_Name">
  <br><br>
  Birthday:<br>
  <input type="text" name="Birthday">
  <br><br>
  NIC:<br>
  <input type="text" name="NIC">
  <br><br>
  Telephone:<br>
  <input type="text" name="Telephone">
  <br><br>
  Address:
  <br>
  <textarea name="Address" rows="10" cols="30">
  </textarea>
  <br><br>
  Email:<br>
  <input type="text" name="Email">
<br><br>
  Faculty:<br>
  <select name="Faculty">
  <option value="com">Faculty of Computing</option>
  <option value="bis">Faculty of Business</option>
  <option value="eng">Faculty of Engineering</option>
</select>
<br><br>
  Programme:<br>
  <select name="Programme">
  <option value="c1">Bsc Business Information System in UGC</option>
  <option value="c2">Bsc(Hons) Computer Networks in UGC</option>
  <option value="c3">Bsc(Hons) Software Engineering in UGC</option>
  <option value="c4">Bsc(Hons) Computer Networks in Monash university</option>
  <option value="c5">Bsc(Hons) Software Engineering in Monash university</option>
  <option value="c6">Bsc(Hons) Cyber Security in Monash university</option>
  <option value="c7">Bachelor of Information Technology in Princeton university</option>
  <option value="b1">Bsc(Hons) Logistics & Transport in UGC</option>
  <option value="b2">BMgt.(Hons) Supply Chain Management in UGC</option>
  <option value="b3">BMgt.(Hons) Tourism and Hospitality Management in UGC</option>
  <option value="b4">Bsc(Hons) Business Managment in UGC</option>
  <option value="b5">Bsc(Hons) Business Managment in Monash university</option>
  <option value="b6">Bsc(Hons) Accounting and finance in Monash university</option>
  <option value="e1">Bsc(Hons) Electronic and Telecommunication Engineering in UGC</option>
  <option value="e2">Bsc(Hons) Electronic Engineering in UGC</option>
  <option value="e3">Bsc(Hons) Mechanical Engineering in UGC</option>
</select>
<br><br>
  <input type="checkbox" name="robot" value="robot">I'm not a robot
  <br><br>
  <input type="submit" value="Submit" name="sub">
  <input type="reset" value="Reset">
</form> 
</center>
</body>
</html>