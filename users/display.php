<!-- Connect. -->
<?php
include_once('../components/connect.php');
$result = (connect()->query($statement));
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Table. --> 
<!-- Connect. -->
<?php
include_once('../components/connect.php');
$result = (connect()->query($statement));
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Gallery. --> 
<div class="container my-5">
    <div class="row">
        <?php
        foreach ($rows as $row) {
            ?>
            <!-- Start of Artist Item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                        <a href="../artists/artist_details.php?artist_id=<?php echo $row['artist_id']; ?>">
                        <img class="card-img-top" style="max-width: 100%; max-height: 300px; object-fit: cover;" src="data:image/png;base64,<?php echo base64_encode($row['full_pic']); ?>" alt="Artist Image">
                        </a>
                    </div> 
                    
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $row['artist_name']; ?></h5>
                        <p class="card-text">
                            <strong>Lifespan: </strong><?php echo $row['lifespan']; ?><br>
                            <strong>Period: </strong><?php echo $row['period']; ?><br>
                            <strong>Nationality: </strong><?php echo $row['nationality']; ?>
                        </p>
                        <?php
                        if (isset($origin) && $origin == "select_all_edit_delete.php") {
                            ?>
                            <a href="edit.php?id=<?php echo $row['artist_id']; ?>" class="btn btn-outline-primary mb-2" name="edit_button">Edit</a>
                            <a href="delete.php?id=<?php echo $row['artist_id']; ?>" class="btn btn-outline-danger mb-2" name="delete_button">Delete</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- End of Artist Item -->
            <?php
        }
        ?>
    </div>
</div>
