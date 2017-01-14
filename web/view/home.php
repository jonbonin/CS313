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
            Home Page | CIT336-Food-thecollegway.com
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
                        <h1>Introduction To Us</h1>
                        <h2>Mission Statement</h2>
                        <p>
                            Our mission is four fold, and since it is, we have named our society and built its foundation around the 4 C's that makes up our name.
                            <b>Connect Create Collaborate Conference</b> 
                        </p>
                        <dl>
                            <dt><b>Connect</b></dt>
                            <dd>Bring together the business and the community world together, making connections that people did not have previously.</dd>
                            <dt><b>Create</b></dt>
                            <dd>We want this Society to be able to create beneficial experiences that people can use to build their resume's, as well as having something to look back on.</dd>
                            <dt><b>Collaborate</b></dt>
                            <dd>We want to have collaborative efforts within and without the society, so that we all can become better, as well as to share what we know with others.</dd>
                            <dt><b>Conference</b></dt>
                            <dd>Not only do we want to stimulate the local economy in a different, efficient and useful way, we want to be able to converse with those that around us.</dd>
                        </dl>

                        <p>
                            C4, IS and WILL be “explosive” as it follows its scientific connotation. 
                            In music, C4 is the middle key of the piano.  
                            Just like the piano,  we want to create the crossroads between the professional world and our educational system,
                            between the solo artist and other trades to a create a network of professionals who work together to engineer bigger and better ideas and bring them to life. 
                            In other words we want to create the crossroads of a more efficient and successful society.<br>
                            As you can see, C4 has many meanings. We want to be there to help you.
                        </p>
                    </div>
                    <br>
                </main>
            </div>
            <!--aside-->
            <footer role="contentinfo">
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                    <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>