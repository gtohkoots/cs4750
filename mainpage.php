<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="Main Page">

<title>Home</title>
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
        $sql = "SELECT pid, cid, time, details, capacity, name FROM post NATURAL JOIN topic WHERE cid != ? ";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST['sort']==1){
                $sql = $sql." ORDER BY capacity";
            } else if ($_POST['sort']==2){
                $sql = $sql." ORDER BY capacity DESC";
            } else if ($_POST['sort']==3){
                $sql = $sql." ORDER BY time";
            } else if ($_POST['sort']==4){
                $sql = $sql." ORDER BY time DESC";
            }
        }
        $retrieve_result = execute_query($sql,array($cid));
        $posts = $retrieve_result['rows_affected'];
    }
?>
<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're viewing other users' active posts</p>
    <div class="content-wrapper">
        <form action="mainpage.php" method="post">
            <select name="sort" class="form-select form-select-lg" aria-label="Default select example">
            <option disabled selected>-- Sort Order --</option>
            <option value=1>Capacity Ascending</option>
            <option value=2>Capacity Descending</option>
            <option value=3>Time Ascending</option>
            <option value=4>Time Descending</option>
            </select>
            <input type="submit" value="Sort" class="btn btn-info">
        </form>
        <div class="list-group">
            <?php for($i = 0; $i < count($posts); $i++): ?>
                <a href="postDetail.php?pid=<?php echo $posts[$i]['pid'] ?>">
                    <li class="post-item cell">
                        <span class="first"><?php echo $posts[$i]['details'] ?></span>
                        <span>Topic: <?php echo $posts[$i]['name'] ?></span>
                        <span>Time: <?php echo $posts[$i]['time'] ?></span>
                        <span class="last">Capacity: <?php echo $posts[$i]['capacity'] ?></span>
                    </li>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>

<?php 
    $get_notif = "SELECT * FROM `notification` NATURAL JOIN `pushes` NATURAL JOIN reservation JOIN post ON reservation.pid=post.pid JOIN user ON post.cid=user.cid WHERE notifytime <= UTC_TIMESTAMP() AND `time` >= UTC_TIMESTAMP() AND reservation.cid=?";
    $notifs = execute_query($get_notif,array($_SESSION['cid']))['rows_affected'];
    $script = "";
    for($i = 0; $i < count($notifs); $i++):
        $time = new DateTime($notifs[$i]['time']);
        $now = new DateTime();
        echo $time->format("Y-m-d H:i:s");
        echo $now->format("Y-m-d H:i:s");
        $diff = $time->diff($now);
        $message = "'Your reservation for \"".$notifs[$i]['details']."\" by ".$notifs[$i]['fname']." ".$notifs[$i]["lname"]." is coming up in ".$diff->format('%h hours %i minutes and %s seconds')."!'";
        $script = $script."\nalert(".$message.");";
    endfor;
    echo "<script>window.onload = function(){ ".$script." }</script>";
?>
</body>

</html>