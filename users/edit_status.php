<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Edit Users - AT2 Sprint 2</title>
    </head>
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Edit Users Status</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('../components/connect.php');

            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["submit_button"])) {
                    $id = $_GET["id"];                    
                    $user_email = $_POST["add_user_email"] ? $_POST["add_user_email"] : '';
                    $subscription_monthly = $_POST["add_subscription_monthly"] ? $_POST["add_subscription_monthly"] : 0;
                    $subscription_breaking_news = $_POST["add_subscription_breaking_news"] ? $_POST["add_subscription_breaking_news"] : 0;
                    $is_pending = $_POST["add_is_pending"] ? $_POST["add_is_pending"] : 0;
                    $statement = "UPDATE users_detail SET user_email = '$user_email', subscription_monthly = '$subscription_monthly', subscription_breaking_news = '$subscription_breaking_news', is_pending = '$is_pending' WHERE user_id = '$id'";
                    $execute = (connect()->query($statement));
                    echo "Record was updated successfully! :).";
                }
            } catch (Exception $ex) {
                echo "Add failed :( Something was entered incorectly. Please check that every box was filled in correctly and try again.";
                ?>
                <img src = "../images\surprised_pikachu.png" class = "d-block" alt = "second_one" width = "400" height = "350">
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