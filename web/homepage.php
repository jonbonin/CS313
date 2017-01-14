<!--
<?php

  phpinfo();

?>
-->

<?php

error_reporting(E_ALL);
if (!(isset($_SESSION))) {
    session_start();
}
require_once 'model/database.php';
require_once 'model/directory_db.php';

//front controller
//application controller
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

Switch ($action) {
    // this is the page that only the admin can see
    case 'Admin':
        $emailUpdate = filter_input(INPUT_POST, 'emailUpdate');
        include 'view/admin_tasks.php';
        break;
    //This is the 'search contacts' function for the directory page
    case'ajaxSearch':
        $firstName = filter_input(INPUT_GET, 'firstName');
        $lastName = filter_input(INPUT_GET, 'lastName');
        if (!is_null($firstName)) {
        $rawQuery1 = searchQuery($firstName);
//        $rawQuery = "hello";
        $json1 = json_encode($rawQuery1);
//            header('Content-Type: application/json');
        echo $json1;
//            break;
        } else/*if (!is_null($lastName))*/ {
            $rawQuery = searchQueryLast($lastName);
            $json = json_encode($rawQuery);
            echo $json;
//            header('Content-Type: application/json');
//            break;
        }
        break;
    //The following case pulls up the biography of the person that is clicked on
    case 'biography':
        $name = filter_input(INPUT_GET, 'name');
        $bio_ID = filter_input(INPUT_GET, 'contact_ID');
        $writtenBio = pullBio($bio_ID);
//        print_r(array_values($writtenBio));
        include'view/biography.php';
        break;
    //this takes you to the directory, and shows you the directory
    case 'directory':
        $contacts = directory_list();
        $department = department_list();
        include'view/directory.php';
        break;
    case 'exercises':
        include'exercises.php';
        break;
    case 'proposal':
        header('Content-Type: application/pdf');
//        header('Location: /dynamic_proposal.pdf');
        readfile('dynamic_proposal.pdf');
        break;
    //the following case takes you to the sign up page
    case 'sign_up':
        include'view/create_login.php';
        break;
    // the following case lets you sign up for the site
    case 'Sign Up':
        $firstName = filter_input(INPUT_POST, 'firstName');
        $middleName = filter_input(INPUT_POST, 'middleName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');
        $retypePassword = filter_input(INPUT_POST, 'retypePassword');
        // sets an error message if the values above ar  null or fale to validate
        if ($firstName == NULL || $lastName == NULL || $email == NULL || $email == FALSE || $password == NULL || $retypePassword == NULL) {
            $error_message = "Not enough information. Please type it in again and resubmit";
            include 'view/create_login.php';
        } else if ($password != $retypePassword) {
            $error_message = 'Passwords do not match. Retype and try again.';
            include 'view/create_login.php';
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
//                                  $firstName, $lastName, $email, $password, $middleName = NULL, $phoneNumber = NULL
            $check = contact_insert($firstName, $lastName, $email, $hash, $middleName, $phone);
            var_dump($check);
            if ($check == 1) {
                $contacts = directory_list();
                $error_message = 'The creation of your login has been succesful. Congratulations ' . $firstName . '!';
                include "view/home.php";
            } else {
                $contacts = directory_list();
                $error_message = "The insert into the database failed. please try again.";
                include "view/create_login.php";
            }
        }
        break;
    //the following case allows you to create a login for the page
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        $user = verifyLogin($email);
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = TRUE;
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['positionName'] = $user['positionName'];
            include "view/home.php";
        } else {
            $error_message = 'Please check your credentials, and try again.';
            include "view/login.php";
        }
        break;
    //the following case lets you view the login page
    case 'viewLogin';
        include 'view/login.php';
        break;
    //the following case allows you to the login page and lets you login
    case 'logout':
        $_SESSION = [];
        session_destroy();
        // second option to logout- keeps the placeholders with nothing really in them
        //third option to logout- removes session placeholders within the cookie, leaves cookie id intact using unset (session...)
        //the following case brings the user to the home page
        include 'view/home.php';
        break;
    //this takes you to the home page when the action is not set
    default:
        include'view/home.php';
        break;
}