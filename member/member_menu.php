<?php
    
   require_once('../util/valid_member.php');
?>
<?php include '../view/header.php'; ?>



<div class="contentWrapper"> 
  <div class="columnWrapper">

    <!-- main content goes here -->
    <article class="main">
      
      
      <main>
<h2>Member Menu</h2>


<h3>Login Status</h3>
    <p>You are logged in as <?php echo $_SESSION['member']; ?>.</p>
    
    <form action="" method="post">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>
</main>


<div class="error">
      <?php if(!empty($error)) {echo $error;}?>
  </div>
      
    </article><!-- end main article -->

    <!-- first sidebar goes here -->
    <aside class="sidebar1">
      <!-- <h2>Sidebar 1</h2> -->
      <?php include '../view/member_sidebar1.php'; ?>
     <!-- <p> sidebar menu goes here<p> -->
    </aside><!-- end sidebar 1 -->
  </div><!-- end column wrapper -->

  <!-- second sidebar goes here -->
  <aside class="sidebar2">
  <h2>Sidebar 2 </h2>
<p>comments / testimonials

  </aside><!-- end sidebar 2 -->
</div><!-- end content wrapper -->

<?php include '../view/footer.php'; ?>