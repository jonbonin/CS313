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
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password');
        $retypePassword = filter_input(INPUT_POST, 'retypePassword');

        // sets an error message if the values above ar  null or fail to validate
        if (empty($firstName) || empty($lastName) || empty($email) || empty($email) || empty($username) || empty($password) || empty($retypePassword)) {
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
                include "view/login.php";
            } else {
                $error_message = "Our fault: The creation of your login credentals failed. Please try again.";
                include "view/create_login.php";
            }
        }
        break;

    case 'login':
        // for checking login credentials against database, check other index file
        $username = filter_input($INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password');

        $user = verifyLogin($username);
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = TRUE;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['user_id'];
            include "view/home.php";
        } else {
            $error_message = 'Please check your credentials, and try again.';
            include "view/login.php";
        }
        break;

    case 'logout':
        $_SESSION = [];
        session_unset();
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

    //dealing with the cart related things (homework)
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
//the following deals with updating products
    case'viewUpdate':
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $products = select_update($product_id, $user_id);
        include 'view/viewUpdate.php';
        break;

    case'productUpdate':
        $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
        $productCategory = filter_input(INPUT_POST, 'productCategory', FILTER_SANITIZE_STRING);
        $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_FLOAT);
        $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
        $depth = filter_input(INPUT_POST, 'depth', FILTER_VALIDATE_FLOAT);
        $performance = filter_input(INPUT_POST, 'performance', FILTER_VALIDATE_FLOAT);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $user_id = $_SESSION['user_id'];
        $product_id = filter_input($INPUT_POST, 'product_id');

        if (empty($productName) || empty($productCategory) || empty($width) || empty($height) || empty($depth) || empty($performance) || empty($price)) {
            $error_message = "The information given is incorrect or there is insuficient data. Please check or retype information and resubmit.";
            include 'view/viewUpdate.php';
        }
        
        $check = update_list($product_id, $user_id, $productName, $productCategory, $width, $height, $depth, $performance, $price);
        if ($check == true) {
            $error_message = 'Your updates have been recorded. Congratulations ' . $username . '!';
            header('location: /view/graph.php');
        } else {
            $error_message = "Our fault: The recording of your products has failed. Please try again.";
            include "view/viewUpdate.php";
        }

        break;

//this is the stuff dealing with all of the graphs
    case 'myGraphs':
        $volume = array();
        $_SESSION['volume'] = $volume;

        $user_id = $_SESSION['user_id'];
        $products = product_list($user_id);
        include'view/graph.php';
        break;

    case 'productInsert':
        $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING);
        $productCategory = filter_input(INPUT_POST, 'productCategory', FILTER_SANITIZE_STRING);
        $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_FLOAT);
        $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
        $depth = filter_input(INPUT_POST, 'depth', FILTER_VALIDATE_FLOAT);
        $performance = filter_input(INPUT_POST, 'performance', FILTER_VALIDATE_FLOAT);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $user_id = $_SESSION['user_id'];

        $check = product_list($_SESSION['user_id']);

        if (empty($productName) || empty($productCategory) || empty($width) || empty($height) || empty($depth) || empty($performance) || empty($price)) {
            $error_message = "The information given is incorrect or there is insuficient data. Please check or retype information and resubmit.";
            include 'view/product.php';
        } else if ($productName == $check['productname'] && $productCategory == $check['productcategory'] && $width == $check['width'] && $depth) {
            
        } else {
            $check = product_insert($productName, $productCategory, $width, $height, $depth, $performance, $price, $user_id);
            if ($check == 1) {
                $error_message = 'Your products have been recorded. Congratulations ' . $username . '!';
                header('location: /view/graph.php');
            } else {
                $error_message = "Our fault: The recording of your products has failed. Please try again.";
                include "view/product.php";
            }
        }
        break;

    // the default action takes you to the home page
    // default case triggered when action == ''
    default:
        include'view/home.php';
        break;
}