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
            Page Title | cit336-food-thecollegway.com
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
                        <h1>Describing Me</h1>
                        <img src="/media/image/profilePic.jpg" title="My Beautiful Picture">
                        <p>I am currently in my 8th semester of college. The major that I have decided to go into is web development with a business emphasis. The reason that I am going down this route is because I enjoy the learning process of challengingmys self when I am making a new website or project. It is aslo a lot of fun for me to be able to create what a will oiled web site with just text and to be able to go through that creative process.</p>
                        <p>I have from the San Francisco pay area, and I went to Georgia on my mission. I have had a lot of fun in both places, and have learned a lot.Although, with life, there is always a lot to learn.</p>
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