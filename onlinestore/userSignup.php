<?php
	
include('./include/header.php');
include('./include/config.php');

?>
<body>
		<div class="container">
	

			<div class="row   ">
			
				<div class="col-md-6 p-3 my-3 border bg-info text-white">
					
				
					<h1>Signup Form</h1>
					<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
					<label >Name:</label>
					<input class="form-control" type="text"name="name"/>
					<label >Father Name:</label>
					<input class="form-control" type="text"name="fname"/>
					<label >Email:</label>
					<input class="form-control" type="text"name="email"/>
					<label>Password:</label>
					<input class="form-control" type="password"name="pass"/>
					<label>Cell No:</label>
					<input class="form-control" type="text"name="cellno"/>
					<label>Gender:</label><br>
					<label>Male<input checked  type="radio"name="gender" value="male"/></label>
					<label>FeMale<input name="gender" type="radio" value="female"/></label><br>
					
						<input type="submit" value="SignUp" class="btn btn-success" align="center"/>
						<a href="user.php" Login class="btn btn-success" align="center"> Login</a>
					</form>
				
				</div>
				
			
			
			</div>
	
		
		</div>
<?php
			
			$_SESSION['insert']="inserting";

	if(isset($_POST['name'])){
		extract($_POST);
	
		
		$q="INSERT INTO users( Name, FatherName, Email, Password, Cell_No, gender) VALUES ('$name','$fname','$email',SHA1('$pass'),'$cellno','$gender')";
		$result=$conn->query($q);
		if($result){
			echo "record inserted";

			session_unset();
		}else{
			echo $conn->error;
		}
			
	}

?>
	
	
	
	</body>