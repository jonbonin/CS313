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
            Directory | CIT336-Food-thecollegeway.com
        </title>
        <script src="../java/contact_search.js"></script>
    </head>
    <body onload = 'listen()'>
        <div>
            <header>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <div>
                <main>
                    <div>
                        <h1>Home Page</h1>
                        <?php
                        if (isset($error_message)) {
                            echo "<p class = 'error'>".$error_message."</p>";
                        }
                        ?>
                        <h2>Department Heads</h2>
                        <table>
                            <tr>
                                <th>Name</th>
                                <!--<th>Email</th>-->
                                <th>Department Name</th>
                                <th>Department Position</th>
                                <!--<th>phone</th>-->
                            </tr>
                            <?php foreach ($contacts as $contact) : ?>
                                <tr>
                                    <td><a href="/?name=<?php echo $contact['firstName'].' '.$contact['lastName'] ?>&action=biography&contact_ID=<?php echo $contact['contacts_ID']?>" title="Personal Biography"><?php echo $contact['firstName'].' '.$contact['lastName'] ?></a></td>
                                    <!--<td><?php echo $contact['email'] ?></td>-->
                                    <td><?php echo $contact['departmentName'] ?></td>
                                    <td><?php echo $contact['positionName'] ?></td>
                                    <!--<td><?php echo $contact['contacts_ID'] ?></td>-->
                                    <!--<td><?php echo $contact['phoneNumber'] ?></td>-->
                                </tr>
                            <?php endforeach; ?>
                        </table><br>
                        <?php if ($_SESSION['login'] == true) :?>
                         <form id="searchForm">
                             <!--The following is the drop down menu the contains the sub departments-->
                             <select id="deptSearch" name = "deptSearch" oninput="dropDown2()">
                                 <option id="firstName">First Name</option>
                                 <option id="lastName">Last Name</option>
                                 <!--This is the section that creates the second drop down-->
                                 <?php foreach ($department AS $dept){
                                     $subDept = subDepartment_list($dept['department_ID']);
                                     $encodedSubDept = json_encode($subDept);
                                     $encodedSubDept = htmlentities($encodedSubDept);
                                        echo '<option data-subdepts="'.$encodedSubDept.'" id = "'.$dept['departmentName'].'">'.$dept['departmentName'].'</option>';
                                    }
                                  ?>
                             </select>
                            <input type="text" name="searchFirst" id="searchFirst">
                        </form>
                        <?php endif; ?>
                        <p>What you want is <?php $e = document.getElementByID("deptSearch"); echo '$e.options[e.selectedIndex].text'; ?> </p>
                        <table id ="searchFill"></table>
                    </div>
                </main>
            </div>
            <!--aside-->
            <footer>
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                    <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>