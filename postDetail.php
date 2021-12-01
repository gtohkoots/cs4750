<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="Main Page">

<title>Post Details</title>
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
        $post_err = $post_suc = "";
        $checksql = "SELECT * FROM reservation WHERE cid=? AND pid = ?";
        $insertsql = "insert into reservation(cid,pid) values (?,?)";
        $cid = $_SESSION['cid'];
        $param_pid = $_GET['pid'];
        $select_result = execute_query($checksql,array($cid,$pid));
        //check duplicate data
        if($select_result['row_count'] > 0){
            $post_err = "you have already reserved this event!";
        }
        else {
            //if we pass the check, insert the new record
            $insert_result = execute_query($insertsql, array($cid,$pid));
            if($insert_result['was_successful']) {
                $post_suc = "insert success!";
            }
            else {
                $post_err = $insert_result['error_info'];
            }
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
                <h3>Details: <?php echo $result[0]["details"] ?></h3>
            </li>
            <?php 
                if(!empty($post_err)){
                    echo '<div class="alert alert-danger">' . $post_err . '</div>';
                }        
                if(!empty($post_suc)){
                    echo '<div class="alert alert-success">' . $post_suc . '</div>';
                    sleep(3);
                    header("location: mainpage.php");
                }        
            ?>
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