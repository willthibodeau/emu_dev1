<?php 
echo 'this is the product list.php in categories';
include '../view/header.php'; 
require_once('../util/valid_admin.php');

?>

<div class="contentWrapper"> 
    <div class="columnWrapper">
        <main>
            <article class="main">
                <p>You are logged in as <?php echo $_SESSION['admin']; ?>.</p>
                <h1>Product List</h1>

               

                <section>

<table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><a href=".?category_id=<?php echo $category['cat_categoryID']; ?>"><?php echo $category['cat_categoryName']; ?></a></td>
            <td>
                
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

                    <!-- display a table of products -->
                    <h2>Category <?php echo $category_name; ?></h2>
                    <table>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="right">Price</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?php echo $product['prod_prodCode']; ?></td>
                            <td><?php echo $product['prod_productName']; ?></td>
                            <td><?php echo $product['prod_description']; ?></td>
                            <td class="right"><?php echo $product['prod_price']; ?></td>
                            <td><form action="." method="post">
                                <input type="hidden" name="action"
                                       value="delete_product">
                                <input type="hidden" name="product_id"
                                       value="<?php echo $product['prod_productID']; ?>">
                                <input type="hidden" name="category_id"
                                       value="<?php echo $product['prod_categoryID']; ?>">
                                <input type="submit" value="Delete">
                            </form></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <p><a href="?action=show_add_form">Add Product</a></p>
                    <p><a href="/emu_dev1/category/">List Categories</a></p>        
                </section>

                <form action="" method="post">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" value="Logout">
                </form>
            </article>
        </main>

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