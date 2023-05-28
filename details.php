<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/header.php' ?>

        <?php 
            if( ! isset($_GET['id']) ){
                header('location: index.php');
            }
            $id = $_GET['id'];

            $package = getSinglePackage($id);
            
        ?>
        <?php if($package == null) : ?>
            <div class="alert alert-danger text-center" role="alert">
                Package Not Found!
            </div>
        <?php endif; ?>
        <div class="banner">
            <div class="container">
                <div class="row py-5">
                    <div class="col-12"><h1 class="display-1 text-light"><?php echo $package['name'] ?></h1></div>
                </div>
            </div>
        </div>
    </div>
            <?php $images = json_decode($package['images']) ?>
    <div class="details">
        <div class="container">
            <div class="row pt-5">
                <div class="col-8">
                    <!-- src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp"  -->
                    <img loading="lazy" class="img-fluid w-100" 
                        src="<?php echo $images[0] ?>" 
                        onerror="this.src='https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp'"
                    alt="">
                    <h2 class="mt-4"><?php echo $package['name'] ?></h2>
                    <?php echo $package['descriptions'] ?>
                </div>
                <div class="col-4">
                    <h2 class="mb-4">Details</h2>
                    <ul>
                        <li><b>FROM:</b> <?php echo getSingleLocation($package['from_id'])['name'] ?></li>
                        <li><b>TO:</b> <?php echo getSingleLocation($package['to_id']) != null ? getSingleLocation($package['to_id'])['name'] : 'Not Found' ?></li>
                        <li><b>FROM DATE:</b> <?php echo date( 'd M Y' ,strtotime($package['from_date'])) ?></li>
                        <li><b>TO DATE:</b> <?php echo date( 'd M Y' ,strtotime($package['to_date'])) ?></li>
                    </ul>
                    <h2 class="mt-4">Price: <span class="text-success"><?php echo $package['price'] ?> Tk</span></h2>
                    <div class="d-grid mt-4">
                        <a href="checkout.php?id=<?php echo $package['id'] ?>" class="btn btn-success btn-lg">Book Now</a>

                        <?php 
                            foreach($images as $image){
                                echo '<img loading="lazy" onerror="this.src=\'https://mdbcdn.b-cdn.net/img/new/standard/city/050.webp\'" class="img-fluid w-100 mt-5" src="'.$image.'">';
                            }
                        ?>

                        <!-- <img loading="lazy"  class="img-fluid w-100 mt-5" src="https://mdbcdn.b-cdn.net/img/new/standard/city/048.webp">
                        <img loading="lazy"  class="img-fluid w-100 mt-2" src="https://mdbcdn.b-cdn.net/img/new/standard/city/050.webp"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/footer.php' ?>
