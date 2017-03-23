<?php

function contact_insert($firstName, $lastName, $email, $hash, $username) {
    global $db;
    $query = 'INSERT INTO users (firstname, lastname, email, password, username)
            VALUES
            ( :firstName
            , :lastName
            , :email
            , :password
            , :username)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':username', $username);
    $check = $statement->execute();
    $statement->closeCursor();
    return $check;
}

function verifyLogin($username) {
    global $db;
    $query = 'SELECT user_id, password, username
              FROM users
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function product_list($user_id) {
    global $db;

    $query = 'SELECT product_id, productname, productcategory, width, height, depth, performance, price
            FROM product
            WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

//The following deals with updating a product
function select_update($product_id, $user_id) {
    global $db;

    $query = 'SELECT productname, productcategory, width, height, depth, performance, price
            FROM product
            WHERE user_id = :user_id
            AND product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
function update_list($product_id, $user_id, $productName, $productCategory, $width, $height, $depth, $performance, $price){
        global $db;

    $query = 'UPDATE product SET 
        productname = :productname 
        , width = :width
	, height = :height
	, depth = :depth
	, performance = :performance
	, price = :price
	, productcategory = :productcategory
    WHERE product_id = :product_id
    AND user_id = :user_id;';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':productname', $productName);
    $statement->bindValue(':productcategory', $productCategory);
    $statement->bindValue(':width', $width);
    $statement->bindValue(':height', $height);
    $statement->bindValue(':depth', $depth);
    $statement->bindValue(':performance', $performance);
    $statement->bindValue(':price', $price);
    $check = $statement->execute();
    $statement->closeCursor();
    
    return $check;
}

function product_insert($productName, $productCategory, $width, $height, $depth, $performance, $price, $user_id) {
    global $db;
    $query = 'INSERT INTO product (productname, productcategory, width, height, depth, performance, price, user_id)
            VALUES
            ( :productName
            , :productCategory
            , :width
            , :height
            , :depth
            , :performance
            , :price
            , :user_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':productName', $productName);
        $statement->bindValue(':productCategory', $productCategory);
        $statement->bindValue(':width', $width);
        $statement->bindValue(':height', $height);
        $statement->bindValue(':depth', $depth);
        $statement->bindValue(':performance', $performance);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':user_id', $user_id);
        $check = $statement->execute();
        $statement->closeCursor();
        return $check;
}
