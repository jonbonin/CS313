<?php

//This function inserts info into the contact table
function contact_insert ($firstName, $lastName, $email, $password, $middleName = NULL, $phoneNumber = NULL){
    global $db;
    $query = 'INSERT INTO Contact (firstName, middleName, lastName,email, phoneNumber, password)
            VALUES
            ( :firstName
            , :middleName
            , :lastName
            , :email
            , :phoneNumber
            , :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':middleName', $middleName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phoneNumber', $phoneNumber);
    $statement->bindValue(':password', $password);
    $check = $statement->execute();
    $statement->closeCursor();
    return $check;
}

//This functions counts how many people are in each department
function countName() {
    global $db;
    $query = 'SELECT DepartmentName,
            COUNT(*)
            FROM Contact c
            INNER JOIN Department d
            ON c.department_ID = d.department_ID
            GROUP BY departmentName;';
    $statement = $db->prepare($query);
    $statement->execute();
    $department = $statement->fetchAll();
    $statement->closeCursor();
    return $department;
}

//grabs contacts that have the department position of Head, Admin or Seceratary
function directory_list() {
    global $db;

    $query = 'SELECT firstName, lastName, contacts_ID, email, phoneNumber, departmentName, positionName
            FROM Contact c
            INNER JOIN Department d
            ON c.department_ID = d.department_ID
            INNER JOIN DepartmentPosition dp
            ON c.departmentPosition_ID = dp.departmentPosition_ID
            WHERE PositionName = "Admin"
            OR PositionName = "Head"
            OR PositionName = "Seceratary"
            ORDER BY departmentName, lastName, firstName';
    $statement = $db->prepare($query);
    $statement->execute();
    $contacts = $statement->fetchAll();
    $statement->closeCursor();
    return $contacts;
}

//gets the departments from the database
function department_list() {
    global $db;
    $query = 'SELECT * FROM Department';
    $statement = $db->prepare($query);
    $statement->execute();
    $department = $statement->fetchAll();
    $statement->closeCursor();
    return $department;
}

//gets the subdepartments form the database
function subDepartment_list($department_ID) {
    global $db;
    $query = 'SELECT * 
              FROM SubDepartment
              WHERE department_ID = :department_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':department_ID', $department_ID);
    $statement->execute();
    $subDepartment = $statement->fetchAll();
    $statement->closeCursor();
    return $subDepartment;
}

//shows the contacts in a department
function searchDept($department) {
    global $db;
    $query = 'SELECT firstName, lastName, email, phoneNumber 
                FROM Contact 
                WHERE department = :department';
    $statement = $db->prepare($query);
    $statement->bindValue(':department', $department);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

//shows the contacts in a subDepartment
function searchSubDept($department, $subDepartment) {
    global $db;
    $query = 'SELECT firstName, lastName, email, phoneNumber 
                FROM Contact 
                WHERE department_ID = :department
                WHERE subDepartment_ID = :subDepartment';
    $statement = $db->prepare($query);
    $statement->bindValue(':department', $department);
    $statement->bindValue(':subDepartment', $subDepartment);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

// searches contact table by first name
function searchQuery($firstName) {
    global $db;
    $query = 'SELECT firstName, lastName, email, phoneNumber 
                FROM contact 
                WHERE firstName like :firstName';
    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName . '%');
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

// searches contact table by lastname
function searchQueryLast($lastName) {
    global $db;
    $query = 'SELECT firstName, lastName, email, phoneNumber 
                FROM Contact 
                WHERE lastName like :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $lastName . '%');
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

//This function pulls the biography of a particular person to be displayed
function pullBio($contact_ID){
    global $db;
    $query = 'SELECT bioBlurb
                FROM Biography b
                INNER JOIN Contact c
                  ON c.contacts_ID = b.contacts_ID
                WHERE c.contacts_ID = :contact_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(':contact_ID', $contact_ID);
    $statement->execute();
    $bio = $statement->fetchAll();
    $statement->closeCursor();
    return $bio;
}

// grabs the hash from the database and allows that to be compared with that password the user gave
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

// this will verify the user for updating information. for every use I hope
function verifyUser($email) {
    global $db;
    $query = 'SELECT firstName, lastName, departmentPosition
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