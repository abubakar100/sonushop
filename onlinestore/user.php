<?php
	
include('./include/header.php');
include('./include/config.php');
session_start();
if(isset($_SESSION['user']))
if($_SESSION['user']!=''){
header("location:./addtocart.php");
}
if(isset($_GET['msg'])){

?>	
	<script>
		alert("<?=$_GET['msg'];?>")</script>
	
	
<?php
}
if(isset($_POST['login']))
{
$uname=$_POST['Email'];
$password=$_POST['Password'];
$password=SHA1($password);
$sql2 ="SELECT id,email,password FROM users WHERE email='{$uname}' AND password='{$password}'";
$query= $conn->query($sql2);
if($query->num_rows > 0)
{
$_SESSION['user']=$uname;
echo $_SESSION['user'];
header("location:./addtocart.php");

} else{

    echo "<script>alert('Invalid Details');</script>";

}

}
																																														
?>
<body class="bg-white">
	
		<div class="container  ">
			<div class="row center text-center pt-6 my-3  " style="margin-left: 30%; margin-top: 50%;">
				
				<div class="col-md-6   p-3 my-3  alert alert-primary text-grey">
					<h1>Login Here</h1>
						<form  class="" method="post" enctype="multipart/form-data"   >
							<label >Email:</label>
							<input class="form-control" type="text"name="Email"/>
							<label>Password:</label>
							<input class="form-control" type="password"name="Password"/>
							<br>
							<div>
								<form class="form-group btn-group">			
									<button type="submit" class="btn btn-info" name="login" >Login</button>
									<a href="userSignup.php" class="btn btn-info">Sign Up</a>
								</form>
							</div>
						</form>
				</div>
			
			</div>	
		</div>
	
</body>	
