<?php include '../view/header.php'; 

?>

<div class="contentWrapper"> 
  <div class="columnWrapper">

    <!-- main content goes here -->
    <article class="main">
     
      <main>
 
    
   <h2>Member Registration</h2>
    <form action="." method="post" id="register_form">
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
   <br>
   <div>
       <p>Password between 8 and 20 characters; must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character, but cannot contain whitespace.
Matches 	
Abc1234# | abcD$123 | A1b2&C3!
Non-Matches 	
abcd1234 | AbCd!@#$ | Abc 123#</p>
  </div>
  <div class="error">
      <?php if(!empty($error)) {echo $error;}?>
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