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
        <?php
        include_once('../components/navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Delete All Pending Users</h2>
            <?php
            
            $statement = "SELECT * FROM users WHERE is_pending = '1'";
           
            //Table
            include_once('display.php');
            ?>
            <!-- Are you sure? --> 
            <p class="lead">
                Are you sure you want to delete all these records?<br>
            </p>
            <a href="delete_all_status.php?id=-1" class="btn btn-outline-danger" name="delete_button_yes">Yes</a>
            <a href="delete_all_status.php?id=not_applicable" class="btn btn-outline-primary" name="delete_button_no">No</a>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
