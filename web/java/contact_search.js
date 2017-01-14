function listen() {
    console.log('just inside listen function');
    var searchbox1 = document.getElementById('searchFirst');
    console.log(searchbox1);
//                var searchbox2 = document.getElementById('searchLast');
//                console.log(searchbox2);
    searchbox1.addEventListener("keyup", searchQuery);
//                searchbox2.addEventListener("keyup", searchQuery);
}
// pass in a variable that sets the url code
function searchQuery() {
    var firstName = document.getElementById('searchFirst').value;
    console.log(firstName);
//                var lastName = document.getElementById('searchLast').value;
//                console.log(lastName);
    if (firstName.length >= 2) {
        var table = document.getElementById('searchFill');
        table.innerHTML = '';
        console.log(table);
        console.log('just inside searchQuery function');
        var http_request = new XMLHttpRequest();
        console.log(http_request);
        console.log('couple lines down in searchQuery');
        http_request.onreadystatechange = function () {
            console.log('inside ready statechange');
            console.log(http_request.readyState);
            console.log(http_request.status);
            if (http_request.readyState == 4 && http_request.status == 200) {
                console.log('inside of if that is in ready state');
//                            console.log(http_request.readyState);
//                            console.log(http_request);
                //Javascript function JSON.parse to parse JSON data
//                            console.log(http_request.responseText);
                var jsonText = String(http_request.responseText);
//                            console.log(jsonText);
                var jsonObj = JSON.parse(jsonText);
//                            console.log(jsonObj);
                console.log('parsed');
                var table = document.getElementById('searchFill'); // gets existing table
                var row = document.createElement("tr");
                var text1 = 'First Name';
                var text2 = 'Last Name';
                var text3 = 'Email';
                var text4 = 'Phone Number';
                var title1 = document.createElement("th");
                title1.innerHTML = text1;
                var title2 = document.createElement("th");
                title2.innerHTML = text2;
                var title3 = document.createElement("th");
                title3.innerHTML = text3;
                var title4 = document.createElement("th");
                title4.innerHTML = text4;
                row.appendChild(title1);
                row.appendChild(title2);
                row.appendChild(title3);
                row.appendChild(title4);
                table.appendChild(row);
                console.log('just outside loop');
                for (var i = 0; i < jsonObj.length; i++) {
                    console.log('inside for loop');
                    var row2 = document.createElement("tr");
                    var firstname = jsonObj[i].firstName;
                    var lastname = jsonObj[i].lastName;
                    var email = jsonObj[i].email;
                    var phone = jsonObj[i].phoneNumber;
                    var column1 = document.createElement("td");
                    column1.innerHTML = firstname;
                    var column2 = document.createElement("td");
                    column2.innerHTML = lastname;
                    var column3 = document.createElement("td");
                    column3.innerHTML = email;
                    var column4 = document.createElement("td");
                    column4.innerHTML = phone;
                    row2.appendChild(column1);
                    row2.appendChild(column2);
                    row2.appendChild(column3);
                    row2.appendChild(column4);
                    table.appendChild(row2);
                }
                console.log('just outside end ready state if statement');
            }
        }

        var element = document.getElementById("deptSearch");
        var selectedValue = element.options[element.selectedIndex].text;
        console.log(selectedValue);
        if (selectedValue == 'First Name') {
            http_request.open("GET", ".?action=ajaxSearch&firstName=" + firstName, true);
            http_request.send();
        } else if (selectedValue == 'Last Name') {
            console.log('last name if');
            http_request.open("GET", ".?action=ajaxSearch&lastName=" + firstName, true);
            http_request.send();
        }
    }
}

var inputBox;
function dropDown2() {
    //console.log(event); 
    var element = document.getElementById("deptSearch");
    var selectedValue = element.options[element.selectedIndex].text;
    if (inputBox == null) {
        inputBox = document.getElementById('searchFirst');
    }
    var parent = document.getElementById('searchForm');
    if (selectedValue !== 'First Name' && selectedValue !== 'Last Name') {

        try {
            if (inputBox !== null) {
                parent.removeChild(inputBox);
            }
        } catch (e) {
            var secondDrop = document.getElementById('disapSelect');
            parent.removeChild(secondDrop);
        }

        var select = document.createElement('select');
        select.id = "disapSelect";
        select.name = "disapSelect";
        var jsonString = element.options[element.selectedIndex].dataset.subdepts;
        console.log(jsonString);
        console.log(element.options[element.selectedIndex]);
        var json = JSON.parse(jsonString);
        for (var i = 0; i < json.length; i++) {
            var option = document.createElement('option');
            option.innerHTML = json[i].subDepartment;
            select.appendChild(option);
        }

        parent.appendChild(select);
    } else {
        var select = document.getElementById('disapSelect');
        if (select !== null) {
            parent.removeChild(select);
            parent.appendChild(inputBox);
        }
    }
}