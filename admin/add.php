<!DOCTYPE html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Add new artists - AT2 Sprint 2</title>
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
            <h2>Add New Artist: </h2>
            <!-- Form. -->
            <!-- Source: https://www.w3schools.com/TAGs/att_form_enctype.asp -->
            <form action="add_status.php" method="post" enctype="multipart/form-data">
                <!-- artist_name. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_artist_name" style="width: 110px;">Artist Name</span>
                    <input type="text" class="form-control" placeholder="e.g. 'Michelangelo'" aria-label="artist_name" aria-describedby="add_artist_name" name="add_artist_name">
                </div>                
                <!-- lifespan. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_lifespan" style="width: 110px;">Lifespan</span>
                    <input type="text" class="form-control" placeholder="e.g. '1475–1564'" aria-label="Lifespan" aria-describedby="add_lifespan" name="add_lifespan">
                </div>
                <!-- period. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_period" style="width: 110px;">Period</span>
                    <input type="text" class="form-control" placeholder="e.g. '19th'" aria-label="period" aria-describedby="add_period" name="add_period">
                </div>
                <!-- period. -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="add_nationality" style="width: 110px;">Nationality</span>
                    <input type="text" class="form-control" placeholder="e.g. 'Italian'" aria-label="nationality" aria-describedby="add_nationality" name="add_nationality">
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
