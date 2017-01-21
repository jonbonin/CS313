<?php

//if the session is not started, the following will start it
if (!(isset($_SESSION))) {
    session_start();
}

//This checks the get and the post for the action
//If there is no action, action is set to ''
//Empty action triggers the defualt switch case
//Essentially takes you to home page
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'viewLogin':
        include'view/login.php';
        break;
        
    case 'login':
        // for checking login credentials against database, check other index file
        $username = filter_input($INPUT_POST, 'username');
        if ((isset($username))){
            $_SESSION['username'] = $username;
        }
        
        if ($_SESSION['username'] != NULL){
            $_SESSION['login'] = TRUE;
            $_SESSION['username'] = $username;
            include "view/home.php";
        } else {
            $error_message = 'Please check your credentials, and try again.';
            include "view/login.php";
        }
        break;
        
    default:
        include'view/home.php';
        break;
}