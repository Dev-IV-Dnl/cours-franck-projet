class Book {
    constructor(title, author, pages) {
        this.title = title;
        this.author = author;
        this.pages = pages;
    }
}

let myBook = new Book("L'histoire de Tao", "Will Alexander", 250);
// cette ligne crée l'objet suivant :
let livre = document.getElementById('livre');
// livre.innerHTML = myBook->title;
console.log(myBook);