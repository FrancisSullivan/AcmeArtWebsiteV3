<!doctype html>
<html lang="en">
    <!-- Connect. -->
    <?php
    include_once('../components/connect.php');
    $result = (connect()->query($statement));
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <body>
        <!-- Table. --> 
        <table class="table">
            <thead>
                <tr>
                    <!-- Headers. --> 
                    <th>ID</th>
                    <th>User_Email</th>
                    <th>Subscription to Monthly Newsletter</th>
                    <th>Subscription to Breaking News</th>
                    <th>Pending Unsubscription</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <!-- Content. --> 
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['subscription_monthly']; ?></td>
                        <td><?php echo $row['subscription_breaking_news']; ?></td>
                        <td><?php echo $row['is_pending']; ?></td>
                        <?php
                        if (isset($origin) && $origin == "select_all_edit_delete.php") {
                                            ?>
                        <td>
                        <a href="edit.php?id=<?php echo $row['user_id']; ?>" class="btn btn-outline-primary" name="edit_button">Edit</a>
                        <a href="delete.php?id=<?php echo $row['user_id']; ?>" class="btn btn-outline-danger" name="delete_button">Delete</a>
                        </td>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if (isset($origin) && $origin == "select_all_pending.php") {
                                            ?>
                        <td>
                        <a href="edit.php?id=<?php echo $row['user_id']; ?>" class="btn btn-outline-primary" name="edit_button">Edit</a>
                        <a href="delete.php?id=<?php echo $row['user_id']; ?>" class="btn btn-outline-danger" name="delete_button">Delete</a>
                        </td>

                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
                ?>
                              
            </tbody>
            </table>
            <?php
                        if (isset($origin) && $origin == "select_all_pending.php") {
                                            ?>
                        <div class="d-flex justify-content-center align-items-center">
                        <a href="delete_all.php?id=<?php echo $row['user_id']; ?>" class="btn btn-outline-danger" name="delete_button">Delete All Pending Users</a>
                        </div>
                        <?php
                        }
                        ?>
    </body>
</html>