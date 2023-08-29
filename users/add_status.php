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
            <h2>Add Painting Status</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('../components/connect.php');

            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["submit_button"])) {

                    $user_name = $_POST["add_user_name"] ?? '';
                    $user_email = $_POST["add_email"] ?? '';
                    $subscription_monthly = isset($_POST["add_subscription_monthly"]) ? 1 : 0;
                    $subscription_breaking = isset($_POST["add_subscription_breaking_news"]) ? 1 : 0;

                    }
                    $statement = "INSERT INTO users (user_name, user_email, subscription_monthly, subscription_breaking_news) VALUES ('$user_name', '$user_email', '$subscription_monthly', '$subscription_breaking')";
                    $execute = (connect()->query($statement));
                    echo "Record was added successfully! :).";
                }
             catch (Exception $ex) {
                echo "Add failed :( Something was entered incorectly. Please check that every box was filled in correctly and try again.";
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