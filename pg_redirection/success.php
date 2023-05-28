
<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/header.php' ?>

        <div class="banner">
            <div class="container">
                <div class="row py-5">
                    <?php $booking_id = $_GET['booking_id'] ?? ''; 
                    if( $booking_id != '' || $booking_id != null ): ?>
                        <div class="col-12"><h1 class="display-1 text-success">Congratulations! 😀</h1></div>
                    <?php else: ?>
                        <div class="col-12"><h1 class="display-1 text-danger">Sorry!</h1></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <?php 

                            if( $booking_id != '' || $booking_id != null ): ?>
                                <div class="h3 mt-4 mb-5">Payment Successful</div>
                            <?php else: ?>
                                <div class="h3 mt-4 mb-5 text-danger">Payment Failed</div>
                            <?php endif; ?>
                        
                </div>
                <div class="col-12">
                    <div class="bg-white mb-5">
                        <?php 
                            if( $booking_id != '' || $booking_id != null ):
                            markBookingAsPaidWithoutRedirect($booking_id);
                            $booking = getSingleBooking($booking_id);
                        ?>

                            <table class="table table-responsive table-striped table-hover">
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo $booking['name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $booking['email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo $booking['phone'] ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td><?php echo $booking['is_paid'] ? '<span class="badge text-bg-success">Paid</span>' : '<span class="badge text-bg-danger">Unpaid</span>' ?></td>
                                </tr>
                                <tr>
                                    <th>Pax</th>
                                    <td><?php echo $booking['pax'] ?></td>
                                </tr>
                                <tr>
                                    <th>Package</th>
                                    <td><?php echo getSinglePackage($booking['package_id'])['name'] ?></td>
                                </tr>
                            </table>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require $_SERVER['DOCUMENT_ROOT'] . '/inc/template-parts/footer.php' ?>
    







