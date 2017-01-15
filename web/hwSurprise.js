function showHW(){
var seeME = document.getElementById("seeMe").value;
    if (seeME == "Homework Please"){
        document.getElementById("hidden").style.display = "inherit";
    } else {
        alert('Did you say' + ' "' + 'Homework Please' +'"' + '?');
    }
}