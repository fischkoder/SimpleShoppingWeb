<?php
	session_start();

	$cart = $_SESSION['cart'];
	$pid = $_REQUEST['i_id'];
	$p_name = $_REQUEST['i_name'];
	$p_price = $_REQUEST['i_price'];
	$p_specs = $_REQUEST['i_specs'];
	$p_qty = $_REQUEST['i_q'];



	if(!empty($p_qty)){
		if(empty($cart)){
			$cart[$pid] = array("id" => $pid, "name" => $p_name, "price" => $p_price, "specs" =>$p_specs, "qty" => $p_qty);
			$_SESSION['cart'] = $cart;
		}elseif(!array_key_exists($pid,$cart)){
			$cart[$pid] = array("id" => $pid, "name" => $p_name, "price" => $p_price, "specs" =>$p_specs, "qty" => $p_qty);
			$_SESSION['cart'] = $cart;
		}elseif(!empty($p_qty)){
			$cart[$pid]['qty'] = $cart[$pid]['qty'] + $p_qty;
			$_SESSION['cart'] = $cart;
		}
	}
?>

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

	.button{
		vertical-align: bottom;
		padding:10px 15px; 
		background:#6B6FFF; 
		border:0 none;
		border-radius: 8px; 
		font-family: Arial Black;
		color: white;
	}

	#indicator{
		color:#FF7450;
		font-weight: Bold;
		font-family: Times New Roman;
		font-size: 32px;
		text-align:center;
	}
	button{
		vertical-align: bottom;
		padding:5px 15px; 
		background:#6B6FFF; 
		border:0 none;
		border-radius: 8px; 
		font-family: Arial Black;
	}

	a{
		color:white;
		text-decoration: none;
	}

</style>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Cart</title>
</head>
<body>
	<table>
		<tr>
			<th id="header" colspan="6">Shopping Cart</th>
		</tr>
		<?php
		if(empty($cart)){
			if(empty($p_qty)){
				echo "<th id='indicator' colspan='6'>No item has put into shopping cart</th>";
			}
		}
		?>
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th>Specs</th>
			<th>Quantity</th>
			<th>Sub Total</th>
			<th>Delete Item</th>
		</tr>
		
		<?php
			$total = 0;
			if(isset($cart)){
				foreach ($cart as $i){
					echo "<tr>";
					echo "<td>".$i['name']."</td>";
					echo "<td>"."A$".$i['price']."</td>";
					echo "<td>".$i['specs']."</td>";
					echo "<td>".$i['qty']."</td>";
					echo "<td>"."A$".($i['price'] * $i['qty'])."</td>";
					echo "<td><button><a href='remove.php?id={$i['id']}'>Delete</a></button></td>";
					echo "</tr>";
					$sum += $i['price'] * $i['qty'];
				}
			}
		?>
		
		<tr>
			<td>Total</td>
			<td colspan="3">A$<?php echo "$sum";?></td>
			<td><form action="remove.php"><input class="button"  type="submit" value="Clear All"></form></td>
			<td><form action="submission.php" target="details"><input class="button" type="submit" value="Check Out"></form></td>
		</tr>
	</table>
</body>
</html>