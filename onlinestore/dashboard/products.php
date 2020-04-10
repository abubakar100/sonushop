<?php 
	include("head.php");
	include("../include/config.php");
?>
<body>

<?php
include("sidebar.php");
?>

<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
	<div class="container-fluied">
		<div class="row" style="margin-left: 10px;">
			<div class="col-md-12">
				<h1> All Products </h1>
				<?php
				if(isset($_GET['page']));
				$page
				
				?>
<?php
$query="SELECT*FROM products";
	$result = $conn->query($query);
?>
	<table  class="table" border=1 cellspacing=2 cellpadding=4>
		<tr>
			<th>SN.</th>
			<th>Product Name</th>
			<th>Product Price</th>			
			<th>Product Quantity</th>
			<th>Product Type</th>
			<th>Product Value</th>
			<th>Created At</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
<?php		$sn=0;
		while($row = $result->fetch_array())
		{
			$sn = $sn+1;
				?>
			<tr>
				<td><?=$sn;?></td>
				<td><?=$row[1];?></td>
				<td><?=$row[2];?></td>							
				<td><?=$row[3];?></td>
				<td><?=$row[4];?></td>
				<td><?=$row[5];?></td>
				<td><?=$row[6];?></td>
				<td><img src="./<?=$row[7];?>" width="50px;"/></td>
				<td>
					<a href="./edit.php?edit=<?=$row[0];?>" class="btn btn-info">Edit</a>
					<a href="./delete.php?del=<?=$row[0];?>" class="btn btn-danger">Delete</a>
				
				</td>
			</tr>
		
			<?php
			
			
		}
		
		
	?>
		</table>
				<center>
				<div class="pages">
					
					<a href="?page1" class="btn btn-info">page1</a>
					<a href="?page2" class="btn btn-info">page2</a>
					<a href="?page3" class="btn btn-info">page3</a>
					<a href="?page4" class="btn btn-info">page4</a>
				
				</div>
				</center>
			</div>
		</div>
	</div>





</body>
</html>