//1.control structures//
if (age > 18) {
    console.log("You are an adult");
} else {
    console.log("You are not an adult");
}

for (let i = 0; i < 3; i ++ ) {
    console.log(i);
}
while (age < 30) {
    age++;
}
switch(age) {
    case 25:
        console.log("Quateer Century!");
        default:
            console.log("Age not matched");
}

// 2.variables//
let name = "Venus";//string
const age =25; //Number
var isDeveloper = true; //Boolean

//3. Data Types
let str = "Hello World!"; //string
let num = 42; //Number
let bigInt = 9007199254740991n; //BigInt
let float = 3.14; //Float
let bool = false; //Boolean
let undef = undefined; //undefined
let nul = null; //Null
let symbol = Symbol ('unique'); //symbol
let arr = [1, 2, 3]; //array
let obj = {key: "value"}; //object

//4.Functions
function greet() {
    console.log("Hello World!");
}
const arrowFunc =() => console.log
   ("Arrow Function");

   //Function with parameters
   function add(a,b) {
    return a + b;
   }

   //5.Arrays
   let fruits = [ "apple", "banana" , "cherry"];
   fruits.push("date"); //add to end
   fruits.pop();//Remove from end
   fruits.forEach(fruit => console.log (fruit));
   
   //6.Object
   let person = {
    name:"Venus",
    sayHello: function() {
        return 'Hello, my name is: ' +name;
    }
};


