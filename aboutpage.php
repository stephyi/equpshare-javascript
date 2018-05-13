<?php

require("header.php");

$DBuser = "equipsha_equipsh";
$hostname = "localhost";
$password = "Admin@@2030";
$DBName = "equipsha_subscribers";

$conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

$emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$sql = "INSERT INTO subscribers (email) VALUES ('$email')";

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
	}

	$result = mysqli_query($conn, "SELECT * FROM subscribers WHERE email='" . $_POST["email"] . "'");
	$emailResult = mysqli_num_rows($result);

	if ($emailResult <= 0) {
		if (count($_POST) > 0) {
			mysqli_query($conn, $sql);
		}
	} else {
		$emailErr = "Subscriber already exists.";
		header("location:index.php#footer");
	}
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>About Us</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="css/aboutstyle.css" />

	<link rel="stylesheet" href="css/style.css">

	<!--animate css, for animations-->
	<link rel="stylesheet" href="css/animate.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!--font awesome. This is for the social media icons-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style-dustu.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/pater.css">
	<link rel="stylesheet" href="css/demo.css">

</head>

<body class="is-preload">
	<!-- Navbar Section-->
	<nav class="navbar navbar-expand-md bg-dark fixed-top navbar-dark">

        <a href="#" class="navbar-brand text-light">Equipshare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto menu--dustu">
                <li class="nav-item active">
                    <a href="index.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name ">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="menu__item nav-link text-light">
                        <span class="menu__item-name active">about us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="services.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">contact us</span>
                    </a>
                </li>
                <li>
                    
                <div class="dropdown mt-3 pt-1">
                    <a href="<?php echo $userLink; ?>" class="btn btn-outline-secondary" ><?php echo $user; ?></a>
                       <?php if (isset($_SESSION["LOGGED_IN"])) : ?>
                            <div class="dropdown-content text-dark text-uppercase mr-3">
                                <p>
                                    <a href="profile.php" class="pb-1">Profile</a>
                                </p>
                                
                                <p><a href="add-equipment.html" class="pb-1">Add Asset</a></p>
								<p><a href="services.php" class="pb-1">Request Item</a></p>

                                <hr>
                                <p><a href="signout.php" class="pb-2">signout</a></p>
                            </div >
                        <?php 
																							endif; ?>                </div>

                </li>
               
            </ul>
        </div>
    </nav>
    <br>
        <br>
    <br>
    <br>

	<!-- End of Nav section-->
	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1>EQUIPSHARE</h1>
			<p>A company that understands your needs.</p>
		</div>
		<video autoplay loop muted playsinline>
			<source src="images/banner.mp4" type="video/mp4"> Your browser does not support this video format
		</video>
	</section>
	<!--Our story CTA -->
	<section id="cta" class="wrapper">
		<div class="inner">
			<h2 class>OUR STORY</h2>
			<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare
				mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing.
				Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac
				adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
		</div>
	</section>


	<!-- Value Highlights-->
	<section class="wrapper">
		<div class="inner">
			<header class="special">
				<h2 class="text-center">OUR VALUES</h2>
				<div class="container-fluid">
					<p class="text-center">Since its inception,Equipshare has been governed by its core values.We live our values through everthing we do.Integrity,
						teamwork,Commitment,Proffesionalism-these aren't just catchwords to us.</br>They are who we are!</p>
				</div>
			</header>
			<div class="highlights">
				<section>
					<div class="content">
						<header>
							<a href="#" class="icon fa-smile-o">
								<span class="label">Icon</span>
							</a>
							<h3>CUSTOMER-ORIENTED</h3>
						</header>
						<p>We are here because of you.At equipshare,the customer is our top priority and we are dedicated to making your experience
							and time with us worthwhile.We try to understand your needs in order to serve you the best way we know how.</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="#" class="icon fa-handshake-o">
								<span class="label">Icon</span>
							</a>
							<h3>TEAMWORK</h3>
						</header>
						<p>We treat each other with respect and do not tolerate intimidation or harrasment.We collaborate with key entities and
							resouerces and resources externally.Together,we believe,more is achieved.</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="#" class="icon fa-info-circle">
								<span class="label">Icon</span>
							</a>
							<h3>INTEGRITY</h3>
						</header>
						<p>We are honest and act with intergrity while interacting with customers and accurately report our financial documents.We
							act with honesty and integrity, never compromising the truth. We communicate openly and our actions are consistent
							with our words.</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="#" class="icon fa-line-chart">
								<span class="label">Icon</span>
							</a>
							<h3>QUALITY</h3>
						</header>
						<p>Our dedication to excellence is our prime mission. We are committed to providing the highest degree of quality in every
							product, solution, service, and endeavor of our company. This results in loyal customers, who highly recommend Equipshare.
						</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="#" class="icon fa-paper-plane-o">
								<span class="label">Icon</span>
							</a>
							<h3>COMMITMENT</h3>
						</header>
						<p>We take personal responibilty for our decisions and our actions.We protect our capital assets,our brand and our intellectual
							and technical property.</p>
					</div>
				</section>
				<section>
					<div class="content">
						<header>
							<a href="#" class="icon fa-vcard-o">
								<span class="label">Icon</span>
							</a>
							<h3>Feugiat consequat</h3>
						</header>
						<p>Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.</p>
					</div>
				</section>
			</div>
		</div>
	</section>


	<!--footer section-->
	<footer class="footer " id="contact">
		<div class="top-footer ">
			<h2 class="text-center ">
				Equipshare
			</h2>
		</div>

		<div class="middle-footer row ">
			<div class="col-md-4 ">
				<h3 class="text-uppercase ">navigation</h3>
				<ul>
					<li>
						<a href="# ">Home</a>
					</li>
					<li>
						<a href="#services ">Services</a>
					</li>
					<li>
						<a href="#about ">About us</a>
					</li>
					<li>
						<a href="#contact ">Contacts</a>
					</li>
					<li>
						<a href="# ">Login</a>
					</li>

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
					<a href="# ">
						<i class="fa fa-twitter "></i>
					</a>
					<a href="# ">
						<i class="fa fa-facebook "></i>
					</a>
					<a href="# ">
						<i class="fa fa-google-plus "></i>
					</a>

				</form>
			</div>

			<div class="col-md-1 "></div>

			<div class="col-md-4 ">
				<h3 class="text-uppercase ">contact us</h3>
				<ul>
					<li>email: equipshare@gmail.com</li>
					<li>phone: 0712345678</li>
				</ul>

				<h4 class="text-uppercase ">mission us</h4>

				<li>
					<a href="# ">contacts</a>
				</li>
				<li>
					<a href="# ">privacy policy</a>
				</li>
				</ul>

			</div>
		</div>
		<div class="bottom-footer text-center ">
			<p>&copy;2018 Equipshare. All rights reserved.</p>
		</div>
	</footer>



	<!-- Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/browser.min.js"></script>
	<script src="js/breakpoints.min.js"></script>
	<script src="js/util.js"></script>
	<script src="js/aboutmain.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
</body>

</html>