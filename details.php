<?php require $_SERVER['DOCUMENT_ROOT'] . "/admin/functions/packages.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details - Traveling Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<?php 
    if( ! isset($_GET['id']) ){
        header('location: index.php');
    }
    $id = $_GET['id'];

    $package = getSinglePackage($id);
    
?>

<body>
    <!-- Header -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">Traveling Management System</a>
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
                    <div class="col-12"><h1 class="display-1 text-light"><?php echo $package['name'] ?></h1></div>
                </div>
            </div>
        </div>
    </div>

    <div class="details">
        <div class="container">
            <div class="row pt-5">
                <div class="col-8">
                    <img class="img-fluid w-100" src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" alt="">
                    <h2 class="mt-4"><?php echo $package['name'] ?></h2>
                    <?php echo $package['descriptions'] ?>
                </div>
                <div class="col-4">
                    <h2 class="mb-4">Details</h2>
                    <ul>
                        <li><b>FROM:</b> <?php echo $package['from_id'] ?></li>
                        <li><b>TO:</b> <?php echo $package['to_id'] ?></li>
                        <li><b>FROM DATE:</b> <?php echo date( 'd M Y' ,strtotime($package['from_date'])) ?></li>
                        <li><b>TO DATE:</b> <?php echo date( 'd M Y' ,strtotime($package['to_date'])) ?></li>
                    </ul>
                    <h2 class="mt-4">Price: <span class="text-success">$<?php echo $package['price'] ?></span></h2>
                    <div class="d-grid mt-4">
                        <a href="checkout.php?id=<?php echo $package['id'] ?>" class="btn btn-success btn-lg">Book Now</a>
                        <img class="img-fluid w-100 mt-5" src="https://mdbcdn.b-cdn.net/img/new/standard/city/048.webp">
                        <img class="img-fluid w-100 mt-2" src="https://mdbcdn.b-cdn.net/img/new/standard/city/050.webp">
                    </div>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
    </script>
</body>

</html>








