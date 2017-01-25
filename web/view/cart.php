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
                        <h1>This is Your Cart</h1>
                        <h4>Supposedly</h4>
                        <p>The following is the var dump of the post array</p>
                        <p><?php var_dump($_POST); ?></p><br>
                        <p>The following is the print_r of the post array</p>
                        <p><?php print_r($_POST) ?></p><br>
                        <p>The following is a function that is made to print arrays</p>
                        <p><?php
                            printArray($_POST);

                            function printArray($array) {
                                foreach ($array as $key => $value) {
                                    echo "$key => value";
                                    if (is_array($value)) {
                                        printArray($value);
                                    }
                                }
                            }
                            ?></p><br>
                        <p>Essentially, what I am saying is that I don't know what I am doing. I am trying to put the information needed into the post array. The needed information does get there, but getting it to display out of that array is what I am having trouble with. I went into the tutoring lab to get help, but to no avail. I know there is a way to get it working, but I haven't been able to make it work. </p>
                        <p>I am trying to make this according to the MVC model, and that might be what is making this harder. Although I am doing it in an effort to the long run a little easier. Because we are going be using a database, and you mentioned that we are going to be using the MVC model in the future. I have looked at the demo that you made in class to try and convert it to what I am trying to do, as well as looking at other online sources. Neither have helped in terms of making the form work.</p>
                        <p>Long story short, I have tried to make it work, but it hasn't.</p>
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