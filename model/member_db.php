<?php
function add_registration($customer_id, $product_code) {
    global $db;
    $date = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query = 'INSERT INTO registrations VALUES
              (:customer_id, :product_code, :date)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':product_code', $product_code);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_member( $username, $password, $userLevel) {
    global $db;
    $password = sha1($username . $password);
    $query = 'INSERT INTO users
                 (users_userID, users_username, users_password, users_userLevel)
              VALUES
                 (NULL, :users_username, :users_password, :users_userLevel)';
    $statement = $db->prepare($query);
//    $statement->bindValue(':users_userID', $userid);
    $statement->bindValue(':users_username', $username);
    $statement->bindValue(':users_password', $password);
    $statement->bindValue(':users_userLevel', $userLevel);
    $statement->execute();
    $statement->closeCursor();
}

function get_hashed_password($username){
    $query = 'SELECT users_password from users where users_username = $username';
    $statement = $db->prepare($query);
    $statement->execute();
    $hashedPassword = $statement->fetch();
    $statement->closeCursor();
    return $hashedPassword;
}

function is_valid_member_login($username, $password) {
    global $db;
    $password = sha1($username . $password);
    $query = '
        SELECT * FROM users
        WHERE users_username = :username AND users_password = :password AND users_userLevel = "m"';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    if ($statement->rowCount() == 1) {
        $valid = true;
    } else {
        $valid = false;
    }
    $statement->closeCursor();
    return $valid; 
//    http://jayblanchard.net/proper_password_hashing_with_PHP.html
}

// check for existing room name
function detect_member_name($name){
	global $db;
	$sql = "Select users_username from users where users_username = '$name'";
	$stmt = $db->prepare($sql);
	$stmt->execute();
		if($data = $stmt->fetch()){
			$error_message = "The username you entered is already in the database, please try another name.";
                        include 'register.php';
		} else {
			return false;
		}
}
?>