<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode[0]["code"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}

if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByCode2 = $db_handle->runQuery("SELECT * FROM tblproduct2 WHERE code='" . $_GET["code"] . "'");
				$itemArray2 = array($productByCode2[0]["code"] => array('name' => $productByCode2[0]["name"], 'code' => $productByCode2[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode2[0]["price"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode2[0]["code"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode2[0]["code"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray2);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray2;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}

if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByCode3 = $db_handle->runQuery("SELECT * FROM tblproduct3 WHERE code='" . $_GET["code"] . "'");
				$itemArray3 = array($productByCode3[0]["code"] => array('name' => $productByCode3[0]["name"], 'code' => $productByCode3[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode3[0]["price"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode3[0]["code"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode3[0]["code"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray2);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Equipshare</title>

    <!-- css files -->
    <!--main css file-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style-dustu.css" />
    <link rel="stylesheet" type="text/css" href="/pater.css" />
    <!--animate css, for animations-->
    <link rel="stylesheet" href="css/animate.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!--font awesome. This is for the social media icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--mission section font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!--slick css for testimonials-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

   <link rel="stylesheet" href="style.css">

	<style>
		.container {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
		}
	</style>
   
</head>
<body>

	<!-- Navbar Section-->
    <nav class="navbar navbar-expand-sm bg-dark fixed-top text-uppercase navbar-dark">
        <a href="#" class="navbar-brand text-light">Equipshare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto menu--dustu">
                <li class="nav-item active">
                    <a href="#" class="menu__item nav-link text-light">
                        <span class="menu__item-name">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about-us.html" class="menu__item nav-link text-light">
                        <span class="menu__item-name">about us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="services/services.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name active">services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contacts.html" class="menu__item nav-link text-light">
                        <span class="menu__item-name">contact us</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
	<!-- End of Nav section-->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="txt-heading text-center"><h3>Services</h3></div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body">
					<img src="https://images.pexels.com/photos/585419/pexels-photo-585419.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-thumbnail" alt="services">
					<br>

					<br>
					<p>When you rent with EquipShare, you get unmatched service that guarantees your equipment will be back up and running as fast as possible. Our expert service technicians are on-call 24 hours a day, 7 days a week, 365 days a year. Anytime. Anywhere. Just call us and someone will be en route. So you can get back to work quicker.
</p>
				</div>
				<div class="card-footer">

				</div>
			</div>
		</div>
		<div class="col-md-5">

			<div class="card">
					<div class="card-header">
						
					</div>
					<div class="card-body">
						<img src="https://images.pexels.com/photos/129544/pexels-photo-129544.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-thumbnail" alt="services">	
<p><br> We’re always refining our systems and technology to be better, so you experience minimal downtime. <br> On-call service gets your equipment up and running faster.</p>
					</div>
					<div class="card-footer">

					</div>
			</div>
		</div>
		
		<div class="col-md-1"></div>
	</div>

	<br>
	<br>

		<div class="text-heading text-center">
			<h3 class="text-default text-capitalise">Rentals</h3>
		</div>

					<div class="container d-flex justify-content-between">

		<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) {
		foreach ($product_array as $key => $value) {
			?>

				<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
							<div class="product-image">
				 				<img src="<?php echo $product_array[$key]["image"]; ?>" class="img-thumbnail">
							</div>

							<div>
								<strong><?php echo $product_array[$key]["name"]; ?></strong>
							</div>

							<div class="product-price"><?php echo "$" . $product_array[$key]["price"]; ?></div>

							<div>
								<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
							</div>
					
				</form>

			<?php

	}
}
?>

					</div>



		<br>
		<div class="container d-flex justify-content-around">

			<?php
		$product_array2 = $db_handle->runQuery("SELECT * FROM tblproduct2 ORDER BY id ASC");
		if (!empty($product_array2)) {
			foreach ($product_array2 as $key => $value) {
				?>
				<form method="post" action="index.php?action=add&code=<?php echo $product_array2[$key]["code"]; ?>">
					<table>
						<tr>
							<div class="product-image">
								<img src="<?php echo $product_array2[$key]["image"]; ?>" class="img-thumbnail">
							</div>

							<div>
								<strong><?php echo $product_array2[$key]["name"]; ?></strong>
							</div>

							<div class="product-price"><?php echo "$" . $product_array2[$key]["price"]; ?></div>

							<div>
								<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
							</div>
						</tr>
					</table>
					
				</form>

			<?php

	}
}
?>
					</div>

<div class="container d-flex justify-content-around">
			<?php
		$product_array3 = $db_handle->runQuery("SELECT * FROM tblproduct3 ORDER BY id ASC");
		if (!empty($product_array3)) {
			foreach ($product_array3 as $key => $value) {
				?>

				<form method="post" action="index.php?action=add&code=<?php echo $product_array3[$key]["code"]; ?>">
					<table>
						<tr>
							<div class="product-image">
								<img src="<?php echo $product_array3[$key]["image"]; ?>" class="img-thumbnail">
							</div>

							<div>
								<strong><?php echo $product_array3[$key]["name"]; ?></strong>
							</div>

							<div class="product-price"><?php echo "$" . $product_array3[$key]["price"]; ?></div>

							<div>
								<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
							</div>
						</tr>
					</table>
					
				</form>

			<?php

	}
}
?>
	</div>

	<br>
	<br>
	<div class="hr"></div>
	<br>

	<div id="shopping-cart">

			<div class="">
				<div class="d-flex justify-content-around">
					<div class="txt-heading">
						<h3>Cart</h3>
						
					</div>
					
				</div>

				</div>
				

			</div>
		
		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">

		<?php
	if (isset($_SESSION["cart_item"])) {
		$item_total = 0;
		?>	

		<table class="table table-striped table-hover">
			<tbody>
				<tr>
					<thead class="thead">
						<th style="text-align:left;"><strong>Name</strong></th>
						<th style="text-align:left;"><strong>Code</strong></th>
						<th style="text-align:right;"><strong>Quantity</strong></th>
						<th style="text-align:right;"><strong>Price</strong></th>
						<th style="text-align:center;"><strong>Action</strong></th>
					</thead>
				</tr>

				<?php	
			foreach ($_SESSION["cart_item"] as $item) {
				?>
								<tr>
								<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
								<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
								<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"] / 3; ?></td>
								<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$" . $item["price"]; ?></td>
								<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
								</tr>
				<?php
			$item_total += ($item["price"] * ($item["quantity"] / 3));
		}
		?>

				<tr>
					<td colspan="5" align=right>
						<strong>Total:</strong> 
						<?php echo "$" . $item_total; ?>
					</td>
				</tr>
			</tbody>
		</table>

		<?php

}
?>
		</div>
		<div class="col-md-1"></div>
		</div>

	</div>
	
	<br>
	
	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-2">
			<a id="btnEmpty" class="btn btn-danger" href="index.php?action=empty">Empty Cart</a>
		</div>

		<div class="col-md-7"></div>
		<div class="col-md-2">
			<button class="btn btn-default">checkout</button>
		</div>
	</div>

	<br>
	


<!--footer section-->
<footer class="footer" id="contact">
        <div class="top-footer ">
            <h2 class="text-center ">
                Equipshare
            </h2>
        </div>

        <div class="middle-footer row ">
            <div class="col-md-4 ">
                <h3 class="text-uppercase ">navigation</h3>
                <ul>
                    <li><a href="# ">Home</a></li>
                    <li><a href="#services ">Services</a></li>
                    <li><a href="#about ">About us</a></li>
                    <li><a href="#contact ">Contacts</a></li>
                    <li><a href="# ">Login</a></li>

                </ul>
            </div>

            <div class="col-md-3 ">
                <h3 class="text-uppercase ">subscribe</h3>
                <form class="form ">
                    <input class="form-control " type="email " placeholder="subscribe to our newsletter " required>
                    <br />
                    <input class="btn btn-primary " type="submit " value="subscribe ">
                    <br />
                    <br />
                    <h4 class="text-uppercase ">follow us:</h4>
                    <a href="# "><i class="fa fa-twitter "></i></a>
                    <a href="# "><i class="fa fa-facebook "></i></a>
                    <a href="# "><i class="fa fa-google-plus "></i></a>

                </form>
            </div>

            <div class="col-md-1 "></div>

            <div class="col-md-4 ">
                <h3 class="text-uppercase ">contact us</h3>
                <ul>
                    <li>email: example@gmail.com</li>
                    <li>phone: 071234789038</li>
                </ul>

                <h4 class="text-uppercase ">about us</h4>

                <li><a href="# ">contacts</a></li>
                <li><a href="# ">privacy policy</a></li>
                

            </div>
        </div>
        <div class="bottom-footer text-center ">
            <p>&copy;2018 Equipshare. All rights reserved.</p>
        </div>
    </footer>
    <!-- end of footer section-->

    <!--scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>

    <!--slick javascript-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>    


</body>
</html>