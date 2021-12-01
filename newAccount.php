<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Anh-Thu and Jack">
<meta name="description" content="New Post Page">

<title>New Account</title>
<link rel="stylesheet" href="main.css" />
<link rel="stylesheet" href="postDetail.css" />
</head>

<body>

<?php
$account_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Make User
    $param_cid = trim($_POST['cid']);
    $param_fname = trim($_POST['fname']);
    $param_lname = trim($_POST['lname']);
    $param_pwd = trim($_POST['pwd']);
    $sql="INSERT INTO user VALUES (?, ?, ?, 0, ?, 'student')";
    $res = execute_query($sql,array($param_cid,$param_fname,$param_lname,$param_pwd));
    if($res['was_successful'] > 0){
        $param_email = trim($_POST['email']);
        $sql="INSERT INTO user_email VALUES (?, ?)";
        $res = execute_query($sql,array($param_cid,$param_email));
        if($res['was_successful'] > 0){
            $param_phone = trim($_POST['tel']);
            $sql="INSERT INTO user_phonenumber VALUES (?, ?)";
            $res = execute_query($sql,array($param_cid,$param_phone));
            if($res['was_successful'] > 0){
                session_start();
                $_SESSION['login'] = True;
                $_SESSION['role'] = 'student';
                $_SESSION['cid'] = $param_cid;
                $_SESSION['name'] = $param_lname;
                header( "location:mainpage.php" );
            } else {
                $account_err = "Could Not Add Phone Number";
            }
        }  else {
            $account_err = "Could Not Add Email";
        }

    } else {
        $account_err = "Could Not Make User!";
    }
}
?>

<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're creating a new account</p>
    <div class="content-wrapper">
        <form action="newAccount.php" method="post">
        <div class="form-group">
            <label for="cid"><h3>Computing ID:</h3></label>
            <input type="text" name="cid" id="cid" class="form-control" placeholder="(e.g., mst3k)">
        </div>
        <div class="form-group">
            <label for="pwd"><h3>Password:</h3></label>
            <input type="password" name="pwd" id="pwd" class="form-control">
        </div>
        <div class="form-group">
            <label for="fname"><h3>First Name:</h3></label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name here...">
        </div>
        <div class="form-group">
            <label for="lname"><h3>Last Name:</h3></label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name here...">
        </div>
        <div class="form-group">
            <label for="email"><h3>Email:</h3></label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email here...">
        </div>
        <div class="form-group">
            <label for="tel"><h3>Telephone:</h3></label>
            <input type="tel" name="tel" id="tel" class="form-control" placeholder="Enter your telephone number here...">
        </div>
        <?php 
            if(!empty($account_err)){
                echo '<div class="alert alert-danger">' . $account_err . '</div>';
            }     
        ?>
        <li class="list-group-item text-center">
            <input type="submit" value="Make Account!" class="btn btnn btn-lg">
        </li> 
        </form>
    </div>
    
</div>
</body>
</html>