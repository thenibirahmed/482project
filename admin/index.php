<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/header.php' ?>
	<div class="container-fluid">
		<div class="row">
			<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/sidebar.php' ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Dashboard</h1>
				</div>
				<?php if( $_SESSION['user']['role'] == 'admin' ): ?>
					<h5 class="my-4">All Bookings</h5>
				<?php else: ?>
					<h5 class="my-4">My Bookings</h5>
				<?php endif ?>
				
				<?php 
					if( $_SESSION['user']['role'] == 'admin' ){
						$bookings = getBookings();
					}else{
						$bookings = getSingleUsersBooking($_SESSION['user']['id']);
					}
				?>
				<div class="table-responsive">
					<table class="table table-striped  ">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Booking Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Address</th>
								<th scope="col">User</th>
								<th scope="col">Package</th>
								<th scope="col">Is Paid</th>
								<th scope="col">Members info</th>
								<th scope="col">Pax</th>
								<th scope="col">Price</th>
								<?php if( $_SESSION['user']['role'] == 'admin' ): ?>
									<th>Actions</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php if($bookings!=null): ?>
								<?php foreach($bookings as $booking): ?>
								<tr>
									<td><?php echo $booking['id'] ?></td>
									<td><?php echo $booking['name'] ?></td>
									<td><?php echo $booking['email'] ?></td>
									<td><?php echo $booking['phone'] ?></td>
									<td><?php echo $booking['address'] ?></td>
									<?php $user = getSingleUser($booking['user_id']) ?>
									<td><?php echo $user != null ? $user['name'] : 'Not Found' ?></td>
									<?php $package = getSinglePackage($booking['package_id']) ?>
									<td><?php echo $package != null ? $package['name'] : 'Not Found' ?></td>
									<td><?php echo $booking['is_paid'] ? '<span class="badge text-bg-success">Paid</span>' : '<span class="badge text-bg-danger">Unpaid</span>' ?></td>
									<td><?php echo $booking['members_info'] ?></td>
									<td><?php echo $booking['pax'] ?></td>
									<td><?php echo $booking['price'] ?></td>
									<?php if( $_SESSION['user']['role'] == 'admin' ): ?>
										<td>
											<?php if( $booking['is_paid'] ): ?>
												<a href="/admin/functions/bookings.php?mark_as_unpaid=<?php echo $booking['id'] ?>" class="btn btn-sm btn-outline-danger">Mark As Unpaid</a>
											<?php else: ?>
												<a href="/admin/functions/bookings.php?mark_as_paid=<?php echo $booking['id'] ?>" class="btn btn-sm btn-outline-success">Mark As Paid</a>
											<?php endif ?>
											<a href="/admin/bookings/edit.php?id=<?php echo $booking['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
											<a href="/admin/functions/bookings.php?delete_id=<?php echo $booking['id'] ?>" class="btn btn-sm btn-outline-secondary"
											onclick="return confirm('Are you sure you want to delete the booking?')">Delete</a>
										</td>
									<?php endif; ?>
								</tr>
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan="11" class="text-center"><b>No Bookings Found</b></td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</div>

			</main>
		</div>
	</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/footer.php' ?>