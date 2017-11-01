<?php
    session_start();
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }


    $user='root';
    $pass='';
    $dbname='projecthub';
    $conn = new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
    $to_id=$_GET["ReqId"];
    $from_id=$_SESSION["unid"];
    $proj_id=$_GET["ProjId"];
    $sql = "Insert into `request` VALUE('?','".$from_id."','".$to_id."','".$proj_id."')";
    $result = $conn->query($sql);
    redirect('http://localhost/ProjectHub-Master/landing.php?id=1&req=1');
?>    