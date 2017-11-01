<?php
	session_start();
	function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

	$servername='localhost:8091';
	$user='root';
	$pass='';
	$dbname='projecthub';

	$conn=new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
	//check connection if we can connect to the database or not
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);
	}

	$UniId = $_SESSION["unid"];
	//$id=$_GET["id"];
	$proTitles=$_REQUEST["project-title"];
	$cat=$_REQUEST["project-topic"];
	$des=$_REQUEST["project-description"];
	$run=$_REQUEST["project-status"];
	$date=$_REQUEST["start-date"];
	$sql="INSERT INTO project VALUES('?','".$UniId."','".$proTitles."','".$run."','".$date."','".$cat."','".$des."',1)";
	$result = $conn->query($sql);
	$sql="Select Project_id,name from project,user where project_title='".$proTitles."' and project.user_id=user.user_id";
	$result = $conn->query($sql);
	$row=mysqli_fetch_assoc($result);
	$sql1="INSERT INTO Working_Members(Project_id,owner) VALUES('".$row["Project_id"]."','".$row["name"]."')";
	$result = $conn->query($sql1);
	//echo "abc";
	redirect('http://localhost/ProjectHub-Master/landing.php?id=1');
	$conn->close();
?>