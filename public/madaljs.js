// Ouvrir le modal lorsque le bouton est cliqué
var modalBtn = document.getElementById("openModal");
var modal = document.getElementById("myModal");
var closeBtn = document.getElementsByClassName("close")[0];

modalBtn.onclick = function() {
  modal.style.display = "block";
}

// Fermer le modal lorsque l'utilisateur clique sur le bouton de fermeture ou en dehors du modal
closeBtn.onclick = function() {
  modal.style.display = "none";
}

function runner(event) {
    var montant = document.getElementById("montantmod").value;
    var annee = document.getElementById("anmod").value;
    
    if(montant != null && annee != null){
        var anInt = parseInt(annee, 10);
        var first = 1500000*parseInt(annee, 10);
        var second = (parseInt(montant, 10) - first)/(11*anInt);
        
        document.getElementById("montantmod").value = first;
        document.getElementById("cotmen").value = first;
    }
}

document.getElementById("anmod").addEventListener("change", runner());
document.getElementById("montantmod").addEventListener("change", runner());

window.onclick
