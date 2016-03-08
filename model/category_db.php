<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY cat_categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE cat_categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['cat_categoryName'];
    return $category_name;
}

function add_category($name){
	global $db;
	$query = 'INSERT INTO categories
                 (cat_categoryID, cat_categoryName)
              VALUES
                 (null, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM categories WHERE cat_categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function detect_category_name($name){
	global $db;
	$sql = "Select cat_categoryName from categories where cat_categoryName = '$name'";
	$stmt = $db->prepare($sql);
	$stmt->execute();
		if($data = $stmt->fetch()){
                    $error = "The Category Name you entered is already in the database, please try another name.";
		} else {
                    add_category($name);
                    
		}
}
// update category not working
function update_category($category_id, $category_name) {
    global $db;
    print_r($category_name);
    print_r($category_id);
    $query = '
        UPDATE categories
        SET cat_categoryName = :category_name
        WHERE cat_categoryID = :category_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $category_name);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
}

?>