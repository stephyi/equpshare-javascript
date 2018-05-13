<?php

session_start();

if ($_SESSION["LOGGED_IN"] != true) {
    header("location: login.php");
}

$hours = $days = $weeks = $email = $notes = "";

// =======
// saving the form details

$DBuser = "equipsha_equipsh";
$hostname = "localhost";
$password = "Admin@@2030";
$DBName = "equipsha_users";

$conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $DBName = "equipsha_equipment";
    $conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

    $equipmentname = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM equipment WHERE equipmentname = ('$equipmentname')");
    $equipment_details = mysqli_fetch_array($result);
    $lender = $equipment_details["email"];
    $image_link = $equipment_details["link"];
    $equipment_name = $equipment_details["name"];
    $equipment_description = $equipment_details["description"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hours = $_POST["hours"];
    $weeks = $_POST["weeks"];
    $email = $_POST["email"];
    $days = $_POST["days"];
    $notes = $_POST["notes"];

    $result = mysqli_query($conn, "SELECT * FROM usersdata WHERE email = ('$email')");
    $user_result = mysqli_num_rows($result);

    if ($user_result == 0) {
        $error_message = "You first need to signup";
    }

    $error_message = "";
    $DBName = "equipsha_equipment";
    $conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

    $sql = "INSERT INTO equipment_requests (email, hours, days, weeks, notes, lender, equipment_name, image_link, equipment_description) VALUES ('$email','$hours','$days','$weeks','$notes','$lender','$equipment_name','$image_link','$equipment_description')";

    mysqli_query($conn, $sql);

    header("location: services.php");

}

// ======



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/customerForm.css">
    <title>Request Form | Equipshare</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <?php 
                        echo $equipmentname; ?></div>
                    <div class="card-body">
                        <img src="services/<?php echo $equipment_details["link"]; ?>" class="img-thumbnail">
                        <h6>Product Description: </h6><p><?php echo $equipment_details["description"]; ?></p>
                        <?php 
                        if (isset($equipment_details["capacity"])) { ?>
                        <h6>Product Description: </h6><p><?php echo $equipment_details["capacity"]; ?></p>
                        <?php 
                    } ?>
                        <h6>Product Availability: </h6><p><?php echo $equipment_details["availability"]; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-4 mt-5">
                    <form class="form validate" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <?php if (isset($equipment_details["price"])) { ?>
                        <div class="d-flex d-row justify-content-between text-center">
                            <h3>Day</h3>
                            <h3 class="ml-4">Week</h2>
                            <h3>Month</h3>
                        </div>
                        <div class="d-flex d-row justify-content-between">
                            <h4>$4523</h3>
                            <h4>$5336</h4>
                            <h4>$4564</h4>
                        </div>
                        <?php 
                    } else {
                        echo "<h5 class='text-center'>Call us for prices</h5>";
                    } ?>
                        <hr>
                        <div class="form-group">
                            <p>Estimated Rental Length:</p>
                            <div class="form-inline">
                                <select class="form-control" name="hours" required>
                                    <option>Hour(s)</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option calue="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select>
                                <select class="form-control" name="days" required>
                                    <option>Day(s)</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <select class="form-control" name="weeks" required>
                                    <option>Week(s)</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Contact email (required)*" title="The domain portion of the email address is invalid (the portion after the @)." value="<?php echo $email; ?>" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="notes" id="notes" placeholder="General Notes(optional)" class="form-control"></textarea>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" value="Submit Request" class="btn btn-outline-secondary">
                        </div>
                    </form>

                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="js/validate-form.js"></script>
        <script>
        $(function() {
            $('#email').change(function(){
                $('.error-message').css("display","none");
            });
        })
    </script>
        </script>
</body>

</html>