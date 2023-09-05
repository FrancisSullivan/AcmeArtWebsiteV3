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
            <h2>Pending Unsubscription Requests:</h2>
            <?php
            $statement = "SELECT * from users_detail where is_pending = '1'";
            $origin = "select_all_pending.php";
            include('display.php') ?>
            <a>
                *** Input "0" for FALSE and "1" for TRUE 
            </a>
            <br>
            <br>
            <h2>All Users:</h2>
            <?php
            $statement = "SELECT * from users_detail";
            $origin = "select_all_edit_delete.php";
            //Calling Table
            include('display.php');
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
