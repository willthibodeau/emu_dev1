<?php
    
    require_once('../util/valid_admin.php');
?>
<?php include '../view/header.php'; ?>
<main>
    <h2>Admin Menu</h2>
    
    <ul>
        <li><a href="../category">Category Manager</a></li>
        
        
    </ul>
   

    <h2>Login Status</h2>
    <p>You are logged in as <?php echo $_SESSION['admin']; ?>.</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>
    
   
</main>
<?php include '../view/footer.php'; ?>