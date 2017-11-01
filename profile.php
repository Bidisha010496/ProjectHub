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
            $sql = "SELECT * FROM user where user_id='".$_SESSION["unid"]."'";

            $result = $conn->query($sql);
            $row=mysqli_fetch_assoc($result);
?>
<html>
<head>  
<title>Profile Page</title>
  <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <style type="text/css">
   body {
         background-image:url(image1.jpg);
		 background-size:1440px 780px;
		 color:white;
		 }
	h1 {text-align:center;
		  color:#BFF5FE; 
		  background-color:#2299F7;
		  padding-bottom:10px;
		  padding-top:10px;
		  font-weight:bold;
          margin-top:25px;	
		  }
	  h2 {
	      background-color:#74CCDA ;
		  color:#233B5A ;
		  padding: 20px 20px;
		  font-style:italic;
		  display:inline-block;
	     }
	  h3 {
	     margin-top:80px;
	     color:#1132D7  ;
		   }
		   
	.profilepic {
	position: absolute;
	margin-top: 205;
	margin-left:20;
}
		  
    .details {
	position: absolute;
    right: 10px;
	line-height:70px;
	font-weight:bold;
	font-size:30px;
	left:10px;
	top:20px;
	text-align: left;
	}
   </style>
</head>
<body>

<h1> MY PROFILE</h1>
<div class="row">
	<div class="col-md-3">
	  <h3>
		<div class="panel-group">
		    <div class="panel panel-primary">
				<div class="panel-body" ><a href="http://localhost/ProjectHub-master/requests.php">New Requests</a></div>
	    	</div>
        </div>			
		
		<div class="panel-group">
		    <div class="panel panel-primary">
				<div class="panel-body">My interests</div>
	    	</div>
        </div>	
		
		<div class="panel-group">
		    <div class="panel panel-primary">
				<div class="panel-body"><a href="http://localhost/ProjectHub-master/check_project.php">My projects</a></div>
	    	</div>
        </div>	
	  </h3>	
		
	</div>

	<div class="col-md-5">
	  <div class="details">
		<ul>
		<li>I am   :<?php echo $row["name"]; ?> </li>
		<li>USN    :<?php echo $row["usn"]; ?> </li>
		<!-- <li>Phone  :</li> -->
		<li>email  :<?php echo $row["email"]; ?> </li>
		<!-- <li>Address: </li> -->
		</ul>
	  </div>
	</div>

	<div class="col-md-4 ">
		<div class="profilepic">
		<form action="profile-change">
		 <a href="php code to take input">
		  <img src="defimage.png" class="img-circle" alt="defimage.png" height="150" width="150" >
		 </a>
          <p><strong><br>Change Profile picture</strong></p>
          
		</form>
		</div>
	</div>

</div>



</body>
</html>