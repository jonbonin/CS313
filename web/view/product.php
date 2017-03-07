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
            Products | Nameless Temple
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
                        <h1>All of Your Products Lay Here</h1>
                        <?php
                        if ($_SESSION['login'] !== 'true'){
                            $error_message = 'You are not logged in. You will not be able to see the graph tied with your products.';
                        }
                        ?>
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
                                        <label><sup>*</sup>Product Name:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="productName" placeholder="ELT Symphonic Holographic Display" id="productName" <?php
                                        if (isset($productName)) {
                                            echo "value='$productName'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Product Category:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="productCategory" placeholder="Holographic Display" id="productCategory" if <?php
                                        if (isset($productCategory)) {
                                            echo "value='$productCategory'";
                                        }
                                        ?>required>
                                    </th>
                                <tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Width:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any" name="width" placeholder="10.35" id="width" <?php
                                        if (isset($width)) {
                                            echo "value='$width'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Height:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="height" placeholder="11.78" id="height" <?php
                                        if (isset($height)) {
                                            echo "value='$height'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Depth:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="depth" placeholder="9.27" id="depth" <?php
                                        if (isset($depth)) {
                                            echo "value='$depth'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Performance:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="performance" placeholder="7.23" id="performance" <?php
                                        if (isset($performance)) {
                                            echo "value='$performance'";
                                        }
                                        ?>  required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label><sup>*</sup>Price:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="price" placeholder="419.99" id="price" <?php
                                               if (isset($price)) {
                                                   echo "value='$price'";
                                               }
                                               ?> required>
                                    </th>
                                <tr>
                            </table>
                            <input type="hidden" name="action" value="productInsert">
                            <label>&nbsp;</label>
                            <input type="submit" value="Insert Your Product">
                        </form>
                        <p><b>Product Name:</b> Here you want to input the name of your product. If you are looking at Amazon, this will be the title of the page. This might be something like PlayStation 3 or Xbox 360.</p>
                        <p><b>Product Category:</b> This is the general category of the product what it is you are showing in your graph. This helps to narrow that is being show to you on the graph page. Here you would input  something like "gaming console", to follow the previous example.</p>
                        <p><b>Performance:</b> This is a rating of the particular product. Amazon can give an average rating of customer reviews, and as such this number will be input here. This will typically be below ten. For the sake of comparing products, choose one system and stick with it throughout your graphing experience.</p>
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