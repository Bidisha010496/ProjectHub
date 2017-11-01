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
	// check connection if we can connect to the database or not
	if($conn->connect_error)
	{
		die("Connection failed:abcd".$conn->connect->error);
	}
	$sql="START TRANSACTION;
 INSERT INTO `category`(`category_id`, `category_name`, `details`) VALUES ('','abc','sdgssdcg');
 INSERT INTO user VALUES('','kuheli1','ni14cs0681','k@gmail.com1','jk1','is1');
 commit;";
   $result= $conn->query($sql);
   echo "Done";
   ?>