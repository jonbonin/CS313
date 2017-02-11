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
    $query = 'SELECT firstName, lastName, password, username
              FROM users';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function product_list() {
    global $db;

    $query = 'SELECT productname, productcategory, width, height, depth, performance, price FROM product';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
