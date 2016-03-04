
<?php include '../view/header.php'; ?>

<h1>Member Login</h1>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="login">

        <label>Username:</label>
        <input type="text"  name="username" size="30">
        <br>

        <label>Password:</label>
        <input type="password"  name="password" size="30">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Login">
    </form>
    <?php echo $error_message; ?>
<h2>Not a member?</h2>
<form action="" method="post">
        <input type="hidden" name="action" value="register">
        <input type="submit" value="Resister Here">
    </form>
<?php include '../view/footer.php'; ?>