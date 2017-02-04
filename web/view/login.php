<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>
            Nameless Temple Login
        </title>
    </head>
    <body>
        <div>
            <header role="banner">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <div>
                <main role="main">
                    <div>
                        <h1>Please Login!</h1>
                        <?php if (isset($error_message)){
                            echo "<p class = 'error'>".$error_message."</p>";
                        }?>
                        <form action="index.php" method="post">
                            <label>Username:</label>
                            <input type="text" name="username" id="username" <?php if (isset($username)) {echo "value='$username'";} ?>><br>

                            <label>Password:</label>
                            <input type="password"name="password" id="password"><br>
                            
                            <label>&nbsp;&nbsp;</label>
                            <input type="submit" name="action" value="login">
                        </form>
                        <p>Don't have an account? Sign in <a href="?action=createLogin">here</a>.</p>
                    </div>
                </main>
            </div>
            <footer role="contentinfo">
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                    <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>