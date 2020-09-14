<link href="http://localhost:8080/assets/css/style_home.css" rel="stylesheet">

<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://localhost:8080/assets/img/home/popular/underwater.jpg">
            <div class="carousel-caption">
                <h1 class="display-2">Underwater</h1>
                <h3>A crew of underwater researchers must scramble to safety after an earthquake devastates their
                    subterranean laboratory.</h3>
                <button type="button" class="btn btn-outline-light btn-lg">VIEW TRAILER</button>
                <button type="button" class="btn btn-primary btn-lg">MORE</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="http://localhost:8080/assets/img/home/tenet.jpg">
            <div class="carousel-caption">
                <h1>TENET - NEW TRAILER</h1>
                <a href="#" class="play"><img src="http://localhost:8080/assets/img/home/play.svg">Watch trailer</a>
            </div>
        </div>
    </div>
    <hr class="my-4">
</div>

<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">POPULAR MOVIES</h1>

        </div>
    </div>
</div>



<div class="container-fluid padding">
    <div class="row padding">

        <?php
        use app\core\Application;

        $statement=Application::$app->movieClass::prepare("Select * FROM movie");
        $statement->execute();

        while($row=$statement->fetchObject())

        {

        ?>

        <div class="col-sm-3">
            <div class="card">
                <img class="card-img-top" src="http://localhost:8080/assets/img/uploadimages/<?php echo "$row->image";?>">
                <div class="card-body">
                    <h3 class="card-title"><?php echo "$row->name";?></h3>

                    <a href="/ticket?id_movie=<?php echo "$row->id_movie";?>" class="btn btn-outline-secondary">View more</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <hr class="my-4">
</div>



<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-12">
            <h2>Connect</h2>
        </div>
        <div class="col-12 social padding">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>


</body>
</html>

