
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
		die("Connection failed:abcd".$conn->connect->error);
	}

	$name=$_REQUEST["name"];
	$email=$_REQUEST["email"];
	$usn=$_REQUEST["usn"];
	$pwd=$_REQUEST["password"];
	$sem=$_REQUEST["sem"];
	$branch=$_REQUEST["branch"];


	$sql="INSERT INTO user VALUES('?','".$name."','".$usn."','".$email."','".$pwd."','".$branch."')";
	$result = $conn->query($sql);
	$sql="SELECT `user_id` from user WHERE usn='".$usn."' ";
	$result = $conn->query($sql);
	$row=mysqli_fetch_array($result);
	$_SESSION["unid"]=$row["user_id"];

	/*$sql = "SELECT * FROM logininfo WHERE '$email' = email";
            $result = $conn->query($sql);
            $row=mysqli_fetch_array($result);
            if($row)
            {
                $id=$row['id'];
            }
	$sql="INSERT INTO profile VALUES('".$id."','".$sem."','".$branch."','?','?','?')";
	$result = $conn->query($sql);*/

	redirect('http://localhost/ProjectHub-Master/landing.php?id=1');

	$conn->close();

?>