<?php

//if the session is not started, the following will start it
//error_reporting(E_ALL);
if (!(isset($_SESSION))) {
    session_start();
}

require_once 'model/database.php';
require_once 'model/connect.php';

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
    //This section deals with login, logout, and create login

    case 'createLogin':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $retypePassword = filter_input(INPUT_POST, 'retypePassword');

        // sets an error message if the values above ar  null or fail to validate
        if ($firstName == NULL || $lastName == NULL || $email == NULL || $email == FALSE || $username == NULL || $password == NULL || $retypePassword == NULL) {
            $error_message = "The information given is incorrect or there is insuficient data. Please check or retype information and resubmit.";
            include 'view/create_login.php';
        } else if ($password != $retypePassword) {
            $error_message = 'Passwords do not match. Retype and submit again.';
            include 'view/create_login.php';
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $check = contact_insert($firstName, $lastName, $email, $hash, $username);
            if ($check == 1) {
                $error_message = 'The creation of your login has been succesful. Congratulations ' . $username . '!';
                include "view/home.php";
            } else {
                $error_message = "Our fault: The creation of your login credentals failed. Please try again.";
                include "view/create_login.php";
            }
        }
        break;

    case 'login':
        // for checking login credentials against database, check other index file
        $username = filter_input($INPUT_POST, 'username');

        if ((isset($username))) {
            $_SESSION['username'] = $username;
        } else {
            $error_message = 'Please check your credentials, and try again.';
            include "view/login.php";
        }

        if ($_SESSION['username'] != NULL) {
            $_SESSION['login'] = TRUE;
            $_SESSION['username'] = $username;
            include "view/home.php";
        } else {
            $error_message = 'Please check your credentials, and try again.';
            include "view/login.php";
        }
        break;

    case 'logout':
        $_SESSION = [];
        session_reset();
        //second option to logout- keeps the placeholders with nothing really in them
        //third option to logout- removes session placeholders within the cookie, leaves cookie id intact using unset (session...)
        include 'view/home.php';
        break;

    // the following has to deal with links
    //change to post?
    case 'describeMe':
        include 'view/describeMe.php';
        break;

    case 'homework':
        include 'view/homework.php';
        break;

    case 'product':
        include 'view/product.php';
        break;


    case 'viewLogin':
        include'view/login.php';
        break;

    case 'createLoginForm':
        include "view/create_login.php";
        break;

    //dealing with the cart related things
    case 'addToCart':
        $productName = $_POST["product"];
        $productCount = $_POST["productCount"];
        $_SESSION["product"] = $productName;
        $_SESSION["productCount"] = $productCount;
        include 'view/product.php';
        break;

    case 'viewCart':
        include 'view/cart.php';
        break;

    case 'shopCart':
        include 'view/temp_shop_cart.php';
        break;

//this is the stuff ealing with all of the graphs
    case 'myGraphs':
        $products = product_list();
        include'view/graph.php';
        break;
    
    case 'productInsert':
        $productName = filter_input(INPUT_POST, 'firstName');
        $productCategory = filter_input(INPUT_POST, 'lastName');
        $width = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $height = filter_input(INPUT_POST, 'username');
        $depth = filter_input(INPUT_POST, 'password');
        $performance = filter_input(INPUT_POST, 'retypePassword');
        $price = filter_input(INPUT_POST, 'retypePassword');
        
        if ($productName == NULL || $productCategory == NULL || $width == NULL || $height == NULL || $depth == NULL || $performance == NULL || $price == NULL) {
            $error_message = "The information given is incorrect or there is insuficient data. Please check or retype information and resubmit.";
            include 'view/product.php';
        } else {
            $check = product_insert($productName, $productCategory, $width, $height, $depth, $performance, $price);
            if ($check == 1) {
                $error_message = 'Your products have been recorded. Congratulations ' . $username . '!';
                include "view/home.php";
            } else {
                $error_message = "Our fault: The recording of your products has failed. Please try again.";
                include "view/create_login.php";
            }
        }
        break;

    // the default action takes you to the home page
    // default case triggered when action == ''
    default:
        include'view/home.php';
        break;
}