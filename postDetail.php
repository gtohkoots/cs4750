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
<?php 
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'student'){
        include('header.php');
    }
    else {
        include('adminHeader.php');
    }
?>
<?php
    $pid = $_GET['pid'];
    $sql = "SELECT cid, fname, lname, name, details, time, capacity FROM user NATURAL JOIN topic NATURAL JOIN post WHERE pid = ?";
    $result = execute_query($sql,array($pid))['rows_affected'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // insert a new record to the db
        $post_err = $post_suc = "";
        $checksql = "SELECT * FROM reservation WHERE cid=? AND pid = ?";
        $insertsql = "INSERT INTO reservation(cid,pid) values (?,?)";
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
                // if notif checked also add to pushes and notification
                if($_POST['notif']) {
                    $getemailsql = "SELECT email FROM user_email WHERE cid=?";
                    $param_email = execute_query($getemailsql, array($cid))['rows_affected'][0]['email'];
                    $time = new DateTime($result[0]["time"]);
                    $time->modify("-1 day");
                    $notifsql = "INSERT INTO `notification` (notifytime, cid, email) VALUES (?, ?, ?)";
                    $notif_res = execute_query($notifsql, array($time->format("Y-m-d H:i:s"), $cid, $param_email));

                    $rid = execute_query("SELECT rid FROM reservation WHERE cid=? AND pid=?", array($cid,$pid))['rows_affected'][0]['rid'];
                    $nid = execute_query("SELECT nid FROM `notification` WHERE notifytime=? AND cid=? AND email=?", array($time->format("Y-m-d H:i:s"), $cid, $param_email))['rows_affected'][0]['nid'];

                    execute_query("INSERT INTO pushes values (?,?)", array($rid, $nid));
                }
                $post_suc = "insert success!";
            }
            else {
                $post_err = $insert_result['error_info'];
            }
        }
    }
?>

<?php 
    // fetch report_deduction for form later
    $report_cat = array();
    // retreieve posts from other users
    $sql = "SELECT report_cat FROM reports_deduction";
    $retrieve_result = execute_query($sql);
    $report_cat = $retrieve_result['rows_affected'];
?>

<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're viewing a post of <?php echo $result[0]["fname"] . " " .$result[0]["lname"] ?></p>
    <div class="content-wrapper">
        <ul class="list-group">
            <li class="list-group-item list-group-item2">
                <h3>Topic: <?php echo $result[0]["name"] ?></h3>
            </li>
            <li class="list-group-item list-group-item2">
                <h3>Time: <?php echo $result[0]["time"] ?></h3>
            </li>
            <li class="list-group-item list-group-item2">
                <h3>Capacity: <?php echo $result[0]["capacity"] ?></h3>
            </li>
            <li class="list-group-item list-group-item2">
                <h3>Details: <?php echo $result[0]["details"] ?></h3>
            </li>
            <?php 
                if(!empty($post_err)){
                    echo '<div class="alert alert-danger">' . $post_err . '</div>';
                }        
                if(!empty($post_suc)){
                    echo '<div class="alert alert-success">' . $post_suc . '</div>';
                }      
            ?>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'student'){ ?>
                <li class="list-group-item text-center" style="background-color: inherit">
                    <form action="" method="post">
                        <!-- <input type="checkbox" class="form-check-input" id="notif"> -->
                        <input name="notif" type="checkbox" style="width:5vh; height:5vh;" id="notif">
                        <p>(Check box to receive notification)</p>
                        <button type="submit" class="btn btnn btn-lg">Reserve
                        </button>
                        <button type="button" class="btn btnnn btn-lg btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Report User
                        </button>
                        
                        
                    </form>
                </li> 

                <!-- Button trigger modal -->

                <!-- Modal -->
            <?php } ?>
        </ul>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Report a User</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="report.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="topic">Reason</label>
                    <select class="form-control" name='topic' id="topic">
                    <option disabled selected value> -- select a reason -- </option>
                    <?php for($i = 0; $i < count($report_cat); $i++): ?>
                        <?php echo "<option value=".$report_cat[$i]['report_cat'].">".$report_cat[$i]['report_cat']."</option>" ?>
                    <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="topic">Comments</label>
                    <input class="form-control" name="reason" type="text"></input>
                </div>
                <input hidden name="cid1" value=<?php echo $_SESSION['cid']; ?> type="text"></input>
                <input hidden name="cid2" value=<?php echo $result[0]['cid']; ?> type="text"></input>
                <input hidden name="date" value=<?php echo date('Y-m-d\TH:i:s'); ?> type="datetime-local"></input>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit Report</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>