<?php 
    if( session_status() === PHP_SESSION_NONE ){
        session_start();
    }
    if(!isset($_SESSION['user'])){ 
        $_SESSION['errors'] = "Please login and checkout again";
        header('location: login.php'); 
    } 
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/header.php' ?>
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


    

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/footer.php' ?>



