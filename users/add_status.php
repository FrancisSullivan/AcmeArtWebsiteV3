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
            <h2>Add Users Status</h2>
            <!-- Backend code. -->
            <?php
            // Connect.
            include_once('../components/connect.php');

            try {
                // Use POST to save form inputs to php variables.
                if (isset($_POST["subscribe_button"])) {

                    $user_name = $_POST["add_user_name"] ? $_POST["add_user_name"] : '';
                    $user_email = $_POST["add_email"] ? $_POST["add_email"] : '';
                    $subscription_monthly = isset($_POST["add_subscription_monthly"]) ? 1 : 0;
                    $subscription_breaking = isset($_POST["add_subscription_breaking_news"]) ? 1 : 0;

                     // Check for duplicate user name or email
                     $duplicateCheck = "SELECT COUNT(*) as count FROM users WHERE user_name = :user_name OR user_email = :user_email";
                     $duplicateExecute = connect()->prepare($duplicateCheck);
                     $duplicateExecute->bindValue(':user_name', $user_name);
                     $duplicateExecute->bindValue(':user_email', $user_email);
                     $duplicateExecute->execute();
                     $duplicateCount = $duplicateExecute->fetch(PDO::FETCH_ASSOC)['count'];
                    
                    
                    if ($duplicateCount > 0) {
                        echo "User Name or Email already exists.";
                    } else {
                        // Insert new record
                        $insertStatement = "INSERT INTO users (user_name, user_email, subscription_monthly, subscription_breaking_news) VALUES ('$user_name', '$user_email', '$subscription_monthly', '$subscription_breaking')";
                        $execute = (connect()->query($insertStatement));
                        echo "Record was added successfully! :).";
                    } }
                    
                    elseif (isset($_POST["unsubscribe_button"])) {
                        $user_name = $_POST["add_user_name"] ?? '';
                        $user_email = $_POST["add_email"] ?? '';
                        
                        $sql = "SELECT user_id FROM users WHERE user_name = '$user_name' AND user_email = '$user_email'";
                        $result = connect()->query($sql);
                        
                        if ($result && $result->rowCount() > 0) {
                            $user_id = $result->fetch(PDO::FETCH_ASSOC)["user_id"];
                            $updateStatement = "UPDATE users SET is_pending = 1 WHERE user_id = :user_id";
                            $updateExecute = connect()->prepare($updateStatement);
                            $updateExecute->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        
                            if ($updateExecute->execute()) {
                                echo "Unsubscribe request submitted successfully! :)";
                            } else {
                                echo "Failed to submit unsubscribe request. Please try again.";
                            }
                        } else {
                            echo "User not found. Please check your username and email.";
                    }
                }
            }   catch (Exception $ex) {
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