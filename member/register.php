<?php include '../view/header.php'; ?>

<?php 

?>
<main>
 <p>You are logged in as <?php echo $_SESSION['members']; ?>.</p>
    <h1>Member Login</h1>
    
   <h1>Member Resistration</h1>
    <form action="" method="post" id="register_form">
        <input type="hidden" name="action" value="register_now">

        <input type="hidden" name="id" value="">
        <label>User Name:</label>
        <input type="text" name="username" size="30">
        <br>

        <label>Password:</label>
        <input type="password" name="password" size="30" > 
        <input type="hidden" name="userLevel" value="m">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Register">
    </form>
</main>
<?php include '../view/footer.php'; ?>