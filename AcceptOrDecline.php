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
    $del=$_GET["delId"];
    $pro=$_GET["proId"];
    $sender=$_GET["sender_id"];
     if (isset($_POST['Accept'])) {

        $sql = "Delete from request where request_id='".$del."'";
            $result = $conn->query($sql);
        $sql = "Update project set no_of_people=no_of_people+1 where Project_id='".$pro."'";
            $result = $conn->query($sql);
            $sqlS = "SELECT name FROM user where user_id='".$sender."'";
         $resultS = $conn->query($sqlS);
         $rowS=mysqli_fetch_assoc($resultS);
        $sqlCheck = "SELECT * FROM Working_Members where project_id='".$pro."'";
         $resultCheck = $conn->query($sqlCheck);
         $rowCheck=mysqli_fetch_assoc($resultCheck);
         if(!($rowCheck["member1"]))
         {
             $sql = "Update Working_Members set member1='".$rowS["name"]."' where Project_id='".$pro."'";
            $result = $conn->query($sql);

         }
         else if(!($rowCheck["member2"]))
         {
             $sql = "Update Working_Members set member2='".$rowS["name"]."' where Project_id='".$pro."'";
            $result = $conn->query($sql);

         }
         else if(!($rowCheck["member3"]))
         {
             $sql = "Update Working_Members set member3='".$rowS["name"]."' where Project_id='".$pro."'";
            $result = $conn->query($sql);

         }
         else if(!($rowCheck["member4"]))
         {
             $sql = "Update Working_Members set member4='".$rowS["name"]."' where Project_id='".$pro."'";
            $result = $conn->query($sql);

         }
         else
         {
            echo "No of members exceeded";
         }

         
        

    }
    elseif (isset($_POST['Decline'])) {
        $sql = "Delete from request where request_id='".$del."'";
            $result = $conn->query($sql);
       
    }
    redirect('http://localhost/ProjectHub-Master/requests.php');

?>