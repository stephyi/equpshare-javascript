<?php


require("header.php");

$DBuser = "FabianMuli";
$hostname = "localhost";
$password = "1LoveFabian";
$DBName = "subscribers";

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
    <link rel="stylesheet" type="text/css" href="css/pater.css" />
    <!--animate css, for animations-->
    <link rel="stylesheet" href="css/animate.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!--font awesome. This is for the social media icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--mission section font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!--slick css for testimonials-->
    <link rel="stylesheet" type="text/css" href="../slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../slick/slick-theme.css" />

    <link rel="stylesheet" href="../css/style.css">

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
                    <a href="aboutpage.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">about us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="menu__item nav-link text-light">
                        <span class="menu__item-name active">services</span>
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
                                <hr>
                                <p><a href="signout.php" class="pb-2">signout</a></p>
                            </div >
                        <?php 
                        endif; ?>
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

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="txt-heading text-center">
        <h3>Services</h3>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <div class="card">

                <div class="card-body">
                    <img src="https://images.pexels.com/photos/585419/pexels-photo-585419.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-thumbnail"
                        alt="services">
                    <br>

                    <br>
                    <p>When you rent with EquipShare, you get unmatched service that guarantees your equipment will be back
                        up and running as fast as possible. Our expert service technicians are on-call 24 hours a day, 7
                        days a week, 365 days a year.
                    </p>
                </div>

            </div>
        </div>
        <div class="col-md-5">

            <div class="card">

                <div class="card-body">
                    <img src="https://images.pexels.com/photos/129544/pexels-photo-129544.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-thumbnail"
                        alt="services">
                    <p>
                        <br> We’re always refining our systems and technology to be better, so you experience minimal downtime.
                        <br>
                        <br> On-call service gets your equipment up and running faster.</p>
                </div>

            </div>
        </div>

        <div class="col-md-1"></div>
    </div>
    <br/>
    <br/>
    <!-- Images section -->
    <div class="images p-5">
        <div class="d-flex d-row pb-2">
            <div class="">
            </div>
            <div class="">
                <img class=" img-thumbnail " src="https://images.pexels.com/photos/583390/pexels-photo-583390.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">
                <div class="text-center">
                    <a href="services/aerial-types.html" class="btn btn-outline-secondary">Arial Lift </a>
                </div>

            </div>
            <br>
            <div class="">
                <img class="img-thumbnail " src="https://images.pexels.com/photos/583390/pexels-photo-583390.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Earth Moving </a>
                </div>

            </div>
            <br>

            <div class="">
                <img class="img-thumbnail" src="https://images.pexels.com/photos/583390/pexels-photo-583390.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Forklift & Material Handling </a>
                </div>

            </div>

            <div class="">
            </div>
        </div>
        <br/>
        <div class="d-flex d-row pb-4">
            <div class="">
            </div>
            <div class="">
                <img class="img-thumbnail" src="https://images.pexels.com/photos/416965/pexels-photo-416965.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary">Concrete & Mansonry </a>
                </div>

            </div>
            <br>

            <div class="">
                <img class="img-thumbnail" src="https://images.pexels.com/photos/839900/pexels-photo-839900.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Compaction </a>
                </div>

            </div>
            <br>

            <div class="">
                <img class="img-thumbnail " src="https://images.pexels.com/photos/583390/pexels-photo-583390.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Power & HVAC</a>
                </div>
            </div>
            <br>

            <div class="">
            </div>
        </div>

        <div class="d-flex d-row ">
            <div class="">
            </div>
            <div class="">
                <img class="img-thumbnail " src="https://images.pexels.com/photos/839900/pexels-photo-839900.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Power /Small Tools </a>
                </div>

            </div>
            <br>

            <div class="">
                <img class="img-thumbnail " src="https://images.pexels.com/photos/416965/pexels-photo-416965.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Safety & Shoring </a>
                </div>

            </div>
            <br>

            <div class="">
                <img class="img-thumbnail " src=" https://images.pexels.com/photos/583390/pexels-photo-583390.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 ">

                <div class="text-center">
                    <a href=" " class="btn btn-outline-secondary ">Agriculture & Landscaping </a>
                </div>
            </div>
            <br>

            <div class="">
            </div>
        </div>
    </div>
    <br/>





    <!--footer section-->
    <footer class="footer " id="contact ">
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
                    <li>email: example@gmail.com</li>
                    <li>phone: 071234789038</li>
                </ul>

                <h4 class="text-uppercase ">about us</h4>

                <li>
                    <a href="# ">contacts</a>
                </li>
                <li>
                    <a href="# ">privacy policy</a>
                </li>


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
    <script type="text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js "></script>
    <script type="text/javascript " src="slick/slick.js "></script>
    <script type="text/javascript " src="js/main.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>


</body>

</html>