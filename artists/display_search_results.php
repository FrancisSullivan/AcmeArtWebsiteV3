<!doctype html>
<html lang="en">
    <!-- Connect. -->
    <?php
    include_once('../components/connect.php');
    $result = (connect()->query($statement));
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    // Returns not found result.
    if ($result->rowCount() == 0) {
        echo "<b>Artist not found";
    }
    ?>
    <body>
        <!--CSS styling--> 
        <style>
            /* Center the table container */
            .table-container {
                display: flex;
                justify-content: center;
                align-items: center; /* Center vertically as well */
            }

            .table {
                width: 100%;
            }

            .table img.thumb {
                display: block;
                max-height: 500px;
                margin: 0 auto; /* Center the image */
            }

            /* Adjust the spacing between cells */
            .table td {
                padding: 10px;
                white-space: nowrap; /* Disable text wrapping */
            }

            /* Adjust the spacing between rows */
            .table tr {
                margin-bottom: 10px;
            }

            /* Align the text in the second column to the right */
            .text-right p {
                text-align: right;
            }

            /* Set a bigger width for the first column */
            .narrow-column-first {
                width: 350px; /* Adjust the width as per your preference */
            }

            /* Set a smaller width for the second column */
            .narrow-column {
                width: 180px; /* Adjust the width as per your preference */
            }
        </style>

        <!-- Table -->
        <!-- Table Container -->
        <div class="table-container">
            <table class="table">
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <!-- Content. --> 
                            <td class="narrow-column-first"></td> <!-- Add an extra column before the img, get more white space --> 
                            <td class="text-right narrow-column"> <!-- Add the class "text-right" and "narrow-column" -->                                
                                <?php echo '<img class="thumb" src="data:image/png;base64,' . base64_encode($row['full_pic']) . '"/>'; ?>
                            </td>
                            <td class="text-right narrow-column"> <!-- Add the class "text-right" and "narrow-column" -->
                                <br>
                                <br>
                                <br>
                                <br>
                                <p class="text-right">Artist ID</p>
                                <p class="text-right">Name</p>
                                <p class="text-right">lifespan</p>
                                <p class="text-right">Period</p>
                                <p class="text-right">nationality</p>
                            </td>
                            <td>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p><?php echo $row['artist_id']; ?></p>
                                <p><?php echo $row['artist_name']; ?></p>
                                <p><?php echo $row['lifespan']; ?></p>
                                <p><?php echo $row['period']; ?></p>
                                <p><?php echo $row['nationality']; ?></p>
                                <a href="../paintings/select_by_artist.php?TAG=<?php echo $row['artist_name']; ?>" id="artist_link" class="btn btn-link">See paintings by this artist</a>
                            </td>                
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Footer. -->
        <?php
        include_once('../components/footer.php');
        ?>
    </body>
</html>
