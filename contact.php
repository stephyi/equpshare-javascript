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
            $emailErr = "You have successfully subscribed.";
            $to = $email;
            $from = "info@equipshare.co.ke";
            $subject = "Welcome to Equipshare.";
            $message = "Welcome to Equipshare, you have successfully been added to our mailing list. You will receive all the offers and amazing products right in your inbox";

            mail($to, $subject, $message, $from);
        }
    } else {
        $emailErr = "Subscriber already exists.";
    }
}
?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">
    <meta name="keywords" content="equipshare,contact,email,message,address,call,feedback,phone number,report,">
    <meta name="description" content="Want to get in touch?Interested in partnering with us?Feel free to call us or send an email!">
    <title>Contact Us|Equipshare</title>


    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

    <!-- css files -->
    

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

    <link rel="stylesheet" href="css/style-dustu.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/pater.css">
    <link rel="stylesheet" href="css/demo.css">

    <!--main css file-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
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
                        <span class="menu__item-name">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="aboutpage.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">about us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="services.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name active">contact us</span>
                    </a>
                </li>
                <li>
                    
                <div class="dropdown mt-3 pt-1">
                    <a href="<?php echo $userLink; ?>" class="btn btn-outline-secondary" ><?php echo $user; ?></a>
                        <?php 
                        if ($_SESSION["LOGGED_IN"] == true) {

                            ?>
                            <div class="dropdown-content text-dark text-uppercase">
                                <p>
                                    <a href="profile.php" class="pb-1">Profile</a>
                                </p> 
                                <p><a href="add-equipment.html" class="pb-1">Add Asset</a></p>
                                <p><a href="services.php" class="pb-1">Request Item</a></p>

                                <hr>
                                <p><a href="signout.php" class="pb-2">signout</a></p>

                            </div >

                        <?php 
                    };
                    ?>
                </div>

                </li>
               
            </ul>
        </div>
    </nav>
    <br>
        <br>
    <br>
    <br>
    <!-- End of Nav section-->
    <!--Contact section-->
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form validate" method="POST" action="<?php echo htmlspecialchars('sendingMessage.php') ?>">
                <span class="contact100-form-title">
                    Contact Us!
                    <?php if (isset($_SESSION["send_message_success"])) {
                        echo $_SESSION["send_message_success"];
                    } ?>
                </span>
                <h5 class="contact100-form-subtitle">Here at Equipshare,we love feedback.</h5>

                <label class="label-input100" for="first-name">Tell us your name *</label>
                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                    <input id="name" class="input100" type="text" name="first-name" placeholder="First name" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                    <input class="input100" id="name" type="text" name="second-name" placeholder="Last name" required>
                    <span class="focus-input100"></span>
                </div>

                <label class="label-input100" for="email">Enter your email *</label>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com" required>
                    <span class="focus-input100"></span>
                </div>

                <label class="label-input100" for="phone">Enter phone number</label>
                <div class="wrap-input100">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +254 786758948">
                    <span class="focus-input100"></span>
                </div>

                <label class="label-input100" for="message">Message *</label>
                <div class="wrap-input100 validate-input" data-validate="Message is required">
                    <textarea id="message" class="input100" name="message" placeholder="Write us a message" required></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit">
                        Send Message
                    </button>
                </div>
            </form>

            <div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-map-marker"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Address
                        </span>

                        <span class="txt2">
                            11000,00200 Nairobi Kenya
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Lets Talk
                        </span>

                        <span class="txt3">
                            +245 712345678
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-envelope"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            General Support
                        </span>

                        <span class="txt3">
                            equipshare@gmail.com
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!--footer section-->
    <footer class="footer" id="contact">
        <div class="top-footer">
            <h2 class="text-center">
                Equipshare
            </h2>
        </div>

        <!--from here-->

        <div class="middle-footer">
            <div class="row">

                <div class="col-md-4 ">
                    <h3 class="text-uppercase">navigation</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>
                        <li>
                            <a href="aboutpage.php">About us</a>
                        </li>
                        <li>
                            <a href="#">Contacts</a>
                        </li>
                        <li>
                            <a href="login.php">Login</a>
                        </li>

                    </ul>
                </div>

                <div class="col-md-3 ">
                    <h3 class="text-uppercase">subscribe</h3>
                    <form class="form ">
                        <input class="form-control " type="email " placeholder="email@example.com" required>
                        <br />
                        <button class="btn btn-primary " type="submit">subscribe</button>
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
                        <li>phone: 071234789038</li>
                        <li>email:info@equipshare.co.ke</li>
                    </ul>

                    <h4 class="text-uppercase ">abouts us</h4>

                    <li>
                        <a href="# ">contacts</a>
                    </li>
                    <li>
                        <a href="# ">privacy policy</a>
                    </li>
                    </ul>

                </div>
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


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>

    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
   <script src="js/validate-form.js"></script>


</body>

</html>