<?php 
if(!(isset($_SESSION))){
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>
            Home Page | CIT336-Food-thecollegway.com
        </title>
    </head>
    <body>
        <div>
            <header>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <div>
                <main>
                    <div>
                        <h1>Create Your Login</h1>
                        <?php if (isset($error_message)){
                            echo "<p class = 'error'>".$error_message."</p>";
                        }?>

                        <form action="index.php" method="post">
                            <label><sup>*</sup>required fields</label><br><br>
                            
                            <label><sup>*</sup>First Name:</label>
                            <input type="text" name="firstName" id="firstName" <?php if (isset($firstName)){echo "value='$firstName'";} ?> required><br>

                            <label>Middle Name:</label>
                            <input type="text" name="middleName" id="middleName" <?php if (isset($firstName)){echo "value='$middleName'";} ?>><br>

                            <label><sup>*</sup>Last Name:</label>
                            <input type="text" name="lastName" id="lastName" <?php if (isset($firstName)){echo "value='$lastName'";} ?> required><br>

                            <label><sup>*</sup>Email:</label>
                            <input type="email" name="email" id="email" <?php if (isset($firstName)){echo "value='$email'";} ?> required><br>

                            <label>Phone Number:</label>
                            <input type="text" name="phone" id="phone" <?php if (isset($firstName)){echo "value='$phone'";}?>><br>

                            <label><sup>*</sup>Password:</label>
                            <input type="password" name="password" id="password" required><br>
                            
                            <label><sup>*</sup>Retype Password:</label>
                            <input type="password" name="retypePassword" id="retypePassword" required><br><br>

                            <label>&nbsp;</label>
                            <input type="submit" name="action" value="Sign Up">
                        </form>
                    </div>
                </main><br>
            </div>
            <!--aside-->
            <footer>
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                    <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>