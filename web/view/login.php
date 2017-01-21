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
            Login | cit336-food-thecollegway.com
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
                            <input type="email" name="email" id="email" <?php if (isset($firstName)) {echo "value='$firstName'";} ?>><br>

<!--                            <label>Password:</label>
                            <input type="password"name="password" id="password"><br>-->
                            
                            <label>&nbsp;</label>
                            <input type="submit" name="action" value="login">
                        </form>
                    </div>
                </main>
            </div>
            <aside role="complementary">
                <!--This is info pertaining to the website as a whole-->
            </aside>
            <footer role="contentinfo">
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                    <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>