<?php
// Ensure session is only started once
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


// Start output buffering to prevent "headers already sent" error
ob_start();

// Ensure session is started only once
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Include header after session check
include('header.php');
?>

<link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>

<?php
// Include form builder class
include('form.php');
$frm = new formBuilder;
?>

<div class="content">
    <div class="wrap">
        <div class="content-top">
            <h3>Payment</h3>
            <form action="process_booking.php" method="post" id="form1">
                <div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
                    <div class="form-group">
                        <label class="control-label">Name on Card</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Card Number</label>
                        <input type="text" class="form-control" name="number" required pattern="[0-9]{16}" title="Enter a 16-digit card number">
                    </div>      
                    <div class="form-group">
                        <label class="control-label">Expiration date</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">CVV</label>
                        <input type="text" class="form-control" name="cvv" required pattern="[0-9]{3}" title="Enter a 3-digit CVV">
                    </div>
                    <div class="form-group">
                        <!-- <button class="btn btn-success">Make Payment</button>
                         -->
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick" />
                            <input type="hidden" name="hosted_button_id" value="RD9GQ9K3ZZ9Z8" />
                            <input type="hidden" name="currency_code" value="USD" />
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Buy Now" />
                        </form>
                    </div>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
$(document).ready(function() {
    $('#form1').bootstrapValidator({
        fields: { 
            name: {
                validators: {
                    notEmpty: { message: 'The Name is required' },
                    regexp: { regexp: /^[a-zA-Z ]+$/, message: 'Only letters allowed' }
                }
            },
            number: {
                validators: {
                    notEmpty: { message: 'Card Number is required' },
                    stringLength: { min: 16, max: 16, message: 'Must be 16 digits' },
                    regexp: { regexp: /^[0-9]+$/, message: 'Only numbers allowed' }
                }
            },
            date: {
                validators: { notEmpty: { message: 'Expiration date is required' } }
            },
            cvv: {
                validators: {
                    notEmpty: { message: 'CVV is required' },
                    stringLength: { min: 3, max: 3, message: 'Must be 3 digits' },
                    regexp: { regexp: /^[0-9]+$/, message: 'Only numbers allowed' }
                }
            }
        }
    });
});
</script>
