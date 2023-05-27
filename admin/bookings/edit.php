<?php
    require '../inc/header.php';
    if( !isset($_GET['id']) ){ ?>
        <div class="alert alert-danger" role="alert">
            Direct Access not allowed
        </div>
    <?php die; } 
    $booking = getSingleBooking($_GET['id']);
?>
	<div class="container-fluid">
		<div class="row">
			<?php require '../inc/sidebar.php' ?>

            <?php if($booking == null): ?>
                <div class="alert alert-danger" role="alert">
                    Booking not found
                </div>
            <?php die; endif; ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Bookings</h1>
				</div>

                <!-- Show errors -->
                <?php require $_SERVER['DOCUMENT_ROOT'] ."/admin/functions/show_errors.php" ?>

                <form action="/admin/functions/bookings.php" method="POST">
                    <label><b>Name</b></label>
                    <input value="<?php echo $booking['name'] ?>" name="name" type="text" class="form-control">

                    <label class="mt-3"><b>Email</b></label>
                    <input value="<?php echo $booking['email'] ?>" name="email" type="email" class="form-control">
                    
                    <label class="mt-3"><b>Phone</b></label>
                    <input type="text" value="<?php echo $booking['phone'] ?>" name="phone" class="form-control">
                    
                    <label class="mt-3"><b>Address</b></label>
                    <input type="text" value="<?php echo $booking['address'] ?>" name="address" class="form-control">

                    <?php $users = getUsers() ?>
                    <label class="mt-3"><b>User</b></label>
                    <select name="user_id" class="form-control">
                        <?php foreach($users as $user) : ?>
                            <?php if($user['role'] == 'customer'): ?>
                                <option <?php echo $booking['user_id'] == $user['id'] ? 'selected' : '' ?> value="<?php echo $user['id'] ?>"><?php echo $user['name'] ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>

                    <?php $packages = getPackages() ?>
                    <label class="mt-3"><b>Package</b></label>
                    <select name="package_id" class="form-control">
                        <?php foreach($packages as $package) : ?>
                            <option <?php echo $booking['package_id'] == $package['id'] ? 'selected' : '' ?> value="<?php echo $package['id'] ?>"><?php echo $package['name'] ?></option>
                        <?php endforeach ?>
                    </select>

                    <label class="mt-3"><b>Is Paid</b></label>
                    <select name="is_paid" class="form-control">
                        <option <?php echo $booking['is_paid'] ? 'selected' : '' ?> value="1">Yes</option>
                        <option <?php echo !$booking['is_paid'] ? 'selected' : '' ?> value="0">No</option>
                    </select>

                    <label class="mt-3"><b>Members Info</b></label>
                    <textarea name="members_info" class="form-control"><?php echo $booking['members_info'] ?></textarea>
                    
                    <label class="mt-3"><b>Pax</b></label>
                    <input value="<?php echo $booking['pax'] ?>" name="pax" type="number" class="form-control">

                    <input type="hidden" name="id" value="<?php echo $booking['id'] ?>">

                    <input type="submit" value="Update" name="update_booking" class="mt-3 btn btn-primary">
                </form>
			</main>
		</div>
	</div>

<?php require '../inc/footer.php' ?>