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
                    <legend>You are drafting a new post</legend>
                    <label for="topic">Topic:</label>
                    <select id="topic" name="topic">
                    <option disabled selected value> -- select a topic -- </option>
                    <option value="education">Education</option>
                    <option value="travel">Travel</option>
                    <option value="food">Food</option>
                    <option value="politics">Politics</option>
                    </select><br><br>
                    <label for="time">Time:</label>
                    <input type="datetime-local" id="time" name="time"><br><br>
                    <label for="seat">Seat:</label>
                    <input type="number" id="seat" name="seat" min="1" max="10" placeholder="Enter seat limit here...""><br><br>
                    <label for="details">Details:</label><br>
                    <textarea name="message" rows="10" cols="70" placeholder="Enter details here..."></textarea></label><br><br>
                    <!-- <input type="text" id="details" name="details"><br><br> -->
                    <input type="submit" value="Post">
                </fieldset>
            </form>
        </header>
    </body>
</html>