<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

    <meta name="author" content="Ketian Tu">
    <meta name="description" content="Login User">

    <title>Login</title>
    <link rel="stylesheet" href="login.css" />
</head>
<?php
// session start
session_start();

if(isset($_SESSION['login']) && $_SESSION['role'] == 'student')
{
    header("location: mainpage.php");
    exit;
}
else if(isset($_SESSION['login']) && $_SESSION['role'] == 'admin'){
    header("location: adminPage.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$login_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validate credential
    $param_cid = trim($_POST["cid"]);
    $param_pwd = trim($_POST['password']);
    $sql="SELECT * FROM user WHERE cid = ? AND pwd = ?";
    $login_result = execute_query($sql,array($param_cid,$param_pwd));
    //check if a valid user exist
    if($login_result['row_count'] > 0){
        //update session, check user role
        if($login_result['rows_affected'][0]['role'] == "student") {
            $_SESSION['login'] = True;
            $_SESSION['role'] = 'student';
            $_SESSION['cid'] = $param_cid;
            $_SESSION['name'] = $login_result['rows_affected'][0]['lname'];
            header("location: mainpage.php");
        }
        else {
            $_SESSION['login'] = True;
            $_SESSION['role'] = 'admin';
            $_SESSION['cid'] = $param_cid;
            $_SESSION['name'] = $login_result['rows_affected'][0]['lname'];
            header("location: adminPage.php");
        }
    }
    else {
        $login_err = "Invalid username or password";
    }
}

?>
<body>
    <div class="login-dark">
            <form class="login-form was-validated" action="login.php" method="post">
                <h2>User Login</h2>
                <div class="mb-3">
                    <input type="text" class="form-control" name="cid" placeholder="computing id" required/>
                    <div class="invalid-feedback">Computing Id Required</div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="password" required/>
                    <div class="invalid-feedback">Password Required</div>
                </div>
                <div class="mb-3">
                    <button class ="btn btn-primary d-block w-100" type="submit">Log In</button>
                </div>
                <div class="mb-3">
                    <p style='text-align:center'>Don't Have an Account?</p>
                    <a class ="btn btn-warning d-block w-100" href="newAccount.php">Create Account</a>
                </div>
            </form>
            <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
            ?>
    </div>
</body>
</html>
