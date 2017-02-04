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
                        <h3>What My Site is About</h3>
                        <p>I am taking a business class right now, and I am going to make a web site about perceptual maps. Perceptual maps are a graph like document that tells where a certain technological item lies within the spectrum of what the customers' expectations are. Essentially what the customers want and where the products actually are, are displayed on the same graph.</p>
                        <p>There are two general categories: high tech and low tech items. A low tech product is something that has been around for a few years, and has been proven. Like computers, they are a proven product, but the are continually getting smaller and faster. The high tech are brand new products, which are slightly experimental and bravely innovate, like the <a href="https://www.myo.com/" target="_blank">Myo</a>. Since there are two different categories, two different expectations come with those categories, and are thus two different areas on the perceptual graph are needed to accurately display the information that the perceptual map gives..</p>
                        <p><b>Please Note:</b>I am developing a live site of the course of a few months. So if something does not work right away, please give me some time. One of the problems is that I am currently having logout troubles. Not entirely sure why at the moment. </p>
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