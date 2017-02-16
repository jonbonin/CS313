<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>
            Nameless Temple Create Login
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
                        <?php
                        if (isset($error_message)) {
                            echo "<p class = 'error'>" . $error_message . "</p>";
                        }
                        ?>

                        <form action="index.php" method="post">

                            <label><sup>*</sup>required fields</label><br><br>

                            <table>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>First Name:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="firstName" id="firstName" placeholder="John" <?php
                                        if (isset($firstName)) {
                                            echo "value='$firstName'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Last Name:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="lastName" id="lastName" placeholder="Smith" <?php
                                        if (isset($firstName)) {
                                            echo "value='$lastName'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Email:</label>
                                    </th>
                                    <th>
                                        <input type="email" name="email" id="email" placeholder="JSmith@gmail.com" <?php
                                        if (isset($firstName)) {
                                            echo "value='$email'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Username:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="username" id="username" placeholder="JSmithy"<?php
                                        if (isset($firstName)) {
                                            echo "value='$username'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Password:</label>
                                    </th>
                                    <th>
                                        <input type="password" name="password" id="password" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Retype Password:</label>
                                    </th>
                                    <th>
                                        <input type="password" name="retypePassword" id="retypePassword" required>
                                    </th>
                                <tr>
                            </table>
                            <label>&nbsp;</label>
                            <input type="submit" name="action" value="createLogin">
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