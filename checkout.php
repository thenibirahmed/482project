<?php 
    if( session_status() === PHP_SESSION_NONE ){
        session_start();
    }
    if(!isset($_SESSION['user'])){ 
        $_SESSION['errors'] = "Please login and checkout again";
        header('location: login.php'); 
    } 

    require $_SERVER['DOCUMENT_ROOT'] . "/admin/functions/packages.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Traveling Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

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
                    <div class="col-12"><h1 class="display-1 text-light">Checkout</h1></div>
                </div>
            </div>
        </div>
    </div>


    <div class="checkout">
        <div class="container">
            <div class="row mt-4">
                <div class="col text-center">
                    <h2>Please Fill Up Your Details</h2>
                </div>
            </div>

            <?php require $_SERVER['DOCUMENT_ROOT'] ."/admin/functions/show_errors.php" ?>

            <form action="functions/checkout.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                <?php 
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                    }else{
                        $id = 0;
                    }
                ?>
                <?php if($id !== 0): ?>
                    <input type="hidden" name="package_id" value="<?php echo $_GET['id'] ?>">
                <?php endif; ?>

                <?php if($id === 0): ?>
                    <?php $packages = getPackages(); ?>
                <?php endif ?>
                
                <?php if( isset($packages) ): ?>
                    <div class="row mt-4">
                        <div class="col">
                            <label><b>Select Pakage</b></label>
                            <select class="form-select" name="package_id">
                                <?php foreach($packages as $package): ?>
                                    <option value="<?php echo $package['id'] ?>"><?php echo $package['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row mt-4">
                    <div class="col">
                        <label><b>First Name</b></label>
                        <input class="form-control mt-1" name="f_name" type="text">
    
                        <label class="mt-4"><b>Email</b></label>
                        <input class="form-control mt-1" name="email" type="email">
                    </div>
                    <div class="col">
                        <b>Last Name</b>
                        <input class="form-control mt-1" name="l_name" type="text">
    
                        <label class="mt-4"><b>Phone Number</b></label>
                        <input class="form-control mt-1" name="phone" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="mt-4"><b>Persons Going</b></label>
                        <input type="number" name="pax" class="form-control mt-1">
                        
                        <label class="mt-4"><b>Address</b></label>
                        <textarea class="form-control mt-2" cols="3" rows="3" name="address"></textarea>
                        
                        <label class="mt-4"><b>Members Info</b></label>
                        <textarea class="form-control mt-2" cols="3" rows="3" name="members_info"></textarea>
                    </div>
                    <div class="mt-4">
                        <input type="submit" name="checkout" class="btn btn-dark" value="Confirm">
                    </div>
                </div>
            </form>
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








