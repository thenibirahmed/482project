<?php
    require '../inc/header.php' 
?>
	<div class="container-fluid">
		<div class="row">
			<?php require '../inc/sidebar.php' ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Packages</h1>
				</div>

                <!-- Show errors -->
                <?php require $_SERVER['DOCUMENT_ROOT'] ."/admin/functions/show_errors.php" ?>

                <form action="/admin/functions/packages.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label"><b>Name</b></label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <?php $locations = getLocations() ?>
                        <label class="form-label"><b>From Location</b></label>
                        <select name="from_id" class="form-control">
                            <?php foreach ($locations as $location): ?>
                                <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><b>To Location</b></label>
                        <select name="to_id" class="form-control">
                            <?php foreach ($locations as $location): ?>
                                <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>From Date</b></label>
                        <input name="from_date" type="date" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><b>To Date</b></label>
                        <input name="to_date" type="date" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label for="price" class="form-label"><b>Price</b></label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>

                    <div class="mb-3">
                        <label for="descriptions" class="form-label"><b>Description</b></label>
                        <textarea class="form-control" id="descriptions" name="descriptions"></textarea>
                    </div>

                    <!-- Get multiple images -->
                    <div class="mb-3">
                        <label for="images" class="form-label"><b></b></label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                    </div>

                    <button type="submit" name="create_package" class="btn btn-primary">Submit</button>
                </form>
			</main>
		</div>
	</div>

<?php require '../inc/footer.php' ?>