<?php 

session_start();

$LemailErr = $LpasswordErr = $message = $Lemail = $Lpassword = $_password = "";

// database variables 
$servername = "localhost";
$username = "equipsha_equipsh";
$password = "Admin@@2030";
$DBName = "equipsha_users";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $DBName);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Lpassword"])) {
        $LpasswordErr = "password cannot be blank";
    } else {
        $password = $_POST["Lpassword"];
        $_password = $password;
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
    $result = mysqli_query($conn, "SELECT * FROM usersData WHERE email= ('$Lemail')  and password = ('$_password')");
    $count = mysqli_num_rows($result);
    if ($count <= 0) {
        $message = "user does not exist";
    } else {
        $_SESSION["user_id"] = 1001;
        $_SESSION["LOGGED_IN"] = true;
        $_SESSION["email"] = $_POST["Lemail"];
        $_SESSION['loggedin_time'] = time();
        $url = $_SESSION['url'];
        header("location: $url");
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
<title>Login | Equipshare</title>
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

                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form validate">
                    <div class="text-center login-error">
                        <br>
                        <span class="text-danger"><?php echo $message; ?></span>
                    </div>
                    <div class="card-body">

                        <div class="form-group email-input">
                            
                            <br>
                            <label for="Lemail" class="login-label">
                                E-mail:
                            </label>
                             
                            <input type="email" name="Lemail" id="email" value="<?php echo $Lemail; ?>" class="form-control" placeholder="example@email.com" title="The domain portion of the email address is invalid (the portion after the @)."  pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
                            <div class="text-center">
                                <span class="error-message text-center"><?php echo $LemailErr; ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <br>
                            <label for="Lpassword" class="login-label">
                                Password:
                            </label>
                            <a href="#" class="login-a">Forgot your password?</a>
                            <input type="password" name="Lpassword" id="password" class="form-control"  required>
                            <div class="text-center">
                                <span class="error-message"><?php echo $LpasswordErr; ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <input class="btn btn-outline-secondary" type="submit" value="Login">
                            <a href="signup.php" class="login-a sign-up-login-button text-center"> or sign up</a>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="js/validate-form.js"></script>
    <script>
        $(function() {
           
            $('#email').change(function(){
                $('.email-input>.error-message').css("display","none");
            });
            $('#password').change(function(){
                $('.password-input>.error-message').css("display","none");
            });


            
        });
    </script>
</body>
</html>