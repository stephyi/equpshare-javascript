<?php 
session_start();

$cookie_name = "";
$cookie_value = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cookie_name = "user";
    $cookie_value = $_POST["name"];
    $_SESSION["name"] = $_POST["name"];
}

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 is 1 day

// defining the variables
$nameErr = $passwordErr = $emailErr = "";
$confirmPassword = "";
$name = $password = $email = "";
$confirmPassword = $_POST["confirm-password"];
$password = $_POST["password"];


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


// defining if the user is already registered message
$message = " ";

// handling the form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["FName"]) || empty($_POST["SName"])) {
        $nameErr = "name cannot be blank";
    } else {
        $FName = $_POST["FName"];
        if (!preg_match("/^[a-zA-Z ]*$/", $FName)) {
            $nameErr = "Only letters and white space allowed";
        }
        $SName = $_POST["SName"];
        if (!preg_match("/^[a-zA-Z ]*$/", $SName)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "password cannot be blank";
    }
    if ($password == $confirmPassword) {
        $_password = md5($_POST["password"]);
    } else {
        header("location:signup.php");
        $passwordErr = "passwords do not match";

    }

    if (empty($_POST["email"])) {
        $emailErr = "email cannot be blank";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    $name = $FName . $SName;

    //adding data into the database
    $sql = "INSERT INTO usersData (name, email, password)
    VALUES ('$name', '$email', '$password')";

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
            $message = "you have successfully signed up";
            $_SESSION["user_id"] = 1001;
            $_SESSION["LOGGED_IN"] = true;
            $_SESSION["name"] = $_POST["name"];
            $_SESSION['loggedin_time'] = time();
            header("Location:index.php");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Login | Equipshare</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="login-body">
    <div class="row">
        <div class="col-md-4 col-sm-1"></div>
        <div class="col-md-5">
                <div class="card " id="signup">
                    <div class="card-header">
                        <h4 class="text-center mx-auto text-uppercase">Sign up</h4>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                            <?php echo $nameErr; ?>
                            <label for="first-name">First name</label>
                            <input type="text" class="form-control" name="FName" placeholder="John" required>
                            <label for="second-name">Second name</label>
                            <input type="text" class="form-control" name="SName" placeholder="Doe" required>
                            <?php echo $emailErr; ?>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                            <?php echo $passwordErr; ?>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <label for="confirm-password">Confirm password</label>
                            <input type="password" class="form-control" name="confirm-password" required>
                            <br/>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-outline-secondary" type="submit">sign up</button>

                                </div>

                                <div class="col-md-4"></div>

                            </div>
                        </form>
                    </div>
                </div>
        </div>
         <div class="col-md-3"></div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>