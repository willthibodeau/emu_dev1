
<?php include '../view/header.php'; ?>

<div class="contentWrapper"> 
  <div class="columnWrapper">

    <!-- main content goes here -->
    <article class="main">
      
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
    </article><!-- end main article -->

    <!-- first sidebar goes here -->
    <aside class="sidebar1">
      <h2>Sidebar 1</h2>
      
     <p> sidebar menu goes here<p>
    </aside><!-- end sidebar 1 -->
  </div><!-- end column wrapper -->

  <!-- second sidebar goes here -->
  <aside class="sidebar2">
  <h2>Sidebar 2 </h2>
<p>comments / testimonials

  </aside><!-- end sidebar 2 -->
</div><!-- end content wrapper -->

<?php include '../view/footer.php'; ?>

http://stackoverflow.com/questions/17371250/putting-php-form-errors-on-the-same-page

You don't want to die on the errors. I'd suggest putting each error message into an array, then if the array is not empty, put the array into a session variable and redirect back to the form page. Make sure you put session_start() at the top of both pages.

$errors = array();
if(!preg_match($email_exp,$email_from)) {
    $errors['email'] =  'The Email Address you entered does not appear to be valid.<br />';
}
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$first_name)) {
    $errors['first_name'] =  'The First Name you entered does not appear to be valid.<br />';
}
if(!preg_match($string_exp,$last_name)) {
    $errors['last_name'] =  'The Last Name you entered does not appear to be valid.<br />';
}
if(strlen($comments) < 2) {
    $errors['comments'] =  .= 'The Comments you entered do not appear to be valid.<br />';
}
if(!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: form_page.php');
    exit;
}

You can then check for errors on the form page with

if(!empty($_SESSION['errors']['email'])){
   echo $_SESSION['errors']['email'];
}

shareimprove this answer