<html>
<?php
include("common-head.php"); 
include("mysql-helper.php");
?>
<head>

<meta name="author" content="Ketian Tu">
<meta name="description" content="Main Page">

<title>Login</title>
<link rel="stylesheet" href="mainpage.css" />
<link rel="stylesheet" href="main.css" />
</head>
<body>
<?php include("adminHeader.php") ?>
<?php 
    $posts = array();
    $sql = "SELECT pid, cid, time, details, name FROM post NATURAL JOIN topic";
    $retrieve_result = execute_query($sql);
    $posts = $retrieve_result['rows_affected']; 
?>
<div class="container-fluid app-wrapper">
    <div class="white-bar"></div>
    <p class="display-4" style="color:black;"><?php echo $_SESSION['name']?>, You're viewing all the posts</p>
    <div class="content-wrapper">
        <div class="list-group">
            <?php for($i = 0; $i < count($posts); $i++): ?>
                <a href="postDetail.php?pid=<?php echo $posts[$i]['pid'] ?>">
                    <li class="post-item">
                        <span><?php echo $posts[$i]['details'] ?></span>
                        <span>Topic: <?php echo $posts[$i]['name'] ?></span>
                    </li>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>
</body>
</html>