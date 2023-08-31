<!DOCTYPE html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Add new users - AT2 Sprint 2</title>
    </head>
    <!-- Body. -->
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Sign Up to Acme: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="add_status.php" method="post" enctype="multipart/form-data">
                <!-- artist_name. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_user_name" style="width: 110px;">User Name</span>
                    <input type="text" class="form-control" placeholder="e.g. 'johnn123'" aria-label="user_name" aria-describedby="add_user_name" name="add_user_name">
                </div>                
                <!-- lifespan. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_email" style="width: 110px;">Email </span>
                    <input type="text" class="form-control" placeholder="e.g. 'johnn123@gmail.com'" aria-label="email" aria-describedby="add_email" name="add_email">
                </div>
                <!-- newsletter. -->
                <div class="input-group mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="add_subscription_monthly_checkbox" name="add_subscription_monthly" value="true">
                    </div>
                    <div>Do you want to subscribe to ACME monthly newsletter?</div>
                </div>
                <!-- breaking news. -->
                <div class="input-group mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="add_subscription_breaking_news_checkbox" name="add_subscription_breaking_news" value="true">
                    </div>
                    <div>Do you want to subscribe to ACME breaking news?</div>
                </div>

                <!-- Save. -->
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" type="submit" name="submit_button">Submit</button>
                </div>
            </form>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
        </div>
    </body>
</html>
