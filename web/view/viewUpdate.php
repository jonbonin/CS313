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
            Product Update | Nameless Temple
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
                        <h1>Update your product here</h1>
                        <?php
                        if (isset($error_message)) {
                            echo "<p class = 'error'>" . $error_message . "</p>";
                        }
                        ?>
                        <form action="index.php" method="post">
                            <table>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Product Name:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="productName" value="<?php echo $products[0]['productname']; ?>" id="productName" <?php
                                        if (isset($productName)) {
                                            echo "value='$productName'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Product Category:</label>
                                    </th>
                                    <th>
                                        <input type="text" name="productCategory" value="<?php echo $products[0]['productcategory'] ?>" id="productCategory" if <?php
                                        if (isset($productCategory)) {
                                            echo "value='$productCategory'";
                                        }
                                        ?>required>
                                    </th>
                                <tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Width:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any" name="width" value="<?php echo $products[0]['width'] ?>" id="width" <?php
                                        if (isset($width)) {
                                            echo "value='$width'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Height:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="height" value="<?php echo $products[0]['height'] ?>" id="height" <?php
                                        if (isset($height)) {
                                            echo "value='$height'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Depth:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="depth" value="<?php echo $products[0]['depth']?>" id="depth" <?php
                                        if (isset($depth)) {
                                            echo "value='$depth'";
                                        }
                                        ?> required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Performance:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="performance" value="<?php echo $products[0]['performance'] ?>" id="performance" <?php
                                        if (isset($performance)) {
                                            echo "value='$performance'";
                                        }
                                        ?>  required>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="createLoginCell1">
                                        <label>Price:</label>
                                    </th>
                                    <th>
                                        <input type="number" min="0" step="any"  name="price" value="<?php echo $products[0]['price'] ?>" id="price" <?php
                                               if (isset($price)) {
                                                   echo "value='$price'";
                                               }
                                               ?> required>
                                    </th>
                                <tr>
                            </table>
                            <input type="hidden" name="product_id" value ="<?php echo $product_id?>">
                            <input type="hidden" name="action" value="productUpdate">
                            <label>&nbsp;</label>
                            <input type="submit" value="Update Your Product">
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