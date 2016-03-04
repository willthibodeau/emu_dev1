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
        $error_message = "";
        include('member_login.php');
        break;
    
    case 'member_menu':
        include('member_menu.php');
        break;
    
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        
        if($username == NULL || $username == FALSE || $password == NULL || $password == FALSE){
            $error_message = 'You must enter a username and password.';
            include 'member_login.php';
        } else if (is_valid_member_login($username, $password)) {
            $_SESSION['member'] = $username;
            $error_message = " ";
            include 'member_menu.php';
        } else {
            $error_message = 'Login failed. Invalid email or password.';
            include 'member_login.php';
        }
        break;
        
    case 'register':
        include 'register.php';
        break;
    
    case 'register_now': 
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userLevel = filter_input(INPUT_POST, 'userLevel', FILTER_SANITIZE_STRING);
        add_member(  $username, $password, $userLevel);
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

Title 	
Test
Details
Strong Password
Expression 	
^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$
Description 	
Password between 8 and 20 characters; must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character, but cannot contain whitespace.
Matches 	
Abc1234# | abcD$123 | A1b2&C3!
Non-Matches 	
abcd1234 | AbCd!@#$ | Abc 123#