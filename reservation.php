<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="Main Page">

<title>Reservation</title>
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

<?php
// $post_err = "";
// $post_suc = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach ($_POST as $rid => $value) {
        $sql = "DELETE FROM reservation WHERE rid = ?";
        execute_query($sql, array($rid));
    }
    header("Refresh:0");
    // Make Post
    // $param_cid = trim($_SESSION['cid']);
    // $param_topic = trim($_POST['topic']);
    // $param_time = trim($_POST['time']);
    // $param_seat = trim($_POST['seat']);
    // $param_detail = trim($_POST['details']);
    // $sql="INSERT INTO post (`cid`, `time`, `details`, `capacity`, `tid`) VALUES (?, ?, ?, ?, ?)";
    // $res = execute_query($sql,array($param_cid,$param_time,$param_detail,$param_seat,$param_topic));
    // if($res['was_successful'] > 0){
    //     $post_suc = "Post Made Successfuly!";
    // } else {
    //     $post_err = "Could Not Made Post!";
    // }
}
?>

<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You’re viewing the list of posts you reserved</p>
    <div class="content-wrapper">
        <form action="reservation.php" method="post">
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
                <th scope="row" onclick="window.location='postDetail.php?pid=<?php echo $reserv[$i]['pid'] ?>';"><?php echo $reserv[$i]['fname'];?></th>
                <td onclick="window.location='postDetail.php?pid=<?php echo $reserv[$i]['pid'] ?>';"><?php echo $reserv[$i]['name'];?></td>
                <td onclick="window.location='postDetail.php?pid=<?php echo $reserv[$i]['pid'] ?>';"><?php echo $reserv[$i]['time'];?></td>
                <td onclick="window.location='postDetail.php?pid=<?php echo $reserv[$i]['pid'] ?>';"><?php echo $reserv[$i]['capacity'];?></td>
                <td> <?php echo "<input type='checkbox' id=".$reserv[$i]['rid']." name=".$reserv[$i]['rid'].">"?>                
                    <label for="i3"></label>
                </tr>
            <?php endfor; ?>
        </tbody>
        </table>
        <li class="list-group-item text-center">
            <button type="submit" class="btn btnn btn-lg">Cancel selected reservation(s)</button>
        </li> 
        </form>
    </div>
</div>
</body>
</html>