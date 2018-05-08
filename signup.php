<?php

session_start();

$cookie_name = "";
$cookie_value = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["email"] = $_POST["email"];
}

// defining the variables
$nameErr = $passwordErr = $emailErr = $confirmPasswordErr = "";
$name = $password = $email = "";

// database variables 
$servername = "localhost";
$username = "FabianMuli";
$password = "1LoveFabian";
$DBName = "users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $DBName);

// defining if the user is already registered message
$message = " ";

// handling the form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "name cannot be blank";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "email cannot be blank";
    } else {
        $email = $_POST["email"];
        $_SESSION["email"] = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "password cannot be blank";
    } else {
        if ($_POST["password"] == $_POST["confirmPassword"]) {

            $_password = $_POST["password"];
             //adding data into the database
            $sql = "INSERT INTO usersData (name, email, password)
            VALUES ('$name', '$email', '$_password')";

            if (count($_POST) > 0) {
                $result = mysqli_query($conn, "SELECT * FROM usersData WHERE name='" . $_POST["name"] . "' and email = '" . $_POST["email"] . "'");
                $emailResult = mysqli_query($conn, "SELECT * FROM usersData WHERE email='" . $_POST["email"] . "'");

                $count = mysqli_num_rows($result);
                $count2 = mysqli_num_rows($emailResult);
                if ($count > 0) {
                    $message = "user already exists";
                } else if ($count2 > 0) {
                    $message = "email already exists";
                } else {
                    $conn->query($sql);
                    $_SESSION["user_id"] = 1001;
                    $_SESSION["LOGGED_IN"] = true;
                    $_SESSION["email"] = $_POST["email"];
                    $_SESSION['loggedin_time'] = time();
                    header("Location:index.php");
                }
            }
        } else {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

}

$conn->close(); // closing the datbase after operations

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>sign up|Equipshare</title>
</head>
<body>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">

    <div class="card mt-5">
        <div class="card-header text-center p-3 text-uppercase">
            Sign up
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="text-center p-2 mb-3 text-capitalize">
                    <span><?php echo $message; ?></span>
                </div>
                Full Name: <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                <span class="error"><?php echo $nameErr; ?></span>
                <br><br>
                E-mail:
                <input type="email" name="email"  class="form-control" value="<?php echo $email; ?>" required>
                <span class="error"><?php echo $emailErr; ?></span>
                <br><br>
                Password:
                <input type="password" name="password" class="form-control" required>
                <span class="error"><?php echo $passwordErr; ?></span>
                <br><br>
                Confirm Password:
                <input type="password" name="confirmPassword" class="form-control" required>
                <span class="error"><?php echo $confirmPasswordErr; ?></span>

        </div>
        <div class="card-footer text-center p-3">
                <input type="submit" class="btn btn-outline-secondary" name="submit" value="sign up"> 

        </div>

            </form>
    </div>

    </div>
    <div class="col-md-3"></div>
</div>

</body>
</html>