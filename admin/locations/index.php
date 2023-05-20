<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/header.php';
?>
	<div class="container-fluid">
		<div class="row">
			<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/sidebar.php' ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Locations</h1>
				</div>

                <!-- Show errors -->
                <?php require $_SERVER['DOCUMENT_ROOT'] ."/admin/functions/show_errors.php" ?>

                <div class="row">
                    <div class="col-md-4">
                        <!-- Add location form -->
                        <form action="/admin/functions/locations.php" method="POST">
                            <label class="mb-3"><b>Name of Location</b></label>
                            <input type="text" name="location_name" class="form-control">

                            <input type="submit" name="add_location" value="Create" class="btn btn-primary mt-3">
                        </form>
                    </div>
                    <div class="col-md-8">

                        <?php $locations = getLocations() ?>

                        <!-- List Locations -->
                        <table class="table table-striped   table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($locations as $location) :  ?>
                                    <tr>
                                        <td><?php echo $location['id']; ?></td>
                                        <td><?php echo $location['name']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <a href="" class="btn btn-sm btn-outline-secondary">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                
			</main>
		</div>
	</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/footer.php' ?>