<?php 

session_start();
	$connection = mysqli_connect('localhost','root','','reg');

	if(isset($_POST['username']))
	{
		$uname = $_POST['username'];
		$password = $_POST['NIC'];

		$stmt = $connection->prepare("SELECT * FROM student WHERE Email =? AND NIC =?");

		$stmt->bind_param('ss',$uname,$password);
		$stmt->execute();
		$result= $stmt->get_result();
		$user=$result->fetch_object();
		$_SESSION['NIC']=$user->NIC;

		if(mysqli_num_rows($result)==1)
		{
			echo "<script>window.location.href='timetable.html';</script>";
			exit();
		}
		else
		{
			echo "<script>window.location.href='log.html';</script>";
		}
	}

 ?>