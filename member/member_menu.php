<?php
    
   require_once('../util/valid_member.php');
?>
<?php include '../view/header.php'; ?>
<main>
<h1>Member Menu</h1>


<h2>Login Status</h2>
    <p>You are logged in as <?php echo $_SESSION['member']; ?>.</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>
</main>
<?php include '../view/footer.php'; ?>