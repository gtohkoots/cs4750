<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="My Post">

<title>My Post</title>
<link rel="stylesheet" href="main.css" />
<link rel="stylesheet" href="editPost.css" />
</head>
<script>
    function updateCapacity(pid){
        var input = prompt("Please enter your new capacity");
        $.ajax({
            url: 'updatePost.php',
            type: 'post',
            data: { "updateCapacity": input, "pid":pid },
            success: function(response) { 
                alert(response); 
                location.reload();
            }
        });
    }
    function updateDetails(pid){
        var input = prompt("Please enter your new detail");
        $.ajax({
            url: 'updatePost.php',
            type: 'post',
            data: { "detail": input, "pid":pid },
            success: function(response) { 
                alert(response); 
                location.reload();
            }
        });
    }
</script>
<body>
<?php include('header.php') ?>
<?php 
    $pid = $_GET['pid'];
    $sql = "SELECT fname, lname, name, details, time, capacity FROM user NATURAL JOIN topic NATURAL JOIN post WHERE pid = ?";
    $result = execute_query($sql,array($pid))['rows_affected'];
?>
<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You’re viewing a post of yours</p>
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
                <button type="button" class="btn btn-lg" onclick="updateCapacity(<?php echo $pid ?>)">Update</button>
            </li>
            <li class="list-group-item">
                <h3>Details: <?php echo $result[0]["details"] ?></h3>
                <button type="button" class="btn btn-lg" onclick="updateDetails(<?php echo $pid ?>)">Update</button>
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
        </div>
    </div>
</div>
</body>
</html>