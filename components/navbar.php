<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- Home Page. -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../static/home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Show All</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <!-- Show all Paintings. -->
                        <li><a class="dropdown-item" href="../paintings/select_all.php">Show all Paintings</a></li>
                        <!-- Show all Artists. -->
                        <li><a class="dropdown-item" href="../artists/select_all.php">Show all Artists</a></li>    
                    </ul>
                </li>
                
                <!-- Function for dynamic dropdown elements. -->
                <!-- We can use this method to display list items for all dropdown menu. eg: Style/Artist/..?-->      
                <?php
                include_once('../components/connect.php');

                function dynamic_dropdowns($column, $webpage, $table) {
                    $statement = "SELECT DISTINCT $column FROM $table";
                    $result = (connect()->query($statement));
                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                        ?>
                        <li><a class="dropdown-item" 
                               href=<?php echo "$webpage?TAG=" . urlencode("$row[$column]") ?> 
                               ><?php echo $row[$column]; ?></a></li>
                            <?php
                        }
                    }
                    ?>

                <!-- Filter Paintings -->  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">Paintings Filter</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">By Style</a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <?php dynamic_dropdowns('style', '../paintings/select_by_style.php', 'paintings'); ?>
                            </ul>
                        </li>
                        <li><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> By Artist </a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <?php dynamic_dropdowns('artist_name', '../paintings/select_by_artist.php', 'artists'); ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <!-- Filter Artist -->  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false">Artists Filter</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">By Nationality</a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <?php dynamic_dropdowns('nationality', '../artists/select_by_nationality.php', 'artists'); ?>
                            </ul>
                        </li>
                        <li><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> By Period </a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <?php dynamic_dropdowns('period', '../artists/select_by_period.php', 'artists'); ?>
                            </ul>
                        </li>
                    </ul>
                </li>
               
                <!-- Modify Database. -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Modify Database</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> Artist </a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <li><a class="dropdown-item" href="../artists/add.php">Add New Artist</a></li>
                                <li><a class="dropdown-item" href="../artists/select_all_edit_delete.php">Edit/Delete Artist</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> Painting </a>
                            <ul class="dropdown-menu dropdown-submenu">
                                <li><a class="dropdown-item" href="../paintings/add.php">Add New Painting</a></li>
                                <li><a class="dropdown-item" href="../paintings/select_all_edit_delete.php">Edit/Delete Paintings</a></li>    
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                <!-- Contact Page. -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../static/contact_us.php">Contact Us</a>
                </li>
                </ul>
  
            <!-- Split button dropdown wrapper -->
            <form class="d-flex ms-auto" id="searchForm" method="GET">
                <div class="input-group">
                    <!-- Search Input -->
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="query">

                    <!-- Using div instead of ul for input-group-append -->
                    <div class="input-group-append">
                        <button class="btn btn-outline-success dropdown-toggle" style="color:white;" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</button>
                        
                        <div class="dropdown-menu">
                            <!-- Option to search in paintings -->
                            <a class="dropdown-item" href="#" onclick="document.getElementById('searchForm').action='../paintings/select_by_search.php'; document.getElementById('searchForm').submit();">Paintings</a>
                            
                            <!-- Option to search in artists -->
                            <a class="dropdown-item" href="#" onclick="document.getElementById('searchForm').action='../artists/select_by_search.php'; document.getElementById('searchForm').submit();">Artists</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</nav>
