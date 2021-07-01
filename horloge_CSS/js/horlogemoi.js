let aiguilleHeure = document.querySelector('.heures');
let aiguilleMinute = document.querySelector('.minutes');
let d= new Date();
aiguilleHeure.style.transform = "rotate("+(d.getHours()*30+d.getMinutes()*0.5)+"deg)";
aiguilleMinute.style.transform = "rotate("+(d.getMinutes()*6)+"deg)";