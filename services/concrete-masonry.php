<?php 

require("../header.php");

require_once("dbcontroller.php");
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav-buttons.css">
    <link rel="stylesheet" href="css/style-dustu.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/pater.css">
    <link rel="stylesheet" href="css/demo.css">
        <link rel="stylesheet" href="../css/style.css">


    <title>Concrete & Mansonry | Equipshare </title>
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
                    <a href="../index.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../aboutpage.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">about us</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../services.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name ">services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../contact.php" class="menu__item nav-link text-light">
                        <span class="menu__item-name">contact us</span>
                    </a>
                </li>
                <li>
                    
                <div class="dropdown mt-1 pt-1">
                    <a href="../<?php echo $userLink; ?>" class="btn btn-outline-secondary" ><?php echo $user; ?></a>
                    
                    
                        <?php if (isset($_SESSION["LOGGED_IN"])) : ?>
                            <div class="dropdown-content text-dark text-uppercase mr-3">
                                <p>
                                    <a href="../profile.php" class="pb-1">Profile</a>
                                </p>
                                
                                <p><a href="../add-equipment.html" class="pb-1">Add Asset</a></p>
                                <p><a href="../services.php" class="pb-1">Request Item</a></p>
                                <hr>
                                <p><a href="../signout.php" class="pb-2">signout</a></p>
                            </div >
                        <?php 
                        endif; ?>


                </div>

                </li>
               
            </ul>
        </div>
    </nav>
    <br><br>
    <!-- item section-->
<div class="container grid-container d-flex d-row justify-content-between mb-5 mt-5 pt-5">

    <?php 
    $category = "Concrete & Masonry";
    $row = $db_handle->runQuery("SELECT * FROM equipment WHERE category = ('$category') ORDER BY id ASC");
    if (!empty($row)) {
        foreach ($row as $key => $value) { ?>

    				<form method="post" action="" class="grid-item">

							<h5 class="text-center">
								<strong><?php echo $row[$key]["equipmentname"]; ?></strong>
                            </h5>
                            <br>
                            
                            <div class="">
								<img src="../<?php echo $row[$key]["link"]; ?>" class="img-thumbnail">
							</div>

							<div>
                                <h5>Model: <?php echo $row[$key]["model"]; ?></h5>        
                                 <form method="GET" action="<?php echo htmlspecialchars('../customerForm.php'); ?>">
                                <input type="hidden" name="id" value="<?php echo $row[$key]["equipmentname"]; ?>">
                                <input name="submit" type="submit" value="Request item" class="btn btn-outline-secondary">
                                </form>
                            </div>
                            
                            
        </form>

        
                    <?php 
                }
            } else {
                echo "
                <h4 class='mx-auto mt-5 pt-5'>No items in this category yet</h4>";
            } ?>
            
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
</body>

</html>