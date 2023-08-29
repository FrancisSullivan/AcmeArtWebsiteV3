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
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Delete Status</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('../components/connect.php');

            try {
                if ($_GET['id'] == "not_applicable") {
                    echo "The record was spared a painful death.";
                    ?>
                    <img src="../images\phew.jpg" class="d-block" alt="second_one">
                    <?php
                } else {
                    $id = $_GET['id'];
                    $statement = "DELETE FROM artists WHERE artist_id = '$id'";
                    $execute = (connect()->query($statement));
                    echo "Record was deleted successfully! :).";
                }
            } catch (Exception $ex) {
                echo ":( Something went wrong.";
                ?>
                <img src = "../images\surprised_pikachu.png" class = "d-block" alt = "second_one">
                <?php
            }
            ?>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
