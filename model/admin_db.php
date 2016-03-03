<?php
function is_valid_admin_login($username, $password) {
    global $db;
    $query = '
        SELECT * FROM users
        WHERE users_username = :username AND users_password = :password AND users_userLevel = "a"';
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
    
}

function is_valid_member_login($username, $password) {
    global $db;
    $query = '
        SELECT * FROM users
        WHERE users_username = :username AND users_password = :password and users_userLevel = m';
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
    
}

function get_admins() {
    global $db;
    $query = 'SELECT * FROM users
              ORDER BY lastName';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}
?>