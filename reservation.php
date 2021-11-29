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
    <p class="display-4" style="color:black;">You’re viewing the list of posts you reserved</p>
    <div class="content-wrapper">
        <form action="/action_page.php">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" style="width: 40%">Host Name</th>
            <th scope="col" style="width: 35%">Topic</th>
            <th scope="col" style="width: 15%">Time</th>
            <th scope="col" style="width: 5%">Seat</th>
            <th scope="col" style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">A</th>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Otto</td>
            <td><input type="checkbox" id="i1" name="i1" value="i1">
                <label for="i1"></label></td>
            </tr>
            <tr>
            <th scope="row">J</th>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Otto</td>
            <td><input type="checkbox" id="i2" name="i2" value="i2">
                <label for="i2"></label></td>
            </tr>
            <tr>
            <th scope="row">L</th>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>Otto</td>
            <td><input type="checkbox" id="i3" name="i3" value="i3">
                <label for="i3"></label></td>
            </tr>
        </tbody>
        </table>
        <li class="list-group-item text-center">
            <button type="button" class="btn btn-lg">Cancel selected reservation(s)</button>
        </li> 
        </form>
    </div>
</div>
</body>
</html>