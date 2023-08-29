<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Search Painting Title OR Artist Name - AT2 Sprint 2</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
        <div class="container-fluid">
            <!-- Heading. -->
            <h2>Search Artist Name</h2>
            <?php
            if (isset($_GET['query'])) {
                $search_query = $_GET['query'];

                // Here, you can perform your search logic using the $search_query
                // For example, you could search a database or search through files.
                // Display the search results or perform other actions
                echo "You searched for: <strong class='bold-text'>$search_query</strong> <br>";
                echo "Result: ";

                $statement = "SELECT * FROM artists WHERE artist_name = '$search_query'";
                //Table
                include_once('display_search_results.php');
            }
            ?>
        </div>

        <?php
        include_once('../components/footer.php');
        ?>
    </body>
</html>
