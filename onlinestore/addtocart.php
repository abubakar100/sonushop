<?php
include("./include/config.php");
session_start();
if(!isset($_SESSION['user'])){
echo "<script> window.location='user.php' </script>";
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Add to Cart</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="index.php" class="navbar-brand">
		<h3 class="px-5">
			<i class="fa fa-shopping-basket"></i>Shopping Cart
		</h3>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
		aria-controls="navbarNavAltMarkup" aria-expended="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="mr-auto"></div>
				<div class="navbar-nav">
					<a href="addtocart.php" class="nav-item nav-link active">
						<h5 class="px-5 cart">
							<i class="fa fa-shopping-cart"></i> Cart 
							<?php
							
								if(isset($_SESSION['cart'])){
									$count=count($_SESSION['cart']);
									echo "<span id=\"cart_count\" class=\"text-warning bg-light\"> $count </span>";
								}
								else{
									echo" <span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";	
								}	

							?>
						</h5>
					</a>
				</div>
			</div>
	</nav>
</head>
<body> 

	<?php
		if(isset($_REQUEST['id'])){
			$Id=$_REQUEST['id'];
			$Action=$_REQUEST['action'];
		
		Switch($Action){
			case "add":
			if(isset($_SESSION['cart'][$Id])){
				$_SESSION['cart'][$Id]++;
			}
			else{
				$_SESSION['cart'][$Id]=1;
			}
			break;
			case "remove":
			$_SESSION['cart'][$Id] --;
			if($_SESSION['cart'][$Id]==0){
				unset($_SESSION['cart'][$Id]);
			}
			break;

			case "clear":
			unset($_SESSION['cart']);
			
		
	}
	?>

	<div class="container">
				
	<table class=" table table-bordered">
		<thead>
		<tr>
			<th>S.No</th>
			<th>Image</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Sub Total</th>
			<th>Action</th>
		</tr>
	</thead>
		<?php
			foreach ($_SESSION['cart'] as $Id=> $value) {
				$i=1;
				$GrandTotal=0;
				$query="SELECT * FROM products WHERE id=$Id ";
				$sql=mysqli_query($conn,$query);
				$row=mysqli_fetch_assoc($sql);
				$GrandTotal+=$row['product_price']*$value;
		?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td> <div class="card-body"><img src="<?php echo $row['avatar']; ?>" width="100px" class="img-fluid  alert alert-primary " alt="Cinque Terre"> </div></td>
			<td>&#8377; <?php echo $row['product_price'];?></td>
			<td><?php echo $value;  ?></td>
			<td> &#8377;<?php echo $row['product_price']*$value;?></td>
			<td>
				<a href="addtocart.php? id=<?php echo $row['id']; ?> &action=add" class="btn btn-primary">Incremen</a>
				<a href="addtocart.php? id=<?php echo $row['id']; ?> &action=remove" class="btn btn-danger">Decrement</a>
			</td>
		</tr>	

		<?php
			}
		?>

		</tr>
			<th colspan="2"><a href="index.php">Continue Shoping </a></th>
			<th colspan="2"><a href="addtocart.php? action=clear"> Clear Cart</a></th>
			<th>Grand Total :<?php  echo $GrandTotal; ?></th>
			<th> <a href="orderconfirmation.php"> Check Out </a></th>
		</tr>

		</table>

		<?php

		}
	?>
</div>

</body>
</html>