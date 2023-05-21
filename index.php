<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/packages.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/locations.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveling Management System</title>

    <link async href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link async rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">Traveling Management System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="login.php">Login</a>
                        <a class="nav-link" href="registration.php">Register</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="banner">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6 py-5">
                        <h1 class="text-light">Traveling Management System</h1>
                        <p class="text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                        <a href="login.php" class="btn btn-light btn-lg">Login</a>
                    </div>
                    <div class="col-md-5">
                        <div class="form">

                            <form action="search.php" method="GET">
                                <label class="text-light">Tour Name</label>
                                <input type="text" class="form-control">

                                <?php $locations = getLocations() ?>
                                <label class="text-light mt-3">From</label>
                                <select name="from_id" class="form-control">
                                    <?php foreach ($locations as $location): ?>
                                        <option value="">Select</option>
                                        <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <label class="text-light mt-3">To</label>
                                <select name="to_id" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($locations as $location): ?>
                                        <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <input type="submit" class="btn btn-light mt-3" value="Search">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="packages mt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="text-center">Packages</h1>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php 
                    $images = [ 44, 42, 43 ];
                    $packages = getPackages();
                    foreach( $packages as $package ):
                ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/0<?php echo $images[rand(0,2)] ?>.webp" class="card-img-top"/>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $package['name'] ?></h5>
                            <p class="card-text">
                                <?php echo substr($package['descriptions'], 0, 100); ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="details.php?id=<?php echo $package['id'] ?>" class="btn btn-success">View Details</a>
                            <span class="text-muted ms-3"><?php echo date( 'd M Y' ,strtotime($package['from_date'])) ?> - <?php echo date( 'd M Y' ,strtotime($package['to_date'])) ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="gallery mt-5 pt-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="text-center">Our Memory Wall</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />

                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
                </div>
            </div>
        </div>
    </div>

    <div class="video mt-5">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col">
                    <h1 class="text-center">Some Mesmerizing Moments</h1>
                </div>
            </div>
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="https://mdbcdn.b-cdn.net/img/video/Tropical.mp4" type="video/mp4" />
                            </video>
                        </div>
                        <div class="carousel-item">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="https://mdbcdn.b-cdn.net/img/video/forest.mp4" type="video/mp4" />
                            </video>
                        </div>
                        <div class="carousel-item">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="https://mdbcdn.b-cdn.net/img/video/Agua-natural.mp4" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="call-to-action mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center border border-dark rounded border-2 py-4">
                    <h3 class="pt-3">Are You Ready<small class="text-muted">To Book Your Next Trip?</small></h3>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, blanditiis.</p>
                    <a href="#" class="btn btn-dark btn-lg mb-3">Book Now</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center text-md-start mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                        aliquam voluptatem veniam, est atque cumque eum delectus sint!</p>
                </div>

                <div class="col-lg-6 col-md-6 mb-4 mb-md-0 text-center">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white text-decoration-none">Link 4</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://nibirahmed.com/">Travel Management System</a> -
            All Rights Reserved
        </div>
    </footer>




    <script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>