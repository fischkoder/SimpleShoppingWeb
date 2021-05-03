<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
	<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
	<script>
		$().ready(function() {
			$("#signupForm").validate({
				rules: {
					firstname: "required",
					lastname: "required",
					address: "required",
					postcode: "required",
					suburb:"required",
					email:{
						required: true,
						email:true
					}
				},
				messages: {
					firstname: "Please enter your first name",
					lastname: "Please enter your last name",
					address: "Please enter your address",
					postcode: "Please enter your postcode",
					suburb:"Please enter suburb",
					email:"Please enter a valid email address"
				}
			});
		});
	</script>
	<title>Check Out</title>
</head>
<body>
<table>
		<tr>
			<th colspan="5">Order Details</th>
		</tr>
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th>Specs</th>
			<th>Quantity</th>
			<th>Sub Total</th>
		</tr>
		
		<?php
			session_start();
			$total = 0;
			if(isset($_SESSION['cart'])){
				foreach ($_SESSION['cart'] as $i){
					echo "<tr>";
					echo "<td>".$i['name']."</td>";
					echo "<td>".$i['price']."</td>";
					echo "<td>".$i['specs']."</td>";
					echo "<td>".$i['qty']."</td>";
					echo "<td>".($i['price'] * $i['qty'])."</td>";
					echo "</tr>";
					$sum += $i['price'] * $i['qty'];
				}
			}
		?>
		<tr>
			<td>Total</td>
			<td colspan="4"><?php echo "$sum";?></td>
		</tr>
</table>
<form class="cmxform" id="signupForm" method="get" action="email.php" target="shcart">
  <fieldset>
    <legend>Please enter your detail information</legend>
    <p>
		<label for="firstname">Firstname</label>
		<input id="firstname" name="firstname" type="text">
    </p>
    <p>
		<label for="lastname">Lastname</label>
		<input id="lastname" name="lastname" type="text">
    </p>
    <p>
		<label for="address">Address</label>
		<input id="address" name="address" type="text">
    </p>
    <p>
		<label for="postcode">Postcode</label>
		<input id="postcode" name="postcode" type="text">
    </p>
	<p>
		<label for="suburb">Suburb</label>
		<input id="postcode" name="postcode" type="text">
    </p>
	<p>
		<label for="email">Email</label>
		<input id="email" name="email" type="text">
    </p>
    <p>
      <input class="submit" type="submit" value="Submit">
    </p>
  </fieldset>
</form>
</body>
</html>