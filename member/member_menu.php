<?php
    
   require_once('../util/valid_member.php');
?>
<?php include '../view/header.php'; ?>



<div class="contentWrapper"> 
  <div class="columnWrapper">

    <!-- main content goes here -->
    <article class="main">
      <h2>Article Title</h2>
      <p>main content goes here</p>
      
      <main>
<h1>Member Menu</h1>


<h2>Login Status</h2>
    <p>You are logged in as <?php echo $_SESSION['member']; ?>.</p>
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>
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