<!DOCTYPE HTML>
<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>
            Nameless Temple Products
        </title>
    </head>
    <body>
        <div>
            <header role="banner">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <main role="main">
                <div>
                    <h1>Our Products</h1>
                    <h2>Fish</h2>
                    <a href="?action=viewCart" title="View Cart"><b>View Your Cart</b></a>
                    <table class="products" id='products'>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                <p>The Looks</p>
                            </th>
                            <th>
                                <p>Description</p>
                            </th>
                            <th>
                                Quantity
                            </th>
                        </tr>
                        <tr>
                            <td><p>Theo Theobald</p></td>
                            <td>
                                <img src="data:image/jpeg;base64,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" alt="Theo the Theobald">
                            </td>
                            <td>
                                <p>
                                    This is a fish that can be bought for a wonderful price. Now this fish is the best way to fly around when making a dish for a party. In now way whatsoever can there be a way where this fish will not be appetizing to the folk that you are with. Come downtown and buy this duck for ten cents on the dollar!!
                                </p>
                            </td>
                            <td>
                                <form method="post" action="<?php echo htmlspecialchars("?action=addToCart");?>">
                                    <input type="number" min="0" name="productCount">
                                    <input type="hidden" name="product" value="The Theobald">
                                    <input type="submit" value="Add to Cart">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><p>Goodman Brown</p></td>
                            <td>
                                <img src="https://s-media-cache-ak0.pinimg.com/736x/0b/25/34/0b2534091d482a4a2269bd65a972d7c5.jpg">
                            </td>
                            <td>
                                <p>
                                    Goodman Brown. No other explanation is needed in order to buy this puppy downtown.
                                </p>
                            </td>
                            <td>
                                <form method="post" action="<?php echo htmlspecialchars("?action=addToCart");?>">
                                    <input type="number" min="0" name="productCount">
                                    <input type="hidden" name="product" value="Goodman Brown">
                                    <input type="submit" value="Add to Cart">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </main>
            <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
            </footer>
        </div>
    </body>
</html>