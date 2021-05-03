<html lang="en">
	<style>
		table{
		border: thick double #999;
		border-collapse: collapse;
		box-shadow: 12px 12px 2px 1px #999;
	}
	#header{
		border: solid #999;
		font-family: Arial;
		font-size: 32px;
		font-weight: bold;
		font-style: italic;
	}
	th,td{
		border: dashed #999;
		width:100px;
		text-align:center;
		font-family: Copperplate Gothic Bold;
		font-size:15px;
	}
	p{

	}
	</style>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Item Details</title>
</head>
<body>
	<table>
		<tr>
			<th colspan='5'>Product Details</th>
		</tr>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Unit Price</th>
			<th>Net Gross</th>
			<th>Stock</th>
		</tr>
		<?php
			$link = mysqli_connect('localhost','potiro','pcXZb(kL','poti');
				if(!$link){
				die;
					echo "Error: Unable to connect to MySQL";
				}

			$id = $_GET['pid'];
				if(!$id){
					die;
					echo "No Such Item";
				}
			echo $id;
			$query_string = "select * from products where product_id = $id;";
			$result = mysqli_query($link,$query_string);
			$rows = mysqli_num_rows($result);
			if($rows > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>".$row['product_id']."</td>";
					echo "<td>".$row['product_name']."</td>";
					echo "<td>".$row['unit_price']."</td>";
					echo "<td>".$row['unit_quantity']."</td>";
					echo "<td>".$row['in_stock']."</td>";
					echo "</tr>";
					$i_id = $row['product_id'];
					$i_name = $row['product_name'];
					$i_price = $row['unit_price'];
					$i_specs = $row['unit_quantity'];
				}
			}
		mysqli_close($link);
		?>
	</table>
	<p>---------------------------------------------------------------------------</p>
	<form name="quantity" id="qty" action="cart.php" method="POST" target="shcart">
		<label for="quantity">Quantity(1 - 50):</label>
		<input type="number" id="a" name="i_q" min="1" max="50">
		<input type="hidden" name="i_id" value="<?php echo $i_id;?>"/>
		<input type="hidden" name="i_name" value="<?php echo $i_name;?>"/>
		<input type="hidden" name="i_price" value="<?php echo $i_price;?>"/>
		<input type="hidden" name="i_specs" value="<?php echo $i_specs;?>"/>
		<input type="submit" id="spqty" value="Add to Cart">
	</form>
</body>
</html>