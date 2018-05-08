<?php

require("header.php");

if ($_SESSION["LOGGED_IN"] == false) {
    header("location: login.php");
}

$emailErr = "";

$DBuser = "FabianMuli";
$hostname = "localhost";
$password = "1LoveFabian";
$DBName = "subscribers";

$conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

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
    }
}

mysqli_close($conn);

$DBName = "equipment";

$conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/style.css">
<!-- css files -->
    <!--main css file-->
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style-dustu.css" />
    <!--animate css, for animations-->
    <link rel="stylesheet" href="css/animate.css">

<title class="text-capitalize"><?php echo $user; ?> | Profile</title>
</head>
<body>
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
                        <span class="menu__item-name">contact us</span>
                    </a>
                </li>
                <li>
                    
                <div class="dropdown mt-3 pt-1">
                    <a href="<?php echo $userLink; ?>" class="btn btn-outline-secondary" ><?php echo $user; ?></a>
                       <?php if (isset($_SESSION["LOGGED_IN"])) : ?>
                            <div class="dropdown-content text-dark text-uppercase mr-3">
                                <p>
                                    <a href="#" class="pb-1">Profile</a>
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

    <div class="bg-dark d-flex p-5">
    <div class="profile">
        <img  class="rounded-circle  ml-5" src="https://api.adorable.io/avatars/180/abott@adorable.png"><span class="text-light pl-5 user-name text-capitalize"><?php echo $user; ?></span>
    </div>
    </div>
    <div class="d-flex d-row profile-divs justify-content-between mb-5 ">
        <div class=""></div>
        <div class=" bg-light profile-about rounded">
            <div class="">
                <div>
                    <h3>About</h3>
                    <p>Email: <?php echo $_SESSION["email"]; ?></p>
                </div>
                
                
            </div>
            
        </div>
        <div class=""></div>
        <div class=" bg-light profile-about AddedAssets rounded ">
         <h3>Your Added Assets</h3>

        <?php 
        require_once("services/dbcontroller.php");
        $db_handle = new DBController();

        $row = $db_handle->runQuery("SELECT * FROM EQUIPMENT WHERE email = ('$email') ORDER BY ID ASC");
        foreach ($row as $key => $value) {; ?>
            <div>
                <ul>
                    <li><a href="" data-toggle="modal" data-target="#<?php echo $row[$key]["equipmentname"]; ?>"><?php echo $row[$key]["equipmentname"]; ?></a></li>
                </ul>
            </div>
            <div class="modal fade" id="<?php echo $row[$key]["equipmentname"]; ?>">
            <div class="modal-dialog">
            <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header ">
        <h4 class="modal-title mx-auto"><?php echo $row[$key]["equipmentname"]; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <img src="<?php echo $row[$key]["link"]; ?>" class="img-thumbnail rounded">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <p  class="mx-auto"><?php echo $row[$key]["description"]; ?></p>
          <input type="button" class="btn btn-danger ml-auto" value="Delete">

      </div>

    </div>
  </div>
</div>
        <?php 
    };
    ?>
            

        </div>
        <div class=""></div>
        <div class="bg-light profile-about rounded ">
            <h3>Rented Items</h3>
                <p>You have not rented out any items</p>

        </div>
        <div class="bg-light profile-about rounded" >
                <h3>Requested Items</h3>
                <p>You have not rented out any items</p>
            </div>
        
        <div class=""></div>
    </div>
        
    </div>



     <!--footer section-->
    <footer class=" footer " id=" footer ">
        <div class="top-footer ">
            <h2 class=" text-center ">
                Equipshare
            </h2>
        </div>

        <div class=" middle-footer row ">
            <div class=" col-md-4 ">
                <h3 class=" text - uppercase ">navigation</h3>
                <ul>
                    <li>
                        <a href="# ">Home</a>
                            </li >
                                <li >
                                <a href = "#services " > Services </a >
                                </li >
                                <li >
                                <a href = "#about " > About us </a >
                                </li >
                                <li >
                                <a href = "#contact " > Contacts </a >
                                </li >
                                <li>
                                <a href = "# " > Login </a >
                                </li >

                                </ul >
                                </div >

                                <div class =
                            "col-md-3 " >
                                <h3 class ="text-uppercase " > subscribe </h3 >
                                <form class =
                            "form" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>