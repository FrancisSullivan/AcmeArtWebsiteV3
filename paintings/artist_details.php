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
        // Get the artist_id from the query parameter
        if (isset($_GET['artist_id'])) {
            $artist_id = $_GET['artist_id'];

            // Retrieve artist details from the database
            $query = "SELECT * FROM artists WHERE artist_id = :artist_id";
            $stmt = (connect()->prepare($query));
            $stmt->bindParam(':artist_id', $artist_id);
            $stmt->execute();

            $artist = $stmt->fetch(PDO::FETCH_ASSOC);

            //Table
            //include_once('display_search_results_artist_details.php');
        }
        ?>
        <!-- Container. -->
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Artist Details: </h2>
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
            <!-- Table Container -->
            <div class="table-container">
                <table class="table">
                    <tbody>
                        <tr>
                            <!-- Content. --> 
                            <td class="narrow-column-first"></td> <!-- Add an extra column before the img, get more white space --> 
                            <td class="text-right narrow-column"> <!-- Add the class "text-right" and "narrow-column" -->                                
                                <?php echo '<img class="thumb" src="data:image/png;base64,' . base64_encode($artist['full_pic']) . '"/>'; ?>
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
                                <p><?php echo $artist['artist_id']; ?></p>
                                <p><?php echo $artist['artist_name']; ?></p>
                                <p><?php echo $artist['lifespan']; ?></p>
                                <p><?php echo $artist['period']; ?></p>
                                <p><?php echo $artist['nationality']; ?></p>
                            </td>                
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Footer. -->
            <?php
            include_once('../components/footer.php');
            ?>
    </body>
</html>

