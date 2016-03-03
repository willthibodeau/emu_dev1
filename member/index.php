<?php
echo 'member index.php';
require('../model/database.php');
require('../model/product_db.php');
require('../model/member_db.php');

// Start session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['member'])) {    // Skip login if customer is in the session
            $action = 'member_menu';
        } else {
            $action = 'register';
        }
    }
}
//instantiate variable(s)
$email = '';

switch ($action) {
    case 'member_menu':
        include('member_menu.php');
        break;
    case 'display_register':
        // If customer is not in the session, set it in the session
        if (!isset($_SESSION['customer'])) {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            if (is_valid_customer_login($email, $password)) {
                $customer = get_customer_by_email($email);
                $_SESSION['customer'] = $customer;
            }            
        }

        $customer = $_SESSION['customer'];
        $products = get_products();
        include('product_register.php');
        break;
    case 'register_product':
        $customer = $_SESSION['customer'];
        $product_code = filter_input(INPUT_POST, 'product_code');

        add_registration($customer['customerID'], $product_code);
        $message = "Product ($product_code) was registered successfully.";

        include('product_register.php');
        break;
    case 'logout':
        unset($_SESSION['customer']);
        include('customer_login.php');
        break;
}
?>