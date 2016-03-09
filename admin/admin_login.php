
<?php include '../view/header.php'; ?>

<div class="contentWrapper"> 
  <div class="columnWrapper">

    <!-- main content goes here -->
    <article class="main">
      
     <main>
        <h1>Admin Login Page</h1>
        <form action="." method="post" id="aligned">
            <input type="hidden" name="action" value="login">
            <label>Username:</label>
            <input type="text"  name="username" size="30" placeholder="Please enter a username">
            <br>
            <label>Password:</label>
            <input type="password"  name="password" size="30" placeholder="Please enter a password">
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Login">
        </form>
        <div class="error">
          <?php if(!empty($error)) { echo $error; } ?>
        </div>  
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

