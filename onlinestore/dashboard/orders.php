<?php include("head.php");
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


		<div class="row" style="margin-left:20px; ">
			<div class="col-md-12">
				<h1>Order List</h1>

	<?php
	
		$query = "SELECT  *  from _order ";
		$result = $conn->query($query);
		if($conn->errno){
			echo $conn->error;
		}
?>
	<table border=1 cellspacing=0 cellpadding=4>
		<tr style="background-color:powderblue">
			<th>SN</th>
			<th>User Id</th>
			<th>User Ip</th>			
			<th>Payment Method</th>
			<th>Status</th>
			<th>DATE</th>
			<th>Total Amount</th>
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
				<td>
				
					<a href="./del.php?del=<?=$row[0];?>" class="btn btn-danger">Delete</a>
				
				</td>
			</tr>
			<?php
			
			
		}
		
		
	?>	
		</table>
			</div>

		</div>
	</div>


  <?php
include("footer.php");
?>
</body>
</html>