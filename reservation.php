<!DOCTYPE html>
<html>
    <?php
    include("common-head.php"); 
    include("mysql-helper.php");
    ?>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <header>
            <form action="/action_page.php">
                <fieldset>
                    <legend>You are viewing the list of posts you reserved</legend>
                    <div class="row">
                        <div class="nameCol">Host Name
                        <br>Dummy<br>
                        </div>
                        <div class="topicCol">Topic
                            <br>Dummy<br>
                        </div>
                        <div class="timeCol">Time
                        <br>Dummy<br>
                        </div>
                        <div class="seatCol">Seat
                        <br>Dummy<br>
                        </div>
                        <div class="selectCol">
                            <br><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"></label><br>
                        </div>
                    </div>
                    <br><br>
                    <input type="submit" value="Delete">
                </fieldset>
            </form>
        </header>
    </body>
</html>