
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Traveling Management System</title>

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
                    <div class="col-12"><h1 class="display-1 text-light">Your Search Result</h1></div>
                </div>
            </div>
        </div>
    </div>


    <div class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h3 mt-4 mb-5">Based on your search</div>
                </div>
                <div class="col-12">
                    <div class="bg-white mb-5">

                        <?php 
                        require $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/packages.php';
                        require $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/locations.php';
                        $from_id = $_GET['from_id'] ?? '';
                        $to_id = $_GET['to_id'] ?? '';
                        $name = $_GET['name'] ?? '';
                        $packages = searchPackages($from_id, $to_id, $name);
                        
                        ?>

                        <div class="filters">
                            <form action="search.php" method="GET" class="form-row row mb-5">

                                <div class="col-md">
                                    <h6 class="mt-4">Filters</h6>
                                </div>
                                <div class="col-md">
                                    <label class="text-light">Tour Name</label>
                                    <input value="<?php echo $name ?>" type="text" class="form-control">
                                </div>

                                <div class="col-md">
                                    <?php $locations = getLocations() ?>
                                    <label class="text-light">From</label>
                                    <select name="from_id" class="form-control">
                                        <option <?php echo $from_id == '' ? 'selected' : '' ?> value="">Select</option>
                                        <?php foreach ($locations as $location): ?>
                                            <option <?php echo $from_id == $location['id'] ? 'selected' : '' ?> value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="col-md">
                                    <label class="text-light">To</label>
                                    <select name="to_id" class="form-control">
                                        <option <?php echo $to_id == '' ? 'selected' : '' ?> value="">Select</option>
                                        <?php foreach ($locations as $location): ?>
                                            <option <?php echo $to_id == $location['id'] ? 'selected' : '' ?>  value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md">
                                    <input type="submit" class="btn btn-primary mt-3" value="Search">
                                    <a href="search.php" class="btn btn-danger mt-3">Reset</a>
                                </div>

                            </form>
                        </div>

                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">From Date</th>
                                    <th scope="col">To Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($packages != null): ?>
                                    <?php foreach($packages as $package) :  ?>
                                        <tr>
                                            <td scope="col"><?php echo $package['id'] ?></td>
                                            <td scope="col"><?php echo $package['name'] ?></td>
                                            <td scope="col"><?php echo getSingleLocation($package['from_id']) != null ? getSingleLocation($package['from_id'])['name'] : 'Not Found' ?></td>
                                            <td scope="col"><?php echo getSingleLocation($package['to_id']) != null ? getSingleLocation($package['to_id'])['name'] : 'Not Found' ?></td>
                                            <td scope="col"><?php echo date( 'd M Y' ,strtotime($package['from_date'])) ?></td>
                                            <td scope="col"><?php echo date( 'd M Y' ,strtotime($package['to_date'])) ?></td>
                                            <td scope="col"><?php echo $package['price'] ?></td>
                                            <td scope="col"><?php echo substr($package['descriptions'], 0, 100); ?></td>
                                            <td scope="col">
                                                <a href="details.php?id=<?php echo $package['id'] ?>" class="btn btn-sm btn-dark">See Detail</a>
                                                <a href="checkout.php?id=<?php echo $package['id'] ?>" class="btn btn-sm btn-success">Book Now</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else:  ?>
                                    <tr>
                                        <td colspan="9">
                                            <div class="alert alert-danger" role="alert">
                                                No packages found!
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
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








