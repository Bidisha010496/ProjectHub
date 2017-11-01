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
            $sql = "SELECT * FROM project" ;
            $result = $conn->query($sql);
            $row=mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html  lang="en">
<head>
	<title>ProjectHub | Welcome</title>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
<div class="header1">
	<div class="row">
		<div class="col-md-1" style="font-size: 25px;">ProjectHub</div>
		<div class="col-md-1"><a href="http://localhost/ProjectHub-master/profile.php"><button style="color: white">My Profile</button></a></div>
		<div class="col-md-7"></div>
		<div class="col-md-2"><button id="add-project-click">Add Project</button></div>
		<div class="col-md-1"><a href="http://localhost/ProjectHub-master/index.php?id=0"><button style="color: white">Logout</button></a></div>

	</div>
</div>
<div class="row">
	<div class="col-md-2" id="sidebar">
		<div id="interest">
			<div class="row" id="cat" ><a href="http://localhost/ProjectHub-master/landing.php?id=1">Web designing</a></div>
			<div class="row" id="cat" ><a href="http://localhost/ProjectHub-master/landing.php?id=2">Cloud Computing</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=3">Big Data</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=4">Machine learning</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=5">Android</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=6">iOS Development</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=7">Matlab</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=8">Image Processing</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=9">Cryptography</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=10">Technical Papers</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=11">Aptitude</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=12">Java</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=13">C++</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=14">C</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=15">Python</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=16">PHP</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=17">JavaScript</a></div>
			<div class="row" id="cat"><a href="http://localhost/ProjectHub-master/landing.php?id=18">IOT</a></div>
		</div>
	</div>
	<div class="col-md-5" id="posts">
		<?php
		$txt=$_GET["id"];
		$sql1 = "SELECT * FROM category where category_id='".$txt."'" ;
        $result1 = $conn->query($sql1);
        $row1=mysqli_fetch_assoc($result1)
        ?>
		    <div id="post1">
		        <div class="row">
					<div class="col-md-9 protitle" id="pro-title">Category Title:<?php echo $row1["category_name"];?></div><br><hr>
						<div class="row description" id="pro-desc">
							 Description in 180 words. I think this much description will be enough to get an idea about the project. If you need then we can increase the length but the div height will increase. 
						</div>
				</div>
			</div>        
	       		  <?php
					$sql= "SELECT * FROM project where category_id='".$txt."'" ;
        			$result = $conn->query($sql);
      				//  $row=mysqli_fetch_row($result);
					$index = 0;
					while($row=mysqli_fetch_assoc($result))	
					{
						$index = $index + 1;
				  ?>
	
	<div id="post1" >	
		<div class="row">
			<div class="col-md-9 protitle" id="pro-title">Project Title:<?php echo $row["project_title"];?></div>
			<div class="col-md-1" id="pro-status">Status:<?php echo $row["status"];?></div>
		</div><hr>
		<div class="row description" id="pro-desc">
			 <?php echo $row["description"];?>
		</div><br><hr>
			<!-- <button type="button" data-toggle="modal" data-target="#myModal" name="button">Request Joining</button><br><br> -->
			<div class="col-md-8">
			Developer's Count:<?php echo $row["no_of_people"];?><br>
			</div>
			<div class="col-md-4">
			<form action="http://localhost/ProjectHub-master/sendRequest.php" method="GET">
			<input type="hidden" name="ReqId" value=<?php echo $row["user_id"] ?> >
			<input type="hidden" name="ProjId" value=<?php echo $row["Project_id"] ?> >
			<button type=submit id="Rbutton">Request To Join</button>
			</form>
			</div>

			<br><br>
	 		    
	</div>
				<?php	
				}
				?>
				<!-- <div class="modal fade" id="myModal" role="dialog">
	  	     		<div class="modal-dialog">
	      				<div class="modal-content">
	        				<div class="modal-header">
	          					<button type="button" class="close" data-dismiss="modal">&times;</button>
	          					<h4 class="modal-title">Are you sure?</h4>
	        				</div>
	        				<div class="modal-body">
	          					<p>We are sending a request to the owner of the project.</p>
	        				</div>
	        				<div class="modal-footer">
	        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        				<form action="http://localhost/ProjectHub-master/sendRequest.php" > <button type="submit" id="req-update">OK </button></form>
	        				</div>
	      				</div>
	      			</div>
				</div> 
	 -->
	</div>
	<!-- </div>	 -->
	<div class="col-md-5" id="full_details">
		<div id="add-project">
			<center><h2>Wow! Tell Us About Your Project</h2></center><br>
			<form action="http://localhost/ProjectHub-master/createPost.php" method="POST">
				<input type="text" name="project-title" placeholder="Project Title" ><br><Br>
				<input type="date" name="start-date" placeholder="When did you start?" ><br><Br>
				<!-- <input type="text" name="project-topic" placeholder="Project Topic" required><br><Br> -->
				<select name="project-topic">
    				<option value=1>Web designing</option>
    				<option value=2>Cloud Computing</option>
    				<option value=3>Big Data</option>
    				<option value=4>Machine Learning</option>
    				<option value=5>Android</option>
    				<option value=6>IOS Development</option>
    				<option value=7>Matlab</option>
    				<option value=8>Image Processing</option>
    				<option value=9>Cryptography</option>
    				<option value=10>Technical Papers</option>
    				<option value=11>Aptitude</option>
    				<option value=12>Java</option>
    				<option value=13>C++</option>
    				<option value=14>C</option>
    				<option value=15>Python</option>
    				<option value=16>PHP</option>
    				<option value=17>Javascript</option>
    				<option value=18>IOT</option>
  				</select><br><Br>

				<textarea name="project-description" placeholder="Project Description" class="inputclass3"></textarea><br><Br>
				<div class="row">
					<div class="col-md-6">
						<input type="radio" name="project-status" value="running" class="radio-button"><span class="radio-field">Running</span> 
					</div>
					<div class="col-md-6">
						<input type="radio" name="project-status" value="done" class="radio-button"><span class="radio-field">Done</span><br><Br>
					</div>
				</div>
				<input type="submit" value="Inspire The World With This Project">

			</form>
			<!-- <div class="modal fade" id="myModal" role="dialog">
	  	     		<div class="modal-dialog">
	      				<div class="modal-content">
	        				<div class="modal-header">
	          					<button type="button" class="close" data-dismiss="modal">&times;</button>
	          					<h4 class="modal-title">Confirmation Box</h4>
	        				</div>
	        				<div class="modal-body">
	          					<p>Successful</p>
	        				</div>
	        				<div class="modal-footer">
	        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        				<form action="http://localhost/ProjectHub-master/sendRequest.php" > <button type="submit" id="req-update">OK </button></form>
	        				</div>
	      				</div>
	      			</div>
				</div>  -->
	
		</div>
		<div id="project-full-descp">
			<div class="row">
				<div class="col-md-10 protitle" id="full-pro-title">Project Title:<?php echo $row1["category_name"];?></div>
				<div class="col-md-1" id="full-pro-status">Status:Running</div>
			</div><hr>
			<div class="row description" id="full-pro-desc">Full Description here</div><hr>
			 <?php echo $row1["details"];?>
		</div>

  </div>
</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#add-project-click").click(function(){
        $("#add-project").toggle(1000);
        $("#project-full-descp").toggle(1000);

    });
    $("#post1").click(function(){
    	$("#add-project").toggle(1000);
        $("#project-full-descp").toggle(1000);
       // document.getElementById('full-pro-title').innerHTML = document.getElementById('pro-title').innerHTML;
        // document.getElementById('full-pro-status').innerHTML = document.getElementById('pro-status').innerHTML;
        // document.getElementById('full-pro-desc').innerHTML = document.getElementById('pro-desc').innerHTML;
    });

});

</script>
</html>