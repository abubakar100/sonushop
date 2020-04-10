<?php
include("./include/config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ordder Confirmation</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
	<h2 class="bg-info text-center">Order Confirmation </h2>
	<div class="container my-3 " style="border-left: 1px solid black; border-right: 1px solid black;border-bottom: 1px solid black;">
		 
		<div class="row">
			<div class="col-md-10"> </div> 
			<div class="col-md-2"> <a href="logout.php"> Logout</a> </div>
		</div>
		<?php
		session_start();
				$i=1;
				$GrandTotal=0;
			foreach($_SESSION['cart'] as $Id=> $value) {
				
				$query="SELECT * FROM products WHERE id=$Id ";
				$sql=mysqli_query($conn,$query);
				$row=mysqli_fetch_assoc($sql);
				$GrandTotal+=$row['product_price']*$value;
		?>
		<div class="row" style="border-bottom: 1px solid black;">
			<div class="col-md-2 no-gutters"><img src="<?php echo $row['avatar']; ?>" width="100px" class="img-fluid  alert alert-primary " alt="Cinque Terre"></div>
			<div class="col-md-3  no-gutters">
				<div><label>Product Name:<?php echo $row['product_name'];?></label></div>
				<div><label>Product Price:&#8377; <?php echo $row['product_price'];?></label></div>
				<div><label>Product Quantity: <?php echo $value;?></label></div>
				<div><label>Sub Total:<?php echo $row['product_price']*$value;?></label></div>
				
			</div>
		</div>
		<?php 
			}
		?>
	<div class="row my-3" style="border-bottom: 1px solid black;">
		<div class="col-md-4   " >
			
		</div>

		<div class="col-md-3 pt-3 text-center  bg-dark text-white " >
			<h5>Grand Total: <?php echo $GrandTotal; ?> </h5>
		</div>
	</div>
		<div class="row">
			<div class="col-md-6">
				<h2>Choose Payment Method</h2>
		
					<form method="POST" action=""> 
						<div class="form-group" required>
							<input type="radio" class="btn btn-info" name="method" value="Paypal"/> Paypal 

							<input type="radio" name="method" class="btn btn-info" value="Cash on Delivery"/> Cash on Delivery
						</div>
						<div class="form-group">
							<input type="submit" name="btn" class="btn btn-warning" value="Proceed to next">
						</div>
					</form>
			</div>
		</div>
	</div>
</div>
	<?php

	
		if(isset($_POST['btn'])){
			$q=mysqli_query($conn,"SELECT id FROM users WHERE Email='{$_SESSION['user']}'");
			$row=mysqli_fetch_array($q);
			$id=$row[0];

			$query="INSERT INTO _order values('','$id','$_SERVER[REMOTE_ADDR]','$_POST[method]','pending',now(),'$GrandTotal')";
			mysqli_query($conn,$query);
			

if (mysqli_query($conn,$query)) {
	echo " proceeding is Successful";
}
}	?>
</body>
</html>