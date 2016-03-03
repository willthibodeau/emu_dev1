
<?php include '../view/header.php'; ?>
<main>

    <h1>Admin Login Page</h1>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="login">

        <label>Username:</label>
        <input type="text" required="required" name="username" size="30">
        <br>

        <label>Password:</label>
        <input type="password" required="required" name="password" size="30">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Login">
    </form>
    
    <?php $error_message; ?>
</main>
<?php include '../view/footer.php'; ?>