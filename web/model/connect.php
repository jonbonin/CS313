<?php

function contact_insert ($firstName, $lastName, $email, $hash, $username){
    global $db;
    $query = 'INSERT INTO users (firstName, lastName, email, userame, password)
            VALUES
            ( :firstName
            , :lastName
            , :email
            , :username
            , :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    $check = $statement->execute();
    $statement->closeCursor();
    return $check;
}

function verifyLogin($email) {
    global $db;
    $query = 'SELECT firstName, lastName, password, positionName
                FROM Contact c
                INNER JOIN DepartmentPosition dp
                ON c.departmentPosition_ID = dp.departmentPosition_ID
                WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}