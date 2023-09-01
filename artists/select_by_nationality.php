<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Select by Nationality - AT2 Sprint 3</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Artists by Nationality</h2>
            <button id="readButton" type="button" class="btn btn-success">Read Aloud</button> 
            <p id="status"></p>
            <?php
            $selection = $_GET['TAG'];
            echo "You filtered for: <strong class='bold-text'>$selection</strong> <br>";
            echo "Result: ";
            $statement = "SELECT * FROM artists WHERE nationality = '$selection'";
            //Table
            include_once('display.php');
            ?>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
