<?php
include_once '_include/head.php';
?>


<?php
$linkSent = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field

    $email_address = $_POST['email-address'];


    if (isset($email_address)) {
        $linkSent = true;
    }


    $email_error = false;
    $email_msg = "";




    if (!isset($email_address)) {
        $email_error = true;
    } else if (strlen(trim($email_address)) < 5) {
        $email_error = true;
        $email_msg = "Invalid Email";
    } else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $email_msg = "Invalid email format";
        $email_error = true;
    }





    // if ($email_error) {
    //     echo "$name_msg $email_msg $password_msg $confirm_email_msg ";
    // } else {
    //     $url = "http://localhost/abdul-qadirdeveloper-NFTP_Batch2_php-master/";
    //     header("Location: $url" . "index.php");
    // }
}

?>



<main class="my-form">
    <div class="cotainer">
        <div class="row  justify-content-center">
            <?php

            echo  $linkSent ? '<div class="alert alert-success" role="alert">
 Password reset link sent to your email!
</div>' : null;
            ?>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card" style="margin-top: 24px;">

                    <div class="card-header">Forgot Password</div>
                    <div class="card-body">
                        <form name="my-form" action="resetPassword.php" method="POST">


                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Enter your email to reset your password</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email-address">
                                </div>
                            </div>



                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                    </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

<?php
include_once '_include/foot.php';
?>