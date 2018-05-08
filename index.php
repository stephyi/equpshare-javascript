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
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Equipshare">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home | Equipshare</title>

    <!-- css files -->
    <!--main css file-->
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style-dustu.css" />
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="#" class="menu__item nav-link text-light">
                        <span class="menu__item-name active">Home</span>
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

                    

    <!-- Slideshow section-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <!--slide images-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="images/noah-buscher-174567-unsplash.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="caption-center">Great tools!</h1>
                    <p>Tough tools for tough jobs.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/jonathan-mast-387762-unsplash.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="caption-center">Equipment.</h1>
                    <p>Perfectly tailored to your job and needs.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="images/xavi-moll-15959-unsplash.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="caption-center">Machinery</h1>
                    <p>Cutting edge technology.</p>
                </div>
            </div>
        </div>

        <!-- the controls-->
        <a class=" carousel-control-prev " href="#carouselExampleIndicators " role="button " data-slide="prev ">
            <span class="carousel-control-prev-icon " aria-hidden="true "></span>
            <span class="sr-only ">Previous</span>
        </a>

        <!-- side controls-->
        <a class="carousel-control-next " href="#carouselExampleIndicators " role="button " data-slide="next ">
            <span class="carousel-control-next-icon " aria-hidden="true "></span>
            <span class="sr-only ">Next</span>
        </a>
    </div>

    

    <!--mission and Vision section -->
    <section class="mission-section animated " data-animate-down="ha-header-small" data-animate-up="ha-header-large" id="about">
        <div class="row">
            <div class="col-md-1 "></div>
            <div class="col-md-11 ">
                <div class="mission content animated mission-section-hidden ">
                    <div class="row">
                        <div class="col-md-1 "></div>

                        <div class="col-md-5">
                            <h4 class="text-uppercase ">Our Mission</h4>

                            <p>Equipshare is an equipment distributor dedicated to continuously improving our products and services
                                offering to meet unique requirements of our customers,in doin so,exceed thier expectations
                                for service ,quality and value.We strive to earn our customers loyalty by working to deliver
                                more than promised and provide exceptional personalized service that creates a pleasing experience.
                            </p>
                        </div>
                        <div class="col-md-5 ">
                            <h4 class="text-uppercase ">Our Vision</h4>
                            <p>Our vision is to be the premier and preffered equipment and solutions provider on the market
                                and offer service beyond customer satisfaction.In addition to supplying equipment,we strive
                                to remain customer oriented and provide solutions by havingthe right product range with a
                                high life cycle that can be customized to your need and delivered in your time frame.</p>
                        </div>
                        <div class="col-md-1 "></div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- end of vision and mission section-->

    <!-- Services section-->
    <div class="service-sec container text-center" id="services">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="testimonials-heading">
                    <h2>Services Offered</h2>
                </div>
                <br />
                <p>Choose an option to learn more or request about a service. </p>
                <br />
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row text-center ">
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-3">
                    <img class="img-fluid img-thumbnail" src="images\adult-auto-automobile-558375.jpg" alt="">
                </a>
                <a href="" class="button btn btn-outline-secondary ">Buy Equipments</a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-3">
                    <img class="img-fluid img-thumbnail" src="images\cogs-gears-machine-159275.jpg" alt="">
                </a>
                <a href="" class="button btn btn-outline-secondary ">Get Parts</a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-3">
                    <img class="img-fluid img-thumbnail" src="images\black-and-white-blur-chrome-209666.jpg" alt="">
                </a>
                <button class="button btn btn-outline-secondary">Request Service </button>
            </div>

            <br />

            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-3">
                    <img class="img-fluid img-thumbnail" src="images\engine-heatsink-individual-parts-185545.jpg" alt="">
                </a>
                <button class="button btn btn-outline-secondary">Telematics</button>
                <br />
                <br />

            </div>
        </div>
    </div>


    <!--testimonials section-->
    <section class="testimonials slick-slider">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="testimonials-heading">
                    <h2 class="text-center">Testimonials</h2>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="autoplay text-center">
                    <div class="col-md-4">
                        <span>&ldquo;</span>
                        <div>Great rates and very helpful in offering solutions according to equipment needs.</div>
                        <span class="client-name">~Peter Nade </span>

                    </div>
                    <div class="col-md-3">
                        <span>&ldquo;</span>

                        <div>These guys have exceptional equipment services.recently rented grinders and the unit ran great and
                            was competitively priced</div>
                        <span class="client-name">~Sammy Kibaa</span>

                    </div>
                    <div class="col-md-3">
                        <span>&ldquo;</span>

                        <div>Professional,accomodating and good quality equipment.</div>
                        <span class="client-name">~ Fabian Greem</span>

                    </div>
                    <div class="col-md-3">
                        <span>&ldquo;</span>

                        <div>Great services and fast response.</div>
                        <span class="client-name">~Stanley Boul </span>

                    </div>
                    <div class="col-md-3">
                        <span>&ldquo;</span>

                        <div>Customer services are on point!I will definitely rent at equipshare again already looking for at
                            generators for an upcoming project.
                        </div>
                        <span class="client-name">~ Victor Nzilani</span>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
    <!--testimonials section-->

    <!--footer section-->
    <footer class="footer" id="footer">
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
                <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <span class="text-danger"><?php echo $emailErr; ?></span>
                    <input class="form-control " type="email" name="email" placeholder="subscribe to our newsletter " required>
                    <br />
                    <input class="btn btn-primary" type="submit" value="subscribe">
                </form>

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

            </div>

            <div class="col-md-1 "></div>

            <div class="col-md-4 ">
                <h3 class="text-uppercase ">contact us</h3>
                <ul>
                    <li>email: example@gmail.com</li>
                    <li>phone: 071234789038</li>
                </ul>

                <h4 class="text-uppercase">about us</h4>

                <li>
                    <a href="contacts.html">contacts</a>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="js/testimonials.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>


</body>

</html>