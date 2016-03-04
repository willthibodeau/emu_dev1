<?php
require('../model/database.php');
require('../model/member_db.php');


session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['member'])) {    
            $action = 'member_menu';
        } else {
            $action = 'view_login';
        }
    }
}

switch ($action) { 
    case 'view_login':
        include('member_login.php');
        break;
    case 'member_menu':
        include('member_menu.php');
        break;
    case 'login':
       
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        echo $username;
        // If valid username/password, login
        if (is_valid_member_login($username, $password)) {
            $_SESSION['member'] = $username;
            $error_message = " ";
        } else {
            $error_message = 'Login failed. Invalid email or password.';
        }
        include 'member_menu.php';
        break;
    case 'register':
        include 'register.php';
        break;
    case 'register_now':
        
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userLevel = filter_input(INPUT_POST, 'userLevel', FILTER_SANITIZE_STRING);
 
        add_member(  $username, $password, $userLevel);
        print_r(add_member( $username, $password, $userLevel));
        include('successful.php');
        break;        
    case 'logout':
        unset($_SESSION['member']);
        header('Location: ..' );
        break;
    default:
        echo 'Unknown action: ' . $action;
        break;
}
?>