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
   // $topic = 'abc';
            $conn = new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
            $sql = "SELECT DISTINCT * FROM request,project where request.user_id='".$_SESSION["unid"]."' and request.project_id=project.Project_id";

            $result = $conn->query($sql);
            // $row=mysqli_fetch_assoc($result);
            //echo $_SESSION["unid"];
            // $sqlS = "SELECT name FROM user where user_id='".$row["sender_id"]."'";
            // $resultS = $conn->query($sqlS);
            // $rowS=mysqli_fetch_assoc($resultS);
            // $sqlR = "SELECT name FROM user where user_id='".$row["reciever_id"]."'";
            // $resultR = $conn->query($sqlR);
            // $rowR=mysqli_fetch_assoc($resultR);
            // $sqlCat = "SELECT category_name FROM category where category_id='".$row["category_id"]."'";
            // $resultCat = $conn->query($sqlCat);
            // $rowCat=mysqli_fetch_assoc($resultCat);
            $index=1;
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 18px;
}
th{
  text-align: center;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
td{
  font-size: 18px;
  text-align: center;
}
</style>
</head>
<body style="background-color: lightblue;">
<div class="row text-center"><h2>Request Page</h2></div>
<div class="row" style="padding: 20px;">
<table >
<div class="col-names">
  <tr>
    <div class ="col-md-1">
    <th>Sl No.</th>
    </div>
    <div class ="col-md-1">
    <th>Project Category</th>
    </div>
    <div class ="col-md-1">
    <th>Project Title</th>
    </div>
    <div class ="col-md-2">
    <th>Sender's Name</th>
    </div>
    <div class ="col-md-2">
    <th>Accept</th>
    </div>
    <div class ="col-md-2">
    <th>Decline</th>
    </div>
  </tr>
</div>
<?php
  while ($row=mysqli_fetch_assoc($result)) {
            $sqlS = "SELECT name FROM user where user_id='".$row["sender_id"]."'";
            $resultS = $conn->query($sqlS);
            $rowS=mysqli_fetch_assoc($resultS);
            $sqlR = "SELECT name FROM user where user_id='".$row["user_id"]."'";
            $resultR = $conn->query($sqlR);
            $rowR=mysqli_fetch_assoc($resultR);
            $sqlCat = "SELECT category_name FROM category where category_id='".$row["category_id"]."'";
            $resultCat = $conn->query($sqlCat);
            $rowCat=mysqli_fetch_assoc($resultCat);

    
  ?>
<div class = "request-values">
<tr>
    <div class ="col-md-1">
    <td><?php echo $index; $index=$index+1;?></td>
    </div>
    <div class ="col-md-1">
    <td><?php echo $rowCat["category_name"]; ?></td>
    </div>
    <div class ="col-md-1">
    <td><?php echo $row["project_title"]; ?></td>
    </div>
    <div class ="col-md-2">
    <td><?php echo $rowS["name"]; ?></td>
    </div>
    <form action="http://localhost/ProjectHub-Master/AcceptOrDecline.php?delId=<?php echo $row["request_id"];?>&proId=<?php echo $row["Project_id"]; ?>&sender_id=<?php echo $row["sender_id"];?>" method="POST">
    <div class ="col-md-2">
    <td><input type="submit" name="Accept" value="Accept"></td>
    </div>
    <div class ="col-md-2">
    <td><input type="submit" name="Decline" value="Decline"></td>
    </div>
    </form>
  </tr>
</div>
<?php
  }
  ?>

  
</table>
</div>
<button style="margin-top:400px;margin-right:1200px;padding: 10px; width: 20%;" class="btn btn-primary"><a href="http://localhost/ProjectHub-Master/landing.php?id=1" style="color: white; font-size: 18px;">Go To Home Page </a></button>

</body>
</html>

