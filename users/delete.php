<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Delete Artists - AT2 Sprint 2</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Delete Painting</h2>
            <?php
            $selection = $_GET['id'];
            $statement = "SELECT * FROM artists WHERE artist_id = '$selection'";
            $origin = "delete_artists.php";
            //Table
            include_once('display.php');
            ?>
            <!-- Are you sure? --> 
            <p class="lead">
                Are you sure you want to delete this record?<br>
            </p>
            <a href="delete_status.php?id=<?php echo $row['artist_id']; ?>" class="btn btn-outline-danger" name="delete_button_yes">Yes</a>
            <a href="delete_status.php?id=not_applicable" class="btn btn-outline-primary" name="delete_button_no">No</a>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
