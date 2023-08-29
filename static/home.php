<!doctype html>
<html lang="en">
    <!-- Head. -->
    <head>
        <!-- Bootstrap call. --> 
        <?php
        include_once('../components/bootstrap.php');
        ?>
        <!-- Title. -->
        <title>Home - AT2 Sprint 2</title>
    </head>
    <body>
        <?php
        include_once('../components/navbar.php');
        ?>
        
        <div class="container-fluid mb-4 mt-4">
            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">

                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="d-flex justify-content-center align-items-center">                
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"></button>
                                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../images\waterliliesandjapanesebridge.gif" class="d-block" alt="first_one">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images\weaver.gif" class="d-block" alt="second_one">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images\donitondo2.gif" class="d-block" alt="third_one">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mt-4 d-flex justify-content-center align-items-center">  
                    <div class="text-center">
                        <h2 id="maintitle"><strong>Acme Art</strong></h2><br><br>

                        <p class="lead">
                            Welcome to Acme Art Gallery<br>
                            World Class Artist<br>
                            Collectible Paints<br>
                            Present to you by KING RABBIT<br>
                        </p>
                    </div>                    
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">

                </div>
            </div>
            <div class="text-center mt-4">
                <h2 id="maintitle" >Team <img src="../images/logo.png" class="img-thumbnail" alt="logo" width="100" height="100"></h2>
                
                <p class="lead">
                    Team name:  King Rabbit <br>
                    Team Leader: Dongyun Huang<br>
                    Team Member #1: Derrick Choong<br>
                    Team Member #2: Francis Sullivan<br>
                </p>
            </div>
        </div>
        
        <?php
            include_once('../components/footer.php');
            ?>
    </body>
</html>