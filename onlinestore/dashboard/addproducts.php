<?php include("./head.php");
	include("../include/config.php");
?>

<body>

<?php
include("./sidebar.php");
?>

<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>	
<!--End-breadcrumbs-->

<!--Action boxes-->
		<div class="container-fluied">
			<div class="row" style="margin-left:20px; width:600px;">
			
			<div class="col-md-12 p-3 my-3  text-black-50 bg-black">
					
				
					<h1>Add Products</h1>
					<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
					<label >Product Name</label>
					<input class="form-control form-action" type="text" name="name" required />
					<label >Product Price</label>
					<input class="form-control  form-action" type="text"name="product_price" required />
					<label >Product Quantity</label>
					<input class="form-control form-action" type="text"name="product_quantity" required />
					<label>Product Type</label>
					<input class="form-control form-action" type="text"name="product_type" required />
					<label>Product Value</label>
					<input class="form-control form-action" type="text" name="product_value" required/>
					<label>Product Picture</label>
					<input class="form-control form-action" type="file" name="avatar" required/>
					<br>
					
						<input type="submit" value="Save" class="btn btn-warning" align="center"/>
						
					</form>
				
				</div>
			
			
			</div>
	
		</div>
		
    
    <?php
include("./footer.php");
?>

<?php


if(isset($_POST['product_price'])){
	if(isset($_FILES['avatar'])){
			$orignalName=$_FILES['avatar'] ['name'];
			$temporary_name=$_FILES['avatar'] ['tmp_name'];
			move_uploaded_file($temporary_name,'./'.$orignalName);
	extract($_POST);
	$created_at= date_default_timezone_set("Asia/Karachi");
	$created_at=date("Y/m/d h:i:sa");
	

	$q="INSERT INTO products( product_name,product_price, product_quantity,product_type,product_value,created_at,avatar) VALUES ('
	$name','$product_price','$product_quantity','$product_type','$product_value','$created_at','
	$orignalName')";
	$result=$conn->query($q);
	if($result){
		echo "record inserted";

	
	}else{
		echo $conn->error;
	}
		
}
}

?>

</body>
</html>