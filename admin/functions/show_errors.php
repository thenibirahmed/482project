<!-- Show errors -->
<?php if (isset($_SESSION['errors']) && $_SESSION['errors'] !== null && ! empty($_SESSION['errors'])): ?>
    <div class="alert alert-danger">
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <li><?php echo $error; ?></li>
        <?php 
            endforeach;
            $_SESSION['errors'] = null;
        ?>
    </div>
<?php endif; ?>