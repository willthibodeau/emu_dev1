
<?php include '../view/header.php'; ?>

<div class="contentWrapper"> 
  <div class="columnWrapper">

    <!-- main content goes here -->
    <article class="main">
      <h2>Article Title</h2>
      <p>main content goes here</p>
   <h1>Member Login</h1>
    <form action="" method="post" id="aligned">
        <input type="hidden" name="action" value="login">

        <label>Username:</label>
        <input type="text"   required="required" name="username" size="30">
        <br>

        <label>Password:</label>
        <input type="password"  required="required"  name="password" size="30">
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