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
            Nameless Temple Graphs
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
                        <h1>Let's See Your Products</h1>
                       <table class = 'products'>
                            <tr>
                                <th>Product Name</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Depth</th>
                                <th>Volume</th>
                                <th>Performance</th>
                                <th>Price</th>
                            </tr>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?php echo $product['productname'] ?></td>
                                    <td><?php echo $product['width'] ?></td>
                                    <td><?php echo $product['height'] ?></td>
                                    <td><?php echo $product['depth'] ?></td>
                                    <td><?php echo ($product['depth'] * $product['height'] * $product['width'])/3 ?></td>
                                    <td><?php echo $product['performance'] ?></td>
                                    <td><?php echo $product['price'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table><br>
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

