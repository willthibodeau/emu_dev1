<?php 
include '../view/header.php'; 

?>

<div class="contentWrapper"> 
    <div class="columnWrapper">

        <!-- main content goes here -->
        <article class="main">
            <main>
            <p>You are logged in as <?php echo $_SESSION['admin']; ?>.</p>

             <h1>Add Product</h1>
                <form action="." method="post" >
                    <input type="hidden" name="action" value="add_product">
                <select name="category_id">
                    <?php foreach ($categories as $category) : ?>
                    
                        <option value="<?php echo $category['cat_categoryID']; ?>"><?php echo $category['cat_categoryName']; ?>
                         
                        </option> 
                    
                    <?php endforeach; ?>
                </select><br>

                    <label>Code:</label>
                    <input type="text" name="code" ><br>


                    <label>Name:</label>
                    <input type="text" name="name" ><br>

                    <label>Description:</label>
                    <input type="text" name="description" ><br>

                    <label>Price:</label>
                    <input type="text" name="price" >
                    <label class="message"></label><br>

                    <label>&nbsp;</label>
                    <input type="submit" value="Add Product" /><br>
                </form>
             
                 <div class="error">
                  <?php if(!empty($error)) { echo $error; } ?>
                </div> 
             
                <p><a href="?action=list_products">View Product List</a></p>
            </main>
        </article><!-- end main article -->

        <!-- first sidebar goes here -->
    <aside class="sidebar1">
      <h2>Sidebar 1</h2>
      <?php include '../view/admin_sidebar1.php'; ?>
     
    </aside><!-- end sidebar 1 -->
  </div><!-- end column wrapper -->

    <!-- second sidebar goes here -->
    <aside class="sidebar2">
        <h2>Sidebar 2 </h2>
        <p>comments / testimonials</p>

    </aside><!-- end sidebar 2 -->
</div><!-- end content wrapper -->


<?php include '../view/footer.php'; ?>