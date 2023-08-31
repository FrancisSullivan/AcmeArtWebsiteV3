<!DOCTYPE html>
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
    <!-- Body. -->
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE user_id = :id";
            $stmt = connect()->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    // Populate variables with fetched data
                    $user_name = isset($row['user_name']) ? $row['user_name'] : '';
                    $user_email = isset($row['user_email']) ? $row['user_email'] : '';
                    $subscription_monthly = isset($row['subscription_monthly']) ? $row['subscription_monthly'] : '';
                    $subscription_breaking_news = isset($row['subscription_breaking_news']) ? $row['subscription_breaking_news'] : '';
                    $is_pending = isset($row['is_pending']) ? $row['is_pending'] : '';

                } else {
                    echo "No data found for ID: $id";
                }
            } else {
                echo "Query failed: " . $stmt->errorInfo()[2];
            }
        }
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Edit painting: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="edit_status.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                <!-- User Name. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_user_name" style="width: 110px;">User Name</span>
                    <input type="text" class="form-control" placeholder="eg. johnny123" aria-label="user_name" aria-describedby="add_user_name" name="add_user_name" value="<?php echo $user_name; ?>">
                </div>

                <!-- User Email. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_user_email" style="width: 110px;">User Email</span>
                    <input type="text" class="form-control" placeholder="eg. johnny123@gmail.com" aria-label="user_email" aria-describedby="add_user_emaile" name="add_user_email" value="<?php echo $user_email; ?>">
                </div>
                <!-- Subscription to Monthly News. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_subscription_monthly" style="width: 300px;">Subscription to Monthly News</span>
                    <input type="text" class="form-control" placeholder="Insert '1' for TRUE or '0' for FALSE" aria-label="subscription_monthly" aria-describedby="add_subscription_monthly" name="add_subscription_monthly" value="<?php echo $subscription_monthly; ?>">
                </div>
                <!-- Subscription to Breaking News. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_subscription_breaking_news" style="width: 300px;">Subscription to Breaking News</span>
                    <input type="text" class="form-control" placeholder="Insert '1' for TRUE or '0' for FALSE" aria-label="subscription_breaking_news" aria-describedby="add_subscription_breaking_news" name="add_subscription_breaking_news" value="<?php echo $subscription_breaking_news; ?>">
                </div>
                <!-- User Pending Unsubscribed. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_is_pending" style="width: 300px;">Is User Pending Unsubscription?</span>
                    <input type="text" class="form-control" placeholder="Insert '1' for TRUE or '0' for FALSE" aria-label="is_pending" aria-describedby="add_is_pending" name="add_is_pending" value="<?php echo $is_pending; ?>">
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
