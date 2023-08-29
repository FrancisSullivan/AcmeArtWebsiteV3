<!DOCTYPE html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Add new painting - AT2 Sprint 2</title>
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
            <h2>Add New Painting: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="add_status.php" method="post" enctype="multipart/form-data">
                <!-- title. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_title" style="width: 110px;">Title</span>
                    <input type="text" class="form-control" placeholder="e.g. 'Mona Lisa'" aria-label="title" aria-describedby="add_title" name="add_title">
                </div>

                <!-- Function for dynamic dropdown elements. -->
                <!-- We can use this method to display list items for all dropdown menu. eg: Style/Artist/..?-->      
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
                        <option value=""> eg. 'Michelangelo' </option>
                        <?php dynamic_select_dropdowns('artist_id', "artist_name", 'artists'); ?>
                    </select>
                </div>
                

                <!-- style. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_style" style="width: 110px;">Style</span>
                    <input type="text" class="form-control" placeholder="e.g. 'Portrait'" aria-label="style" aria-describedby="add_style" name="add_style">
                </div>

                <!-- media. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_media" style="width: 110px;">Media</span>
                    <input type="text" class="form-control" placeholder="e.g. 'Watercolour'" aria-label="media" aria-describedby="add_media" name="add_media">
                </div>
                <!-- finished. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_finished" style="width: 110px;">Finished</span>
                    <input type="text" class="form-control" placeholder="'YYYY' date format" aria-label="finished" aria-describedby="add_finished" name="add_finished">
                </div>
                <!-- thumbnail. -->
                <div class="mb-3">
                    <label for="add_thumbnail" class="form-label">Choose thumbnail:</label>
                    <input class="form-control" type="file" id="add_thumbnail" name="add_thumbnail">
                </div>
                <!-- full_pic. -->
                <div class="mb-3">
                    <label for="add_full_pic" class="form-label">Choose full picture:</label>
                    <input class="form-control" type="file" id="add_full_pic" name="add_full_pic">
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
