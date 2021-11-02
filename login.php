<?php
include_once '_include/head.php';
?>


<?php
$wrong_credentials = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field

    $email_address = $_POST['email-address'];
    $password = $_POST['password'];

    $email_error = false;
    $email_msg = "";
    $password_error = false;
    $password_msg = "";



    if (!isset($email_address)) {
        $email_error = true;
    } else if (strlen(trim($email_address)) < 5) {
        $email_error = true;
        $email_msg = "Invalid Email";
    } else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $email_msg = "Invalid email format";
        $email_error = true;
    }


    if (!isset($password)) {
        $password_error = true;
    } else if (strlen(trim($password)) < 6) {
        $password_error = true;
        $password_msg = "Invalid Password";
    }



    if ($email_error || $password_error) {
        echo "$email_msg $password_msg ";
    } else 
    if ($email_address == "root@root.com" && $password == "asdfasdf") {

        $url = "http://localhost/abdul-qadirdeveloper-NFTP_Batch2_php-master/index.php?token=\"RandomTokenKey\"";
        header("Location: $url");
    } else {
        $wrong_credentials = true;
    }
}

?>



<main class="my-form">
    <div class="cotainer">
        <div class="row  justify-content-center">
            <?php

            echo  $wrong_credentials ? '<div class="alert alert-danger" role="alert">
    Email or Password is not valid!
</div>' : null;
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 20px;">

                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form name="my-form" action="login.php" method="POST">


                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email-address" placeholder="Email Address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                            <div style="display: flex; justify-content: space-between;margin-top: 32px;">
                                <div class="">
                                    <a href="register.php" class="link-info">Don't have account? Register here</a>
                                </div>
                                <div class="">
                                    <a href="resetpassword.php" class="link-info">Forgot Password</a>
                                </div>

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