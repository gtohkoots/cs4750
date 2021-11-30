<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Anh-Thu and Jack">
<meta name="description" content="New Post Page">

<title>Login</title>
<link rel="stylesheet" href="main.css" />
<link rel="stylesheet" href="postDetail.css" />
</head>

<body>
<?php include('header.php') ?>

<?php 
    // fetch topics for form later
    $cid = "";
    $topics = array();
    if(isset($_SESSION['cid'])){
        $cid = $_SESSION['cid'];
        // retreieve posts from other users
        $sql = "SELECT * FROM topic";
        $retrieve_result = execute_query($sql);
        $topics = $retrieve_result['rows_affected'];
    }
?>

<?php
$post_err = "";
$post_suc = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Make Post
    $param_cid = trim($_SESSION['cid']);
    $param_topic = trim($_POST['topic']);
    $param_time = trim($_POST['time']);
    $param_seat = trim($_POST['seat']);
    $param_detail = trim($_POST['details']);
    $sql="INSERT INTO post (`cid`, `time`, `details`, `capacity`, `tid`) VALUES (?, ?, ?, ?, ?)";
    $res = execute_query($sql,array($param_cid,$param_time,$param_detail,$param_seat,$param_topic));
    if($res['was_successful'] > 0){
        $post_suc = "Post Made Successfuly!";
    } else {
        $post_err = "Could Not Made Post!";
    }
}
?>

<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;">You're drafting a new post</p>
    <div class="content-wrapper">
        <form action="new.php" method="post">
        <div class="form-group">
            <label for="topic"><h3>Topic:</h3></label>
            <select class="form-control" name='topic' id="topic">
            <option disabled selected value> -- select a topic -- </option>
            <?php for($i = 0; $i < count($topics); $i++): ?>
                <?php echo "<option value=".$topics[$i]['tid'].">".$topics[$i]['name']."</option>" ?>
            <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="time"><h3>Time:</h3></label>
            <input type="datetime-local" name="time" id="time" class="form-control">
        </div>
        <div class="form-group">
            <label for="seat"><h3>Seat:</h3></label>
            <input type="number" name="seat" id="seat" class="form-control" placeholder="Enter seat limit here...">
        </div>
        <div class="form-group">
            <label for="details"><h3>Details:</h3></label>
            <textarea class="form-control" name="details" id="details" rows="3" placeholder="Enter details here..."></textarea>
        </div>
        <?php 
            if(!empty($post_err)){
                echo '<div class="alert alert-danger">' . $post_err . '</div>';
            }        
            if(!empty($post_suc)){
                echo '<div class="alert alert-success">' . $post_suc . '</div>';
            }        
        ?>
        <li class="list-group-item text-center">
            <input type="submit" value="Post" class="btn btn-lg">
        </li> 
        </form>
    </div>
    
</div>
</body>
</html>