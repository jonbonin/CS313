<!--robocopy C:\Users\Jonathan\cs313-php\web C:\Bitnami\wappstack-5.6.29-0\apache2\htdocs /mon:1 /r:200 /e-->
<?php

//if the session is not started, the following will start it
error_reporting(E_ALL);
if (!(isset($_SESSION))) {
    session_start();
}

require_once 'model/database.php';

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
    //This section deals with logging in and loggin out

    case 'createLogin':
        include 'view/create_login.php';
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

    //dealing with the cart related things now
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

    // the default action takes you to the home page
    // default case triggeredn when action == ''
    default:
        include'view/home.php';
        break;
}