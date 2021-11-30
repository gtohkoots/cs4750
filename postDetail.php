<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="Main Page">

<title>Login</title>
<link rel="stylesheet" href="main.css" />
<link rel="stylesheet" href="postDetail.css" />
</head>

<body>
<?php include('header.php') ?>
<?php
    $pid = $_GET['pid'];
    $sql = "SELECT fname, lname, name, details, time, capacity FROM user NATURAL JOIN topic NATURAL JOIN post WHERE pid = ?";
    $result = execute_query($sql,array($pid))['rows_affected'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // insert a new record to the db
        $insertsql = "insert into reservation(cid,pid) values (?,?)";
        $cid = $_SESSION['cid'];
        $param_pid = $_GET['pid'];
        echo $param_pid;
        $insert_result = execute_query($insertsql, array($cid,$pid));
        if($insert_result['was_successful']){
            echo "success";
        }
        else {
            echo $insert_result['error_info'];
        }
    }
?>
<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're viewing a post of <?php echo $result[0]["fname"] . " " .$result[0]["lname"] ?></p>
    <div class="content-wrapper">
        <div class="list-group">
            <li class="list-group-item">
                <h3>Topic: <?php echo $result[0]["name"] ?></h3>
            </li>
            <li class="list-group-item">
                <h3>Time: <?php echo $result[0]["time"] ?></h3>
            </li>
            <li class="list-group-item">
                <h3>Capacity: <?php echo $result[0]["capacity"] ?></h3>
            </li>
            <li class="list-group-item">
                <h3>Deatils: <?php echo $result[0]["details"] ?></h3>
            </li>
            <li class="list-group-item text-center">
                <form action="" method="post">
                    <button type="submit" class="btn btn-lg">Reserve</button>
                </form>
            </li> 
        </div>
    </div>
</div>
</body>
</html>