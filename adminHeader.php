<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
?>
<style>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h3>Admin</h3>
  <div class="collapse navbar-collapse" id="navbarText" style="color:#f3a400">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#LogoutModal">Log out</a>
      </li>
    </ul>
  </div>
</nav>
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