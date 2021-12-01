<?php
include("common-head.php"); 
include("mysql-helper.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Make Post
    print_r($_POST);
    session_start();
    print_r($_SESSION);
    $param_cid1 = trim($_POST['cid1']);
    $param_cid2 = trim($_POST['cid2']);
    $param_date = trim($_POST['date']);
    $param_topic = trim($_POST['topic']);
    $param_reason = trim($_POST['reason']);
    $sql="INSERT INTO reports VALUES (?, ?, ?, ?, ?)";
    $res = execute_query($sql,array($param_cid1,$param_cid2,$param_topic,$param_reason,$param_date));
    if($res['was_successful'] > 0){
        header("location:mainpage.php");
    } else {
        echo "Could Not Made Post!";
        print_r($res);
    }
}
?>