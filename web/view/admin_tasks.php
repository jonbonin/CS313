<!DOCTYPE HTML>
<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/head.php'; ?>
        <title>
            Administrator Tasks | cit336-food-thecollegway.com
        </title>
        <script>
            function listen() {
                var searchbox = document.getElementById('emailUpdate'););
                searchbox.addEventListener("keyup", verifyUser());
            }
        </script>
    </head>
    <body onload="listen()">
        <div>
            <header role="banner">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
            </header>
            <div>
                <main role="main">
                    <div>
                        <h1>Items for the Admininistrator</h1>
                        <h2>Statistical count for Departments</h2>
                        <table>
                            <tr>
                                <th>Department Name</th>
                                <th>Count of People</th>
                            </tr>
                        <?php $departmentStatistics = countName();
                            foreach($departmentStatistics AS $stat){
                                echo '<tr><td>'.$stat['DepartmentName'].'</td> <td>'.$stat['COUNT(*)'].'</td></tr>';
                            }
                        ?>
                        </table>
                        <h2>Change someone's position</h2>
                        <?php if ($_SESSION['positionName'] == "Admin") : ?>
                        <p>
                            Hello <?php echo $_SESSION['firstName'] ?>, this is where you update contacts to be in their respective positions.
                            Please search for someone by their email.
                        </p>
                        <form>
                            <label for="emailUpdate">Person's email</label>
                            <input type="email" id="emailUpdate" name="emailUpdate">
                            <input type="submit" id="verifyUser" name="verifyUser" onclick="verifyUser()">
                            
                            <!--following php block creates the optgroup drop down menu-->
                            <!--<?php foreach ($department AS $dept){
                                     $subDept = subDepartment_list($dept['department_ID']);
                                     $encodedSubDept = json_encode($subDept);
                                     $encodedSubDept = htmlentities($encodedSubDept);
                                        echo '<option data-subdepts="'.$encodedSubDept.'" id = "'.$dept['departmentName'].'">'.$dept['departmentName'].'</option>';
                                    }
                                  ?>-->
                                  
                       </form><br>
                        <?php endif ?>
                    </div>
                </main>
            </div>
            <aside role="complementary">
                <!--This is info pertaining to the web site as a whole-->
            </aside>
            <footer role="contentinfo">
                <div>
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
                    <?php echo 'last update: ' . date('F j, Y', getlastmod()) ?>
                </div>
            </footer>
        </div>
    </body>
</html>