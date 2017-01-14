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
            <?php echo $name?> Bio in C4
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
                        <h1>Bio of <?php echo $name?></h1>
                        <!--The main content of the page will go here-->
                        <p><?php foreach($writtenBio as $writtenBio){
                            echo $writtenBio['bioBlurb'].'<br>';
                        } ?> </p>
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