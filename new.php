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
    <p class="display-4" style="color:black;">You're drafting a new post</p>
    <div class="content-wrapper">
        <form action="/action_page.php">
        <div class="form-group">
            <label for="topic"><h3>Topic:</h3></label>
            <select class="form-control" id="topic">
            <option disabled selected value> -- select a topic -- </option>
            <option value="education">Education</option>
            <option value="travel">Travel</option>
            <option value="food">Food</option>
            <option value="politics">Politics</option>
            </select>
        </div>
        <div class="form-group">
            <label for="time"><h3>Time:</h3></label>
            <input type="datetime-local" id="time" class="form-control">
        </div>
        <div class="form-group">
            <label for="seat"><h3>Seat:</h3></label>
            <input type="number" id="seat" class="form-control" placeholder="Enter seat limit here...">
        </div>
        <div class="form-group">
            <label for="details"><h3>Details:</h3></label>
            <textarea class="form-control" id="details" rows="3" placeholder="Enter details here..."></textarea>
        </div>
        <li class="list-group-item text-center">
            <input type="submit" value="Post" class="btn btn-lg">
        </li> 
        </form>
    </div>
</div>
</body>
</html>