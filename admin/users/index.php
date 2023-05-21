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

                        <!-- Edit Form -->
                        <?php if(isset($_GET['id']) && $_GET['id'] != '' ): ?>
                            <h3 class="mt-3">Edit User</h3>
                            <?php $user = getSingleUser($_GET['id']) ?>
                            <form class="d-inline-block" action="/admin/functions/users.php" method="POST">
                                <label class="mb-3"><b>Name</b></label>
                                <input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control">
                                
                                <label class="mt-3"><b>Email</b></label>
                                <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control">
                                
                                <label class="mt-3"><b>Phone</b></label>
                                <input type="text" name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
                                
                                <label class="mt-3"><b>Role</b></label>
                                <select name="role" class="form-control">
                                    <option <?php echo $user['role'] == 'admin' ? 'selected' : '' ?> value="admin">Admin</option>
                                    <option <?php echo $user['role'] == 'customer' ? 'selected' : '' ?> value="customer">Customer</option>
                                </select>

                                <label class="mt-3"><b>Password</b></label>
                                <input type="password" name="password" class="form-control">

                                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">   

                                <input type="submit" name="edit_user" value="Update" class="btn btn-primary mt-3">
                            </form>
                            <a href="/admin/users" class="btn btn-danger mt-3">Cancel</a>
                        <?php endif; ?>
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
                                            <a href="/admin/users?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <a href="/admin/functions/users.php?delete_id=<?php echo $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-outline-secondary">Delete</a>
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