<!DOCTYPE html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Edit Artists - AT2 Sprint 2</title>
    </head>
    <!-- Body. -->
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM artists WHERE artist_id = :id";
            $stmt = connect()->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    // Populate variables with fetched data
                    $artist_name = isset($row['artist_name']) ? $row['artist_name'] : '';
                    $lifespan = isset($row['lifespan']) ? $row['lifespan'] : '';
                    $period = isset($row['period']) ? $row['period'] : '';
                    $nationality = isset($row['nationality']) ? $row['nationality'] : '';
                    $thumbnail = isset($row['thumbnail']) ? $row['thumbnail'] : '';
                    $full_pic = isset($row['full_pic']) ? $row['full_pic'] : '';
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
            <h2>Edit Artist: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="edit_status.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                <!-- title. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_artist_name" style="width: 110px;">Artist Name</span>
                    <input type="text" class="form-control" placeholder="artist_name" aria-label="artist_name" aria-describedby="add_artist_name" name="add_artist_name" value="<?php echo $artist_name; ?>">
                </div>
                <!-- artist. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_lifespan" style="width: 110px;">Lifespan</span>
                    <input type="text" class="form-control" placeholder="lifespan" aria-label="lifespan" aria-describedby="add_lifespan" name="add_lifespan" value="<?php echo $lifespan; ?>">
                </div>
                <!-- style. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_period" style="width: 110px;">Period</span>
                    <input type="text" class="form-control" placeholder="period" aria-label="period" aria-describedby="add_period" name="add_period" value="<?php echo $period; ?>">
                </div>
                <!-- media. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_nationality" style="width: 110px;">Nationality</span>
                    <input type="text" class="form-control" placeholder="nationality" aria-label="nationality" aria-describedby="add_nationality" name="add_nationality" value="<?php echo $nationality; ?>">
                </div>
                <!-- finished. -->
                
                <!--the file input field itself cannot be pre-filled with a default value pointing to a local file on the user's machine due to browser security restrictions.-->
                <!-- thumbnail. -->
                <div class="mb-3">
                    <label for="add_thumbnail" class="form-label">Choose thumbnail:</label>                    
                    <!-- This is the input element for uploading the thumbnail image -->
                    <input class="form-control" type="file" id="add_thumbnail" name="add_thumbnail">
                    <label class="form-label">Leave blank to keep existing image: </label>
                    <!-- This is the image preview tag that displays the thumbnail if available -->
                    <p> <?php echo '<img class="thumb" style="width: 100px;" src="data:image/png;base64,' . base64_encode($row['thumbnail']) . '"/>'; ?></p>
                </div>
                <!-- full_pic. -->
                <div class="mb-3">
                    <label for="add_full_pic" class="form-label">Choose full picture:</label>
                    <input class="form-control" type="file" id="add_full_pic" name="add_full_pic" value="<?php echo $title; ?>">
                    <label class="form-label">Leave blank to keep existing image: </label>
                    <!-- This is the image preview tag that displays the full_pic if available -->
                    <p> <?php echo '<img class="thumb" style="width: 150px;" src="data:image/png;base64,' . base64_encode($row['full_pic']) . '"/>'; ?></p>
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
