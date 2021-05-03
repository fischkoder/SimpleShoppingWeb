<?php
	session_start();
	$del_id = $_REQUEST['id'];
		if(isset($del_id)){
			unset($_SESSION['cart'][$del_id]);
		}else{
			unset($_SESSION['cart']);
		}

	header("Location:cart.php");
?>