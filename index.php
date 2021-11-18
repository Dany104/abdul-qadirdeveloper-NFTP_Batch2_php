<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: pages/account/login.php");
    exit;
}
?>

<?php
include_once '_include/head.php';
include_once '_include/header.php';
?>


<div class="container">
    <div class="row">
        <div class="col">
            <h1>Welcome to the Invoices App!</h1> 
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="pages/invoiceItem/index.php?invoiceId=1" class="btn btn-primary">Invoice Items</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="pages/account/reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="pages/account/logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </div>
    </div>
</div>

<?php
include_once '_include/footer.php';
include_once '_include/foot.php';
?>