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
            Home | Nameless Temple
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
                        <h1>My Home Page</h1>
                        <p>Content forthcoming</p><br>
                        <p>I am taking a business class right now, and I am thinking that this web site could be a site about perceptual maps. Perceptual maps are a graph like document that tells where a certain technological item lies with societies expectations are. There are two general categories: high tech or low tech items. I am not sure how I would program this, but I am thinking that I can provide the service of letting people know where an item stands on that perceptual map.</p>
                        <p><b>Note:</b>I am currently having logout troubles. I am not sure why.</p>
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