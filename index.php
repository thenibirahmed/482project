<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/header.php' ?>

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
                                <input type="text" name="name" class="form-control">

                                <?php $locations = getLocations()  ?>
                                <label class="text-light mt-3">From</label>
                                <select name="from_id" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($locations as $location): ?>
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
                    // $images = [ 44, 42, 43 ];
                    $packages = getPackages();
                    foreach( $packages as $package ):
                    $images = json_decode($package['images']);
                ?>
                <div class="col">
                    <div class="card h-100">
                        <img loading="lazy" 
                        src="<?php echo $images[0] ?>"
                        onerror="this.src='https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp'" 
                        class="card-img-top"/>
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
                    <img loading="lazy"  src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

                    <img loading="lazy"  src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img loading="lazy"  src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />

                    <img loading="lazy"  src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img loading="lazy"  src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

                    <img loading="lazy"  src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
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

    
<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/footer.php' ?>