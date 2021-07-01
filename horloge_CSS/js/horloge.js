// On commence lorsque la page est fini de charger
window.addEventListener('load', () => {
    //setInterval appelle une fonction à moi toutes les X millisecondes
    setInterval(moveAiguille, 500)
})

function moveAiguille() {
    //Ici on récupère la date et l'heure du pc
    let d = new Date()
    //on récupère les éléments HTML (les aiguilles qu'on a dessiné en HTML/CSS)
    let min = document.querySelector('.minutes')
    let heure = document.querySelector('.heures')
    let secondes = document.querySelector('.secondes')

    //On applique les transformation sur chaque aiguille en fonction de l'heure
    min.style.transform = 'rotate(' + ((d.getMinutes() * 360 / 60) + 180) + 'deg)';
    secondes.style.transform = 'rotate(' + ((d.getSeconds() * 360 / 60) + 180) + 'deg)';
    heure.style.transform = 'rotate(' + ((d.getHours() * 360 / 12) + (d.getMinutes() * 30 / 60)) + 'deg)';
}