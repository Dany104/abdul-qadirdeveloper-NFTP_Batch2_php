<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /nftp2/pages/invoiceItem/index.php?invoiceId=1");
    exit;
}
 
include_once '../../_include/DataAccess/AccountRepository.php';
include_once '../../Models/loginModel.php';

 
// Define variables and initialize with empty values
$loginModel = new LoginModel();
$username_err = $password_err = $login_err = "";
$accountRepository = new AccountRepository();
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $loginModel->username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $loginModel->password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Set parameters
        $param_username = trim($_POST["username"]);
        $user = $accountRepository->getUserByUsername($param_username);
        if($user != null){
            if(password_verify($loginModel->password, $user->password)){
                // Password is correct, so start a new session
                session_start();
                 // Store data in session variables
                 $_SESSION["loggedin"] = true;
                 $_SESSION["id"] = $user->id;
                 $_SESSION["username"] = $loginModel->username;   

                 header("location: /nftp2/pages/invoiceItem/index.php?invoiceId=1");
            } else{
                // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
            }
        }else{
            // Username doesn't exist, display a generic error message
            $login_err = "Invalid username or password.";
        }
    }
}
?>
 
 <?php 
    include_once '../../_include/head.php';
 ?>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $loginModel->username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
<?php     
include_once '../../_include/foot.php';
?>