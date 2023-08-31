<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Edit/Delete Users - AT2 Sprint 2</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Edit or Delete a User</h2>
            <?php
            $statement = "SELECT * from users";
            $origin = "select_all_edit_delete.php";
            //Calling Table
            include_once('display.php');
            ?>
            <a>
                *** Input "0" for FALSE and "1" for TRUE
            </a>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
