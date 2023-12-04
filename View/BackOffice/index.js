const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');
const darkMode = document.querySelector('.dark-mode');
menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
});


function commande_formulaire(){
    formulair = document.getElementById("formulaire-new-comm");
    formulair.style.display = "block";
}

function user_formulaire(){
    formulairee = document.getElementById("formulaire-new-user");
    formulairee.style.display = "block";
}

function formulaire(){
    formulair = document.getElementById("formulaire-new-event");
    formulair.style.display = "block";
}
function hide_formulaire(){
    formulair = document.getElementById("formulaire-new-event");
    formulair.style.display = "none";
}
function is_word(ch) {
    var allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for (var i = 0; i < ch.length; i++) {
        if (allowedChars.indexOf(ch[i]) === -1) {
            return false;
        }
    }
    return true;
}
function valider_formulaire_update() {
    var nom = document.getElementById("nom_event_update").value;
    var date = document.getElementById("date_event_update").value; 
    var lieu = document.getElementById("lieu_event_update").value;
    if (!nom || !is_word(nom)) {
        alert("Nom event invalide");
        return false;
    }
    if (!date) {
        alert("Date event invalide");
        return false;
    }
    if (!lieu) {
        alert("Lieu event invalide");
        return false;
    }
    return true;
}
function valider_formulaire() {
    var nom = document.getElementById("nom_event").value;
    var date = document.getElementById("date_event").value;
    var lieu = document.getElementById("lieu_event").value;
    if (!nom || !is_word(nom)) {
        alert("Nom invalide");
        return false;
    }
    if (!date) {
        alert("Date invalide");
        return false;
    }
    if (!lieu) {
        alert("Lieu invalide");
        return false;
    }
    if ((nom)&&(is_word(nom))&&(date)&&(lieu)){
        return true;
    }
}