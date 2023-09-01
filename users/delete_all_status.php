<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Delete Users - AT2 Sprint 2</title>
    </head>
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Delete Users Status</h2>
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
                    
                    $statement = "DELETE FROM users WHERE is_pending = '1'";
                    $execute = (connect()->query($statement));
                    echo "All pending records were deleted successfully! :).";
                }
            } catch (Exception $ex) {
                echo ":( Something went wrong.";
                ?>
                <img src = "../images\surprised_pikachu.png" class = "d-block" alt = "second_one">
                <?php
            }
            ?>
            <br>
            <br>
            <a href="../users/select_all_edit_delete.php" class="btn btn-link">Back to Admin Panel</a>
            
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
