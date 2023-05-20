<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/header.php';
?>
	<div class="container-fluid">
		<div class="row">
			<?php require $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/sidebar.php' ?>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

				<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Users</h1>
				</div>

                <!-- Show errors -->
                <?php require $_SERVER['DOCUMENT_ROOT'] ."/admin/functions/show_errors.php" ?>

                <div class="row">
                    <div class="col-4">
                        <!-- Add location form -->
                        <form action="/admin/functions/users.php" method="POST">
                            <label class="mb-3"><b>Name</b></label>
                            <input type="text" name="name" class="form-control">
                            
                            <label class="mt-3"><b>Email</b></label>
                            <input type="email" name="email" class="form-control">
                            
                            <label class="mt-3"><b>Phone</b></label>
                            <input type="text" name="phone" class="form-control">
                            
                            <label class="mt-3"><b>Role</b></label>
                            <select name="role" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="customer">Customer</option>
                            </select>

                            <label class="mt-3"><b>Password</b></label>
                            <input type="password" name="password" class="form-control">

                            <input type="submit" name="create_user" value="Create" class="btn btn-primary mt-3">
                        </form>
                    </div>
                    <div class="col-8">

                        <?php $users = getUsers() ?>

                        <!-- List Locations -->
                        <table class="table table-striped   table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user) :  ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['phone']; ?></td>
                                        <td><?php echo ucwords($user['role']); ?></td>
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