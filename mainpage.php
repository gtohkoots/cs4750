<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="Main Page">

<title>Login</title>
<link rel="stylesheet" href="mainpage.css" />
<link rel="stylesheet" href="main.css" />
</head>

<body>
<?php include('header.php') ?>
<?php 
    $cid = "";
    $posts = array();
    if(isset($_SESSION['cid'])){
        $cid = $_SESSION['cid'];
        // retreieve posts from other users
        $sql = "SELECT cid, time, details, name FROM post NATURAL JOIN topic WHERE cid != ? ";
        $retrieve_result = execute_query($sql,array($cid));
        $posts = $retrieve_result['rows_affected'];
    }
?>
<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're viewing other users' active posts</p>
    <div class="content-wrapper">
        <div class="list-group">
            <?php for($i = 0; $i < count($posts); $i++): ?>
                <li class="post-item">
                    <span><?php echo $posts[$i]['details'] ?></span>
                    <span>Topic: <?php echo $posts[$i]['name'] ?>
                </li>
            <?php endfor; ?>
        </div>
    </div>
</div>
</body>

</html>