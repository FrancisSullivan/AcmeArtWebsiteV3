<!DOCTYPE html>
<html lang="en">
    <!--Head.-->
    <head>
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <title>Login to Adminstration Tools</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
    <div class="container-fluid">
            <!-- Heading. -->
            <h2>Login to Adminstration: </h2>
            <form action="log_in_status.php" method="post" enctype="multipart/form-data">
                <!-- artist_name. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_admin_username" style="width: 110px;">Username</span>
                    <input type="text" class="form-control" placeholder="e.g. 'admin'" aria-label="admin_username" aria-describedby="add_admin_username" name="add_admin_username" required>
                </div>                
                <!-- lifespan. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_admin_password" style="width: 110px;">Password</span>
                    <input type="password" class="form-control" placeholder="e.g. 'password'" aria-label="admin_password" aria-describedby="add_admin_password" name="add_admin_password" required>
                </div>
                <!-- Save. -->
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" type="submit" name="login_button">Login</button>
                </div>
                
            </form>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>

        
    </body>
</html>
