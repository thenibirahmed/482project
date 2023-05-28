<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/header.php';
?>
	<div class="container-fluid">
		<div class="row">
			<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/sidebar.php' ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Packages</h1>
				</div>

                <a href="/admin/packages/create.php" class="btn btn-primary mb-4">Create Package</a>

                <!-- Show errors -->
                <?php require $_SERVER['DOCUMENT_ROOT'] ."/admin/functions/show_errors.php" ?>


                <?php $packages = getPackages() ?>

                <!-- List Locations -->
                <table class="table table-striped   table-responsive">
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
                        <?php foreach($packages as $package) :  ?>
                            <tr>
                                <td scope="col"><?php echo $package['id'] ?></td>
                                <td scope="col"><?php echo $package['name'] ?></td>
                                <td scope="col"><?php echo $package['from_id'] ?></td>
                                <td scope="col"><?php echo $package['to_id'] ?></td>
                                <td scope="col"><?php echo date( 'd M Y' ,strtotime($package['from_date'])) ?></td>
                                <td scope="col"><?php echo date( 'd M Y' ,strtotime($package['to_date'])) ?></td>
                                <td scope="col"><?php echo $package['price'] ?></td>
                                <td scope="col"><?php echo substr($package['descriptions'], 0, 100); ?></td>
                                <td>
                                    <a href="/admin/packages/packageBookings.php?id=<?php echo $package['id'] ?>" class="btn btn-sm btn-outline-secondary">See Bookings</a>
                                    <a href="/admin/packages/edit.php?id=<?php echo $package['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this package?')" href="/admin/functions/packages.php?delete_id=<?php echo $package['id'] ?>" class="btn btn-sm btn-outline-secondary">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    

                
			</main>
		</div>
	</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/footer.php' ?>