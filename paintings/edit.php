<!DOCTYPE html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Edit - AT2 Sprint 2</title>
    </head>
    <!-- Body. -->
    <body>
        <!-- Navbar. -->
        <?php
        include_once('../components/navbar.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT p.*, a.artist_name FROM paintings p JOIN artists a ON p.artist_id = a.artist_id WHERE painting_id = :id";
            $stmt = connect()->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    // Populate variables with fetched data
                    $title = isset($row['title']) ? $row['title'] : '';
                    $artist_id = isset($row['artist_id']) ? $row['artist_id'] : '';
                    $artist_name = isset($row['artist_name']) ? $row['artist_name'] : '';
                    $style = isset($row['style']) ? $row['style'] : '';
                    $media = isset($row['media']) ? $row['media'] : '';
                    $finished = isset($row['finished']) ? $row['finished'] : '';
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
            <h2>Edit painting: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="edit_status.php?id=<?php echo $id?>" method="post" enctype="multipart/form-data">
                <!-- title. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_title" style="width: 110px;">Title</span>
                    <input type="text" class="form-control" placeholder="title" aria-label="title" aria-describedby="add_title" name="add_title" value="<?php echo $title; ?>">
                </div>

                <?php
                include_once('../components/connect.php');

                function dynamic_select_dropdowns($column1, $column2, $table) {
                    // Modify the statement to select both columns
                    $statement = "SELECT DISTINCT $column1, $column2 FROM $table";
                    $result = connect()->query($statement);
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                        // Use the artist_id as the value, and display both the artist_id and artist_name for user visibility
                        echo '<option value="' . $row[$column1] . '">' . $row[$column1] . ': ' . $row[$column2] . '</option>';
                    }
                }
                ?>
                
                <!-- artist. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_artist" style="width: 110px;">Artist</span>
                    <select id="select_box_1" name="add_artist" aria-label="artist" aria-describedby="add_artist" class="form-control">
                        <option value="<?php echo $artist_id; ?>"> <?php echo $artist_id; ?>: <?php echo $artist_name; ?> </option>
                        <?php dynamic_select_dropdowns('artist_id', "artist_name", 'artists'); ?>
                    </select>
                </div>

                <!-- style. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_style" style="width: 110px;">Style</span>
                    <input type="text" class="form-control" placeholder="style" aria-label="style" aria-describedby="add_style" name="add_style" value="<?php echo $style; ?>">
                </div>
                <!-- media. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_media" style="width: 110px;">Media</span>
                    <input type="text" class="form-control" placeholder="media" aria-label="media" aria-describedby="add_media" name="add_media" value="<?php echo $media; ?>">
                </div>
                <!-- finished. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_finished" style="width: 110px;">Finished</span>
                    <input type="text" class="form-control" placeholder="finished" aria-label="finished" aria-describedby="add_finished" name="add_finished" value="<?php echo $finished; ?>">
                </div>
                
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
