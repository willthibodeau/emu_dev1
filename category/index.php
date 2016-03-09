<?php
echo 'category manager index';
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_categories';
    }
}

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
     $product_id = filter_input(INPUT_POST, 'product_id', 
        FILTER_VALIDATE_INT);
     if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    if ($product_id == NULl || $product_id == FALSE) {
        $product_id = 1;
    }

    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    $imagepaths = get_imagepath($product_id);
    print_r($imagepaths);
    print_r($products);
    include('product_list.php');

} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
     if ($category_id == NULL || $category_id == FALSE ||
             $product_id == NULL || $product_id == FALSE) {
         $error = "Missing or incorrect product id or category id.";
         
     } else { 
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
     }

} else if ($action == 'show_add_form') {
    $imagepaths = get_imagepath();
    $categories = get_categories();
    include('product_add.php'); 

} else if ($action == 'add_product') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price');
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        $categories = get_categories();
        include('product_add.php');
   } else { 
       $message = "you have successfully entered". $name;
        add_product($category_id, $code, $name, $description, $price);
        header('Location: .?action=show_add_form');
        
    }

} else if ($action == 'list_categories') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $products = get_products_by_category($category_id);
    

    include('category_list.php');

} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Name cannot be empty, Please check name and try again.";
        header('Location: .?action=list_categories');

        // include('../view/error.php');
    } else {
        $detectRoomName = detect_category_name($name);
//        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }

} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    
    header('Location: .?action=list_categories');      // display the Category List page

}  else if ($action == 'update_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $category_name = filter_input(INPUT_POST, 'category_name');
    print_r($category_name);
    print_r($category_id);
    
    update_category($category_id, $category_name);

    header('Location: .?action=list_categories');
} else if ($action == 'logout'){ 
        unset($_SESSION['admin']);
        header('Location: ..' );
       } 
?>