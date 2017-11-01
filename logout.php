<!DOCTYPE html>
<html>
<body>
hey

<? /* php
	session_start();
	function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
	unset($_SESSION['id']);
	session_destroy();

	redirect("index.html");
	exit;*/


	<?php
   /* session_start();
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    $user='root';
    $pass='';
    $dbname='projecthub';
    $topic = 'abc';
            $conn = new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
            $sql = "SELECT * FROM project where id=1" ;
            $result = $conn->query($sql);
            $row=mysqli_fetch_assoc($result);
            echo $row["id"];
            echo "Happy";*/
           // echo "Happy";
?>


</body>
</html>
