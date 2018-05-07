<?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    start session and include form class
============================================= */

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/Form.php';

/* =============================================
    validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('car-rental-form') === true) {
    // create validator & auto-validate required fields
    $validator = Form::validate('car-rental-form');

    // additional validation
    $validator->email()->validate('user-email');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['car-rental-form'] = $validator->getAllErrors();
    } else {
        $email_config = array(
            'sender_email'    => 'contact@phpformbuilder.pro',
            'sender_name'     => 'Php Form Builder',
            'recipient_email' => addslashes($_POST['user-email']),
            'subject'         => 'Php Form Builder - Car Rental Form',
            'filter_values'   => 'car-rental-form'
        );
        $sent_message = Form::sendMail($email_config);
        Form::clear('car-rental-form');
    }
}

/* ==================================================
    The Form
================================================== */

$form = new Form('car-rental-form', 'horizontal', 'novalidate', 'bs4');
$form->startFieldset('Rent a car');

/* BS4 collapse 1 */

$form->addHtml('<div id="accordion" role="tablist">
    <div class="card">
        <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Main rental informations <span class="caret"></span>
                </a>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">');

/* Form First part */

        /* Pick up */

$form->setCols(3, 4);
$form->groupInputs('pick-up-location', 'pick-up-date', 'pick-up-time');
$form->addOption('pick-up-location', 'Alabama', 'Alabama');
$form->addOption('pick-up-location', 'Alabama', 'Alabama');
$form->addOption('pick-up-location', 'Alaska', 'Alaska');
$form->addOption('pick-up-location', 'Arizona', 'Arizona');
$form->addOption('pick-up-location', 'Arkansas', 'Arkansas');
$form->addOption('pick-up-location', 'California', 'California');
$form->addOption('pick-up-location', 'Colorado', 'Colorado');
$form->addOption('pick-up-location', 'Connecticut', 'Connecticut');
$form->addOption('pick-up-location', 'Delaware', 'Delaware');
$form->addOption('pick-up-location', 'District of Columbia', 'District of Columbia');
$form->addOption('pick-up-location', 'Florida', 'Florida');
$form->addOption('pick-up-location', 'Georgia', 'Georgia');
$form->addOption('pick-up-location', 'Hawaii', 'Hawaii');
$form->addOption('pick-up-location', 'Idaho', 'Idaho');
$form->addOption('pick-up-location', 'Illinois', 'Illinois');
$form->addOption('pick-up-location', 'Indiana', 'Indiana');
$form->addOption('pick-up-location', 'Iowa', 'Iowa');
$form->addOption('pick-up-location', 'Kansas', 'Kansas');
$form->addOption('pick-up-location', 'Kentucky', 'Kentucky');
$form->addOption('pick-up-location', 'Louisiana', 'Louisiana');
$form->addOption('pick-up-location', 'Maine', 'Maine');
$form->addOption('pick-up-location', 'Maryland', 'Maryland');
$form->addOption('pick-up-location', 'Massachusetts', 'Massachusetts');
$form->addOption('pick-up-location', 'Michigan', 'Michigan');
$form->addOption('pick-up-location', 'Minnesota', 'Minnesota');
$form->addOption('pick-up-location', 'Mississippi', 'Mississippi');
$form->addOption('pick-up-location', 'Missouri', 'Missouri');
$form->addOption('pick-up-location', 'Montana', 'Montana');
$form->addOption('pick-up-location', 'Nebraska', 'Nebraska');
$form->addOption('pick-up-location', 'Nevada', 'Nevada');
$form->addOption('pick-up-location', 'New Hampshire', 'New Hampshire');
$form->addOption('pick-up-location', 'New Jersey', 'New Jersey');
$form->addOption('pick-up-location', 'New Mexico', 'New Mexico');
$form->addOption('pick-up-location', 'New York', 'New York');
$form->addOption('pick-up-location', 'North Carolina', 'North Carolina');
$form->addOption('pick-up-location', 'North Dakota', 'North Dakota');
$form->addOption('pick-up-location', 'Ohio', 'Ohio');
$form->addOption('pick-up-location', 'Oklahoma', 'Oklahoma');
$form->addOption('pick-up-location', 'Oregon', 'Oregon');
$form->addOption('pick-up-location', 'Pennsylvania', 'Pennsylvania');
$form->addOption('pick-up-location', 'Rhode Island', 'Rhode Island');
$form->addOption('pick-up-location', 'South Carolina', 'South Carolina');
$form->addOption('pick-up-location', 'South Dakota', 'South Dakota');
$form->addOption('pick-up-location', 'Tennessee', 'Tennessee');
$form->addOption('pick-up-location', 'Texas', 'Texas');
$form->addOption('pick-up-location', 'Utah', 'Utah');
$form->addOption('pick-up-location', 'Vermont', 'Vermont');
$form->addOption('pick-up-location', 'Virginia', 'Virginia');
$form->addOption('pick-up-location', 'Washington', 'Washington');
$form->addOption('pick-up-location', 'West Virginia', 'West Virginia');
$form->addOption('pick-up-location', 'Wisconsin', 'Wisconsin');
$form->addOption('pick-up-location', 'Wyoming', 'Wyoming');
$form->addSelect('pick-up-location', 'Pick up location', 'class=select2, data-width=100%, data-live-search=true, required');
$form->setCols(0, 3);
$form->addPlugin('pickadate', '#pick-up-date');
$form->addHelper('Pick-up Date', 'pick-up-date');
$form->addInput('text', 'pick-up-date', '', '', 'required');
$form->setCols(0, 2);
$form->addPlugin('pickadate', '#pick-up-time', 'pickatime');
$form->addHelper('Pick-up Time', 'pick-up-time');
$form->addInput('text', 'pick-up-time', '', '', 'required');

        /* Drop Off */

$form->setCols(3, 4);
$form->groupInputs('drop-off-location', 'drop-off-date', 'drop-off-time');
$form->addOption('drop-off-location', 'Alabama', 'Alabama');
$form->addOption('drop-off-location', 'Alabama', 'Alabama');
$form->addOption('drop-off-location', 'Alaska', 'Alaska');
$form->addOption('drop-off-location', 'Arizona', 'Arizona');
$form->addOption('drop-off-location', 'Arkansas', 'Arkansas');
$form->addOption('drop-off-location', 'California', 'California');
$form->addOption('drop-off-location', 'Colorado', 'Colorado');
$form->addOption('drop-off-location', 'Connecticut', 'Connecticut');
$form->addOption('drop-off-location', 'Delaware', 'Delaware');
$form->addOption('drop-off-location', 'District of Columbia', 'District of Columbia');
$form->addOption('drop-off-location', 'Florida', 'Florida');
$form->addOption('drop-off-location', 'Georgia', 'Georgia');
$form->addOption('drop-off-location', 'Hawaii', 'Hawaii');
$form->addOption('drop-off-location', 'Idaho', 'Idaho');
$form->addOption('drop-off-location', 'Illinois', 'Illinois');
$form->addOption('drop-off-location', 'Indiana', 'Indiana');
$form->addOption('drop-off-location', 'Iowa', 'Iowa');
$form->addOption('drop-off-location', 'Kansas', 'Kansas');
$form->addOption('drop-off-location', 'Kentucky', 'Kentucky');
$form->addOption('drop-off-location', 'Louisiana', 'Louisiana');
$form->addOption('drop-off-location', 'Maine', 'Maine');
$form->addOption('drop-off-location', 'Maryland', 'Maryland');
$form->addOption('drop-off-location', 'Massachusetts', 'Massachusetts');
$form->addOption('drop-off-location', 'Michigan', 'Michigan');
$form->addOption('drop-off-location', 'Minnesota', 'Minnesota');
$form->addOption('drop-off-location', 'Mississippi', 'Mississippi');
$form->addOption('drop-off-location', 'Missouri', 'Missouri');
$form->addOption('drop-off-location', 'Montana', 'Montana');
$form->addOption('drop-off-location', 'Nebraska', 'Nebraska');
$form->addOption('drop-off-location', 'Nevada', 'Nevada');
$form->addOption('drop-off-location', 'New Hampshire', 'New Hampshire');
$form->addOption('drop-off-location', 'New Jersey', 'New Jersey');
$form->addOption('drop-off-location', 'New Mexico', 'New Mexico');
$form->addOption('drop-off-location', 'New York', 'New York');
$form->addOption('drop-off-location', 'North Carolina', 'North Carolina');
$form->addOption('drop-off-location', 'North Dakota', 'North Dakota');
$form->addOption('drop-off-location', 'Ohio', 'Ohio');
$form->addOption('drop-off-location', 'Oklahoma', 'Oklahoma');
$form->addOption('drop-off-location', 'Oregon', 'Oregon');
$form->addOption('drop-off-location', 'Pennsylvania', 'Pennsylvania');
$form->addOption('drop-off-location', 'Rhode Island', 'Rhode Island');
$form->addOption('drop-off-location', 'South Carolina', 'South Carolina');
$form->addOption('drop-off-location', 'South Dakota', 'South Dakota');
$form->addOption('drop-off-location', 'Tennessee', 'Tennessee');
$form->addOption('drop-off-location', 'Texas', 'Texas');
$form->addOption('drop-off-location', 'Utah', 'Utah');
$form->addOption('drop-off-location', 'Vermont', 'Vermont');
$form->addOption('drop-off-location', 'Virginia', 'Virginia');
$form->addOption('drop-off-location', 'Washington', 'Washington');
$form->addOption('drop-off-location', 'West Virginia', 'West Virginia');
$form->addOption('drop-off-location', 'Wisconsin', 'Wisconsin');
$form->addOption('drop-off-location', 'Wyoming', 'Wyoming');
$form->addSelect('drop-off-location', 'Drop off location', 'class=select2, data-width=100%, data-live-search=true, required');
$form->setCols(0, 3);
$form->addPlugin('pickadate', '#drop-off-date');
$form->addHelper('Drop-off Date', 'drop-off-date');
$form->addInput('text', 'drop-off-date', '', '', 'required');
$form->setCols(0, 2);
$form->addPlugin('pickadate', '#drop-off-time', 'pickatime');
$form->addHelper('Drop-off Time', 'drop-off-time');
$form->addInput('text', 'drop-off-time', '', '', 'required');

        /* Car type */

$form->setCols(3, 9);
$form->addRadio('car-type', 'Standart Cars', 'Standart Cars');
$form->addRadio('car-type', 'Convertibles', 'Convertibles');
$form->addRadio('car-type', 'Luxury Cars', 'Luxury Cars');
$form->addRadio('car-type', 'Vans', 'Vans');
$form->addRadio('car-type', 'SUVs', 'SUVs');
$form->printRadioGroup('car-type', 'Car Type', false, 'required');

$form->addHtml('            </div> <!-- END card-body -->
        </div> <!-- END collapseOne -->
    </div> <!-- END card -->');

/* BS4 collapse 2 */

$form->addHtml('    <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Extras <span class="caret"></span>
                </a>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">');

/* Form Second part */

$form->addRadio('with', 'GPS navigation system', 'GPS navigation system');
$form->addRadio('with', 'Booster', 'Booster');
$form->addRadio('with', 'Child safety seat', 'Child safety seat');
$form->addRadio('with', 'Additional driver', 'Additional driver');
$form->printRadioGroup('with', 'With', false);
$form->addTextarea('additional-requests', '', 'Additional Requests');

$form->addHtml('            </div> <!-- END card-body -->
        </div> <!-- END collapseTwo -->
    </div> <!-- END card -->');

/* BS3 Panel 3 */

$form->addHtml('    <div class="card">
    <div class="card-header" role="tab" id="headingThree">
        <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Personal informations <span class="caret"></span>
            </a>
        </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">');

/* Form Third part */

$form->groupInputs('prefix', 'first-name', 'last-name');
$form->setCols(3, 2);
$form->addOption('prefix', 'Mr', 'Mr');
$form->addOption('prefix', 'Mrs', 'Mrs');
$form->addSelect('prefix', 'Full Name', 'required');
$form->setCols(0, 3);
$form->addInput('text', 'first-name', '', '', 'required, placeholder=First Name');
$form->setCols(0, 4);
$form->addInput('text', 'last-name', '', '', 'required, placeholder=Last Name');
$form->setCols(3, 9);
$form->addInput('email', 'user-email', '', 'E-Mail', 'required');
$form->groupInputs('area-code', 'user-phone');
$form->setCols(3, 2);
$form->addInput('text', 'area-code', '', 'Phone Number', 'required, placeholder=303, data-fv-regexp, data-fv-regexp-regexp=[+0-9-]+, data-fv-regexp-message=Please enter a valid Area Code');
$form->setCols(0, 7);
$form->addHelper('Enter a valid US phone number', 'user-phone');
$form->addInput('text', 'user-phone', '', '', 'required, placeholder=202-555-0119, data-fv-phone, data-fv-phone-country=US');

/* Close BS3 Panel */

$form->addHtml('            </div> <!-- END card-body -->
        </div> <!-- END collapseThree -->
    </div> <!-- END card -->
</div> <!-- END accordion -->');

// Custom radio & checkbox css
$form->addPlugin('nice-check', 'form', 'default', ['%skin%' => 'yellow']);

$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-success mt-4');
$form->endFieldset();

// jQuery validation
$form->addPlugin('formvalidation', '#car-rental-form', 'bs4');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Car Rental Form - Php Form Builder</title>
    <meta name="description" content="Bootstrap 4 Form Generator - how to create a Car Rental Form with Php Form Builder Class">
    <link rel="canonical" href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/car-rental-form.php" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <?php $form->printIncludes('css'); ?>
</head>
<body>
    <h1 class="text-center bg-primary">Car Rental Form</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-10">
            <?php
            if (isset($sent_message)) {
                echo $sent_message;
            }
            $form->render();
            ?>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <?php
        $form->printIncludes('js');
        $form->printJsCode();
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            /* open panel where we found the first error */
            if (!$('#collapseOne .has-error')[0] && $('#collapseThree .has-error')[0]) {
                $('#collapseOne').removeClass('in');
                $('#collapseThree').addClass('in');
            }
        });
    </script>
</body>
</html>
 