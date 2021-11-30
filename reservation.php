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
    // fetch reservations of user
    $reserv = array();
    if(isset($_SESSION['cid'])){
        $cid = $_SESSION['cid'];
        // retreieve posts from other users
        $sql = "SELECT * FROM reservation as r JOIN post as p ON r.pid=p.pid JOIN user ON p.cid=user.cid NATURAL JOIN topic WHERE r.cid = ?";
        $retrieve_result = execute_query($sql, array($cid));
        $reserv = $retrieve_result['rows_affected'];
    }
?>

<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You’re viewing the list of posts you reserved</p>
    <div class="content-wrapper">
        <form action="/action_page.php">
        <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col" style="width: 40%">Host Name</th>
            <th scope="col" style="width: 35%">Topic</th>
            <th scope="col" style="width: 15%">Time</th>
            <th scope="col" style="width: 5%">Seat</th>
            <th scope="col" style="width: 5%"></th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < count($reserv); $i++): ?>
                <tr>
                <th scope="row"><?php echo $reserv[$i]['fname'];?></th>
                <td><?php echo $reserv[$i]['name'];?></td>
                <td><?php echo $reserv[$i]['time'];?></td>
                <td><?php echo $reserv[$i]['capacity'];?></td>
                <td><input type="checkbox" id="i3" name="i3" value="i3">
                    <label for="i3"></label></td>
                </tr>
            <?php endfor; ?>
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