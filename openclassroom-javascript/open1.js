let totalCDs = 67;
let totalVinyls = 34;
let totalMusic = totalCDs + totalVinyls;

let cookiesInJar = 10;
let cookiesRemoved = 2;
let cookiesLeftInJar = cookiesInJar - cookiesRemoved;

let cookiesInJar = 10;
/* manger deux cookies */
cookiesInJar -= 2;  //il reste 8 cookies
/* cuisson d'un nouveau lot de cookies */
cookiesInJar += 12; // il y a maintenant 20 cookies dans la boîte

let numberOfLikes = 10;
numberOfLikes++;  // cela fait 11
numberOfLikes--; // et on revient à 10...qui n'a pas aimé mon article ?

let costPerProduct = 20;
let numberOfProducts = 5;
let totalCost = costPerProduct * numberOfProducts;
let averageCostPerProduct = totalCost / numberOfProducts;

let numberOfCats = 2;
numberOfCats *= 6;  // numberOfCats vaut maintenant 2*6 = 12;
numberOfCats /= 3;  // numberOfCats vaut maintenant 12/3 = 4;

let numberOfCats = 3;
numberOfCats = 4;  // on réaffecte la valeur d'une variable

let compteur = 0;
compteur++;
compteur = 10;

const nombrePostParPage = 20;
nombrePostParPage = 30; // Retournera une erreur dans la console car on ne peut plus changer sa valeur