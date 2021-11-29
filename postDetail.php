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
<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're viewing a post of </p>
    <div class="content-wrapper">
        <div class="list-group">
            <li class="list-group-item">
                <h3>Topic:</h3>
            </li>
            <li class="list-group-item">
                <h3>Time: </h3>
            </li>
            <li class="list-group-item">
                <h3>Capacity: </h3>
            </li>
            <li class="list-group-item">
                <h3>Details: </h3>
            </li>
            <li class="list-group-item text-center">
                <button type="button" class="btn btn-lg">Reserve</button>
            </li> 
        </div>
    </div>
</div>
</body>
</html>