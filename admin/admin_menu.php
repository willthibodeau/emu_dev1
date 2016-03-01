<?php
   echo "admin_menu";
    require_once('../util/valid_admin.php');
?>
<?php include '../view/header.php'; ?>
<main>
    <h2>Admin Menu</h2>
    <nav>
    <ul>
        <li><a href="../product_manager">Manage Products</a></li>
        <li><a href="../user_manager">Manage Users</a></li>
        <li><a href="../comment_manager">Manage Comments</a></li>
    </ul>
    </nav>

    <h2>Login Status</h2>
    <p>You are logged in as <?php echo $_SESSION['admin']; ?>.</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>

</main>
<?php include '../view/footer.php'; ?>