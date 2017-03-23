<?php
if (!(isset($_SESSION))) {
    session_start();
}
?>
<!--use jquery to select all elements with a particular class name from the table-->
<!DOCTYPE HTML>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>
            Graphs | Nameless Temple 
        </title>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script type="text/javascript" src="/java/bubble.js"></script>
        <script>
            function tablePop() {
                var c = "1";
                var r = 0;
                var table = [];
                console.log("first", table);
                var i = 0;
                while (document.getElementById(c) != null) {
                    console.log("c is " + c);
                    console.log(document.getElementById(c));
                    if (table[r] == null || table[r] == undefined) {
                        table[r] = [i];
                    }
                    console.log("numb 2" + document.getElementById(c));
                    table[r][i] = document.getElementById(c).innerHTML;
                    console.log("gerge" + document.getElementById(c));
                    i++;
                    if (i == 3) {
                        r++;
                        i = 0;
                    }
//                    console.log(document.getElementById(c).textContent);
                    c *= 1;
                    c++;
                    c = c + "";

                }
                console.log("Hey" + table);
                bubbleChart(table);
            }
        </script>
    </head>
    <body onload="tablePop()">
        <div>
            <header role="banner">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <div>
                <main role="main">
                    <div>
                        <h1>Let's See Your Products</h1>
                        <div id="para"></div>
                        <table class = 'products'>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Width</th>
                                <th>Height</th>
                                <th>Depth</th>
                                <th>Volume</th>
                                <th>Performance</th>
                                <th>Price</th>
                                <th>&#160;</th>
                            </tr>
                            <?php
                            $i = 1;
                            $j = 2;
                            $k = 3;
                            ?>
                            <?php foreach ($products as $product) : ?>
                                <?php $math = ($product['depth'] * $product['height'] * $product['width']) / 3; ?>
                                <tr>
                                    <td><?php echo $product['productname'] ?></td>
                                    <td><?php echo $product['productcategory'] ?></td>
                                    <td><?php echo $product['width'] ?></td>
                                    <td><?php echo $product['height'] ?></td>
                                    <td><?php echo $product['depth'] ?></td>
                                    <td <?php echo "id='$i'" ?>><?php echo round($math, 2) ?></td>
                                    <td <?php echo "id='$j'" ?>><?php echo $product['performance'] ?></td>
                                    <td <?php echo "id='$k'" ?>><?php echo $product['price'] ?></td>
                                    <td>
                                        <form action = '../index.php' method='post'>
                                                <input type='hidden' name='action' value='viewUpdate'>
                                                <input type='hidden' name='product_id' value='<?php echo $product['product_id']?>'>
                                                <input type='submit' value='Update'>
                                        </form>
                                    </td>
                                </tr>                               
                                <?php
                                $i+=3;
                                $j+=3;
                                $k+=3;
                                ?>
                            <?php endforeach; ?>
                        </table><br>
                        <div id="myDiv"></div>
                    </div>
                </main>
            </div>
            <footer role="contentinfo">
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                </div>
            </footer>
        </div>
    </body>
</html>

