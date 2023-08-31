<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Add Artists- AT2 Sprint 2</title>
    </head>
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Admin Panel Status</h2>
            <!-- Backend code. -->
            
            <?php
            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["login_button"])) {

                    $admin_username = $_POST["add_admin_username"];
                    $admin_password = $_POST["add_admin_password"];

                    $adminUsername = "kingrabbitadmin1";
                    $adminPassword = "p@ssw0rd123";
                    

                    if ($admin_username === $adminUsername && $admin_password === $adminPassword) {
                        // Redirect to the admin panel
                        echo '<script>window.location.href="../users/select_all_edit_delete.php";</script>';

                        // header("Location: ../users/select_all_edit_delete.php");
                        exit();
                    } else {
                        echo "Invalid username or password.";
                    }
                }

                }
             catch (Exception $ex) {
                echo "Failed to login. Invalid username and password";
                ?>
                <img src = "../images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
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