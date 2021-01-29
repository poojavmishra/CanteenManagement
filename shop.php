<?php
@ob_start();
session_start();
$connect = mysqli_connect("localhost", "root", "", "gpmcanteen");
if(isset($_POST["add"]))
{
	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "f_id");
		if(!in_array($_GET["f_id"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
			'product_id' => $_GET["f_id"],
			'item_name' => $_POST["hidden_name"],
			'price' => $_POST["hidden_price"],
			'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $item_array;
			echo '<script>window.location="food_sel.php"</script>';
		}
		else
		{
			echo '<script>alert("Products already added to cart")</script>';
			echo '<script>window.location="food_sel.php"</script>';
		}
	}
	else
	{
		$item_array = array(
		'product_id' => $_GET["f_id"],
		'item_name' => $_POST["hidden_name"],
		'price' => $_POST["hidden_price"],
		'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["product_id"] == $_GET["f_id"])
			{
				unset($_SESSION["cart"][$keys]);
				
				echo '<script>window.location="food_sel.php"</script>';
			}
		}
	}
}
?>