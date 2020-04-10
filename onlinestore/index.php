<?php
include("./include/config.php");

$query=mysqli_query($conn,"SELECT id,product_name,product_price, avatar FROM products ORDER BY id ASC ");
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shoping Books</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body class="bg-white  ">

	<div class="container my-3  " >
		<h1 class="text-danger text-center ">Online Shop Products</h1>

	<nav class="navbar navbar-expand-md navbar-light bg-dark text-white">
    <a href="#" class="navbar-brand">Brand</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between text-white" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link active text-white">Home</a>
            <a href="#" class="nav-item nav-link text-white">Profile</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Messages</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Inbox</a>
                    <a href="#" class="dropdown-item">Sent</a>
                    <a href="#" class="dropdown-item">Drafts</a>
                </div>
            </div>
        </div>
        <form class="form-inline">
            <div class="input-group">                    
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        <div class="navbar-nav">
            <a href="user.php" class="nav-item nav-link text-white"><i class="fa fa-mobile ">  </i> Login</a>
        </div>
    </div>
</nav>
<br>
		<div class="row text-center py-1 " style="margin-left: 1%">
								<?php
				while($row = $query->fetch_array())
		{

			?>

			<div class=" col-md-3 col-sm-6 my-10 my-md-0 shadow-lg p-4 mb-4 bg-white">
				<form>
					<div class="card my-2 bg-info text-white p-2  form-control">
						<h6 class="card-title text-center text-uppercase"> <?php echo $row['product_name'];?> </h6>
					</div>
					<div class="card-body">
						<img src="<?php echo $row['avatar']; ?> " class="img-fluid card-img-top alert alert-primary " alt="Cinque Terre">
						<h6> &#8377; <?php echo $row['product_price'];?> </h6>
						<h6 class="badge badge-success mr-sm-2 "> 4.4     <i class="fa fa-star  ">  </i> </h6>
					</div>
					<div class="btn-group d-flex">
						<a href="addtocart.php? id=<?php echo $row['id']; ?> &action=add " class="btn btn-success flex-fill"  >Add to Cart <i class="fa fa-cart-plus"> </i>  </a>
						<button class="btn btn-warning flex-fill text-white">Buy Now</button>
					</div>
				  
				</form>  

			</div>
			
		<?php
			}
			?>	
		</div>
		

	</div>
</body>
</html>