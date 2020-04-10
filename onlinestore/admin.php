<?php
	
include('./include/header.php');
include('./include/config.php');
session_start();
if(isset($_SESSION['alogin']))
if($_SESSION['alogin']!=''){
header("location:./dashboard");
}
if(isset($_GET['msg'])){
?>
	<script>
		alert("<?=$_GET['msg'];?>");
	</script>
	
<?php
}
if(isset($_POST['login']))
{
$uname=$_POST['Email'];
$password=$_POST['Password'];
//$password=SHA1($password);
$sql2 ="SELECT email,password FROM admin WHERE email='{$uname}' AND password='{$password}'";
$query= $conn->query($sql2);
if($query->num_rows > 0)
{
$_SESSION['alogin']=$uname;
echo $_SESSION['alogin'];
header("location:./dashboard");

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
											
								<button type="submit" class="btn btn-info" name="login" >Login</button>
								
							</div>
						</form>
				</div>
			
			</div>	
		</div>
	
</body>	
