<?php 

$LemailErr = $LpasswordErr = "";

// database variables 
$servername = "localhost";
$username = "FabianMuli";
$password = "1LoveFabian";
$DBName = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DBName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Lpassword"])) {
        $LpasswordErr = "password cannot be blank";
    } else {
        $_password = $_POST["Lpassword"];
        $_password = sha1($_password);
    }
    if (empty($_POST["Lemail"])) {
        $LemailErr = "email cannot be blank";
    } else {
        $Lemail = $_POST["Lemail"];
        if (!filter_var($Lemail, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
}

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM usersData WHERE name='" . $_POST["Lemail"] . "' and password = '" . $_POST["Lpassword"] . "'");
    $count = mysqli_num_rows($result);
    if ($count <= 0) {
        $message = "user does not exist";
    } else {
        $message = "you have successfully logged in";
        $_SESSION["user_id"] = 1001;
        $_SESSION["LOGGED_IN"] = true;
        $_SESSION["name"] = $name;
        $_SESSION['loggedin_time'] = time();
        header("location:index.php");
    }

}

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
<title>Title</title>
</head>
<body>
    <div class="row">
        <div class="col-md-4 col-sm-1"></div>
        <div class="col-md-4 col-sm-10">
            <div class="card">

                <div class="card-header">
                    <h1 class="login-h1">
                        Login
                    </h1>
                </div>

                <form method="post" action="#" class="form">
                    <div class="text-center">
                        <span class="text-danger"><?php echo $message; ?></span>
                    </div>
                    <div class="card-body">

                        <label class="login-label">
                            E-mail:
                        </label>
                        <br />
                        <?php echo $LemailErr; ?> 
                        <input type="email" name="Lemail" class="form-control" placeholder="example@gmail.com">
                        <br />
                        <label  class="login-label">
                            Password:
                        </label>
                        <?php echo $LpasswordErr; ?> 
                        <a href="#" class="login-a">Forgot your password?</a>
                        <input type="password" name="Lpassword" class="form-control">
                        <br />
                        <br />
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button class="btn btn-outline-secondary">Log in</button>
                                <a href="signup.php" class="login-a sign-up-login-button text-center"> or sign up</a>

                            </div>
                            <div class="col-md-2"></div>

                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>