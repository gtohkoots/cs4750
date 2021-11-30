<?php
    include("mysql-helper.php");
    function updateCapacity($capacity, $pid){
        $sql="UPDATE post SET capacity = ? WHERE pid = ?";
        $result = execute_query($sql,array($capacity,$pid));
        if($result['row_count'] == 1){
            echo "update success";
        }
        else {
            echo "update failed";
        }
    }
    function updateDetail($detail, $pid){
        $sql="UPDATE post SET details = ? WHERE pid = ?";
        $result = execute_query($sql,array($detail,$pid));
        if($result['row_count'] == 1){
            echo "update success";
        }
        else {
            echo "update failed";
        }        
    }
    // to check if we update capacity or details
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['updateCapacity'])) {
            updateCapacity($_POST['updateCapacity'],$_POST['pid']);
        }
        else {
            updateDetail($_POST['detail'],$_POST['pid']);
        }
    }
    else {
        echo "data update failed";
    }

?>