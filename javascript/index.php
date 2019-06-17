 <!DOCTYPE html>
<html>
<body>

<h1>My First Web Page</h1>
<p>My First Paragraph</p>

<p id="demo"></p>

<script>
// Obiectul este document, iar metoda getElementById
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;
document.getElementById("demo").innerHTML = 2 + 3;

document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);
document.write(2 + 3);

//window.alert(2 + 3);
//window.alert(2 + 3);
//window.alert(2 + 3);
//window.alert(2 + 3);
//window.alert(2 + 3);

console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);
console.log(2 + 3);

var x, y, z;
x = 2;
y = 3;
z = x + y;

var x, y, z;
x = 2;
y = 3;
z = x + y;

var x, y, z;
x = 2;
y = 3;
z = x + y;

var x, y, z;
x = 2;
y = 3;
z = x + y;

var x, y, z;
x = 2;
y = 3;
z = x + y;


var lenght = 16;
var lastName = "Brown";

// Obiecct Javascript, perechi de valori
var person = {
    firstName : "Victor",
    lastName : "Brown",
    age: 30
    
};

document.write(person.lastName);

// Array

var cars = ["Logan", "BMW", "Audi"];

document.write(cars[0]);

document.write(typeof lenght); // Returneaza number
typeof lastName; // Returneaza string
typeof person; // Returneaza object
typeof cars; // Returneaza object nu array
typeof true; // Returneaza boolean
typeof false; // Returneaza boolean

if (typeof lenght == "number") {
    
    window.alert("Test");
}

var x = myFunction1(5,5);

function myFunction1(a,b) {
    
    return a * b;
}
// Variabila globala
var string = "Test";

function myFunction() {
  // Variabila locala
  var carName = "Volvo";
 
}

var personTest = {
    firstName : "Victor",
    lastName : "Brown",
    age : 30,
    // fullName este o metoda a obiectului personTest
    // this reprezinta proprietarul metodei, adica personTest
    fullName: function() {
        return this.firstName + " " + this.lastName;
    }
};

window.alert(personTest.fullName());
</script>
<button type="button" onclick="myFunction()">Click Me!</button>

<p id="demo2"></p>
<p id="demo3"></p>

<script>
// Ce este scris in interiorul functiei se executa chiar daca nu are return
function myFunction() {
  document.getElementById("demo2").innerHTML = "Test";
  document.getElementById("demo3").innerHTML = "Test1";
}
</script>
</body>
</html> 