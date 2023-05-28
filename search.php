
<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/header.php' ?>

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
                                    <input value="<?php echo $name ?>" type="text" name="name" class="form-control">
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


<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/footer.php' ?>
    







