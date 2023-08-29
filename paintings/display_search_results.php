<!doctype html>
<html lang="en">
    <!-- Connect. -->
    <?php
    include_once('../components/connect.php');
    $result = (connect()->query($statement));
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    // Returns not found result.
    if ($result->rowCount() == 0) {
        echo "<b>Painting not found";
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
                            <td id="image" class="text-right narrow-column"> <!-- Add the class "text-right" and "narrow-column" -->                                
                                <?php echo '<img class="thumb" src="data:image/png;base64,' . base64_encode($row['full_pic']) . '"/>'; ?>
                            </td>
                            <td class="text-right narrow-column"> <!-- Add the class "text-right" and "narrow-column" -->
                                <br>
                                <br>
                                <br>
                                <br>
                                <p class="text-right">Painting Title</p>
                                <p class="text-right">Finished</p>
                                <p class="text-right">Paint Media</p>
                                <p class="text-right">Artist Name</p>
                                <p class="text-right">Style</p>
                            </td>
                            <td>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p><?php echo $row['title']; ?></p>
                                <p><?php echo $row['finished']; ?></p>
                                <p><?php echo $row['media']; ?></p>
                                <p> <a href="../artists/artist_details.php?artist_id=<?php echo $row['artist_id']; ?>" id="artist_link" class="btn btn-link"><?php echo $row['artist_name']; ?>
                                    </a>
                                </p>                               
                                <p><?php echo $row['style']; ?></p>
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
