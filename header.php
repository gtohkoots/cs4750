<?php 
    if(!isset($_SESSION['login'])){
      header("location:login.php");
    }
?>
<body>
<style>
    .nav-link {
        color:#1f66ad !important;
        font-weight: bold;
    }
    .nameText {
        font-weight: 400;
        font-size: 20px;
    }
    .navbar-brand {
        color:#1f66ad !important;
    }
    .modal-footer .btn {
      background-color: cadetblue;
    }
</style>
<script>
  function logout(){
    $.ajax({
            url: 'logout.php',
            type: 'post',
            success: function(response) { 
                alert(response); 
                location.reload();
            }
    });
  }
</script>
<nav class="navbar navbar-expand-lg navbar-white bg-white">
  <div style = "width: 5%;">
  <a class="navbar-brand" href="mainpage.php">
    <img src="image/hooshangrylogo.png" alt="Hoo's Hangry" 
    style = "max-width: 100%; max-height: 100%; display: block;" class="profileImg">
    <!-- <img alt="Hoo's Hangry" src="image/hooshangrylogo.png" class="img-responsive"/> -->
  </a>
</div>
  <div class="collapse navbar-collapse" id="navbarText" style="color:#f3a400">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="myPost.php">My Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new.php">New Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reservation.php">Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#LogoutModal">Log out</a>
      </li>
    </ul>
    <span class="nameText" style="color:#1f66ad; font-weight: bold;">
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
    <!-- Modal -->
    <div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="LogoutModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" onclick="logout()">Yes</button>
                </div>
            </div>
        </div>
    </div>
</body>