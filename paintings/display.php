<!-- Connect. -->
<?php
include_once('../components/connect.php');
$result = (connect()->query($statement));
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
if ($result->rowCount() == 0) {
    echo "<b>Not found";
}
?>
<!-- Table. --> 
<div class="container my-5">
    <div class="row">
        <?php
        foreach ($rows as $row) {
            ?>
            <!-- Start of Gallery Item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card"> 
                    <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                        <a href="../paintings/select_by_search.php?query=<?php echo urlencode($row['title']); ?>">
                            <img class="card-img-top" style="max-width: 100%; max-height: 300px; object-fit: cover;" src="data:image/gif;base64,<?php echo base64_encode($row['full_pic']); ?>" alt="Painting Image">
                        </a>
                    </div>  

                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $row['title']; ?></h5>
                        <p><class="card-text"><strong>Artist: </strong> <?php echo $row['artist_name']; ?><br>
                            <class="card-text"><strong>Style: </strong> <?php echo $row['style']; ?><br>
                                <class="card-text"><strong>Media: </strong> <?php echo $row['media']; ?><br>
                                    <class="card-text"><strong>Finished: </strong> <?php echo $row['finished']; ?></p>
                                        <?php
                                        if (isset($origin) && $origin == "select_all_edit_delete.php") {
                                            ?>
                                            <a href="edit.php?id=<?php echo $row['painting_id']; ?>" class="btn btn-outline-primary mb-2" name="edit_button">Edit</a>
                                            <a href="delete.php?id=<?php echo $row['painting_id']; ?>" class="btn btn-outline-danger mb-2" name="delete_button">Delete</a>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        </div>
                                        </div>
                                        <!-- End of Gallery Item -->
                                        <?php
                                    }
                                    ?>
                                    </div>
                                    </div>
