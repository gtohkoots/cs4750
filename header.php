<?php 
    session_start();
    if(!isset($_SESSION['login'])){
      header(location:"login.php");
    }
?>
<body>
<style>
    .nav-link {
        color:#f3a400 !important;
    }
    .nameText {
        font-weight: 400;
        font-size: 20px;
    }
    .navbar-brand {
        color:#f3a400 !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="mainpage.php">Hooshungry</a>
  <div class="collapse navbar-collapse" id="navbarText" style="color:#f3a400">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">My Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new.php">New Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reservation.php">Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Log out</a>
      </li>
    </ul>
    <span class="nameText">
      Hello, 
      <?php 
          if(isset($_SESSION['name'])){
          echo $_SESSION['name'];
        }
          else {
          echo "Guest";
        } 
      ?>
    </span>
  </div>
</nav>
</body>