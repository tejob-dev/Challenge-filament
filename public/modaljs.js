// Ouvrir le modal lorsque le bouton est cliqué
function numberWithCommas(x) {
    return (x.toString().replaceAll(".", "")).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// var modalBtn = document.getElementById("openModal");
// var modal = document.getElementById("myModal");
// var closeBtn = document.getElementsByClassName("close")[0];

// modalBtn.onclick = function() {
//   modal.style.display = "block";
// }

// // Fermer le modal lorsque l'utilisateur clique sur le bouton de fermeture ou en dehors du modal
// closeBtn.onclick = function() {
//   modal.style.display = "none";
// }

$(document).ready(function(){

        $("input[data-type='currency']").on({
            keyup: function() {
              $(this).val( numberWithCommas($(this).val()) );
            },
            blur: function() { 
              $(this).val( numberWithCommas($(this).val()) );
            },
            change: function() { 
              $(this).val( numberWithCommas($(this).val()) );
            }
        });
        $("input[data-type='currency1']").on({
            keyup: function() {
              $(this).val( numberWithCommas($(this).val()) );
            },
            blur: function() { 
              $(this).val( numberWithCommas($(this).val()) );
            },
            change: function() { 
              $(this).val( numberWithCommas($(this).val()) );
            }
        });
        $("input[data-type='currency2']").on({
            keyup: function() {
              $(this).val( numberWithCommas($(this).val()) );
            },
            blur: function() { 
              $(this).val( numberWithCommas($(this).val()) );
            },
            change: function() { 
              $(this).val( numberWithCommas($(this).val()) );
            }
        });

        function isPersoned(){
            var vall = $('input[name=peopletype]:checked', '#radioContent').val();
            if(vall == "Individuel"){
                return true;
            }else return false;
        }

        function calculCotise(){
            
            var mtn = document.getElementById("sim-budget").value;
            var apport = document.getElementById("sim-fond-fixe").value;
            var annee = document.getElementById("menu-annee").value;
            var engag = document.getElementById("sim-engage-annu").value;
            var resultplace = document.getElementById("result-place");
            
            if(resultplace.style.display == "none") resultplace.style.display = "block";
            
            document.getElementById("result1-text").innerText  = "";
            document.getElementById("result2-text").innerText  = "";
            document.getElementById("result3-text").innerText  = "";
            document.getElementById("result-cont-mens").innerText  = "";
            document.getElementById("result-cont-mens2").innerText  = "";
            document.getElementById("result-cont-mens3").innerText  = "";
            
            var vall = $('input[name=peopletype]:checked', '#radioContent').val();
            if(vall == "Individuel" || vall == "Groupement"){
                var annee2 = 2;
                var ans1 = parseInt(annee, 10);
                //annee2 = ans1 - annee2;
                // if(ans1 == 5){
                //     annee2 = 3
                // }else if(ans1 == 7){
                //     annee2 = 4
                // }
                var titleGrp = "";
                if(vall == "Groupement"){ 
                    titleGrp = "par membre "
                    $("p#type-eng").text("Engagement annuel "+titleGrp)
                }else{
                    $("p#type-eng").text("Engagement annuel")  
                } 
                
                var MT = parseInt(mtn.replaceAll(".", ""), 10);
                var AI = parseInt(apport.replaceAll(".", ""), 10);
                var EA = parseInt(engag.replaceAll(".", ""), 10);
                var MT60 = MT - (2*AI);
                var diffAn = ans1 - annee2;
                var TEA = EA*ans1;//EA*annee2;
                var TEARest = EA*diffAn;
                var divisor = 0;
                if(EA == 0) 
                    divisor = 12*ans1; 
                else divisor = 11*ans1; //11*ans1;
                
                var CM = ((MT60 - TEA)/divisor);
                
                //if(vall == "Groupement") CM = ((MT - AI)/(11*ans1));
                
                var decide = $('input[name=decidepos]:checked', '#avisContent').val();
                
                if(decide == "1"){
                    // if(mtn != null && apport != null && annee != null && annee2 != null && engag != null){
                    //     var Payable1Coup = (EA*ans1)-(EA*annee2)
                    // }
                     
                    document.getElementById("result3-text").innerText  = "Total engagement annuel à payer sur votre challenge"; ///"+titleGrp+"
                    document.getElementById("result-cont-mens3").innerText  = numberWithCommas(""+(parseFloat(TEA).toFixed(0)<0?"0":parseFloat(TEA).toFixed(0)))+" Fcfa";
                    
                    //if(vall == "Groupement"){
                        document.getElementById("result2-text").innerText  = "Montant à payer à la livraison des clefs";
                        document.getElementById("result-cont-mens2").innerText  = numberWithCommas(""+(parseFloat(AI).toFixed(0)<0?"0":parseFloat(AI).toFixed(0)))+" Fcfa";
                        document.getElementById("result1-text").innerText  = "Cotisation mensuelle à payer sur votre challenge";
                        document.getElementById("result-cont-mens").innerText  = numberWithCommas(""+(parseFloat(CM).toFixed(0)<0?"0":parseFloat(CM).toFixed(0)))+" Fcfa";
                    // }else{
                    //     document.getElementById("result1-text").innerText  = "Votre cotisation mensuelle sur "+ans1+" ans est de: ";
                    //     document.getElementById("result-cont-mens").innerText  = numberWithCommas(""+(parseFloat(CM).toFixed(0)<0?"0":parseFloat(CM).toFixed(0)))+" Fcfa";
                    // }
                }else{
                    if(mtn != null && apport != null && annee != null && annee2 != null && engag != null){
                        
                    }
                    const EAM = (EA/11);
                    // console.log(EAM)
                    const cmr = (CM + EAM);
                    // console.log(CM)
                    // console.log(cmr)
                    var Payable1Coup = (EA*ans1)-(EA*annee2)
                    document.getElementById("result1-text").innerText  = "Votre cotisation mensuelle à payé sur "+annee2+" ans est de: ";
                    document.getElementById("result2-text").innerText  = "A la livraison des clés sur "+annee2+" ans vous payez: ";
                    document.getElementById("result3-text").innerText  = "Votre cotisation mensuelle à payé après livraison des clés: ";
                    document.getElementById("result-cont-mens").innerText  = numberWithCommas(""+(parseFloat(cmr).toFixed(0)<0?"0":parseFloat(cmr).toFixed(0)))+" Fcfa";
                    document.getElementById("result-cont-mens2").innerText  = numberWithCommas(""+(parseFloat(Payable1Coup).toFixed(0)<0?"0":parseFloat(Payable1Coup).toFixed(0)))+" Fcfa";
                    document.getElementById("result-cont-mens3").innerText  = numberWithCommas(""+(parseFloat(CM).toFixed(0)<0?"0":parseFloat(CM).toFixed(0)))+" Fcfa";
                }   
            }else{
                var MT = parseInt(mtn.replaceAll(".", ""), 10);
                var AI = parseInt(apport.replaceAll(".", ""), 10);
                var ans1 = parseInt(annee, 10);
                var CM = ((MT - AI)/120);
                
                document.getElementById("result1-text").innerText  = "Votre cotisation mensuelle sur "+ans1+" ans est de: ";
                document.getElementById("result-cont-mens").innerText  = numberWithCommas(""+(parseFloat(CM).toFixed(0)<0?"0":parseFloat(CM).toFixed(0)))+" Fcfa";
            }
            //   document.getElementById("result-cont-mens").innerText  = numberWithCommas(""+(parseFloat(second).toFixed(0)<0?"0":parseFloat(second).toFixed(0)))+" Fcfa";
            
        }
        
        
        
        
        

        $("#sim-budget").on('input', function(){
          var mtn = document.getElementById("sim-budget").value;
          console.log(mtn);
          if(mtn != null){
             var mtnc = parseInt(mtn.replaceAll(".", ""), 10);
             console.log(mtnc+" done ");
            //  if(mtnc >= 25000000 && mtnc <= 35000000){
            //     document.getElementById("sim-fond-fixe").value = 3500000;
            //  }
            //  if(mtnc >= 15000000 && mtnc <= 24900000){
            //     document.getElementById("sim-fond-fixe").value = 2500000;
            //  }
            //  if(mtnc >= 10000000 && mtnc <= 14900000){
            //     document.getElementById("sim-fond-fixe").value = 1500000;
            //  }
            document.getElementById("sim-fond-fixe").value = numberWithCommas(mtnc*0.2);
            var vall = $('input[name=peopletype]:checked', '#radioContent').val();
            if(vall == "Individuel"){
                document.getElementById("sim-engage-annu").value = numberWithCommas("0");
            }else{
                document.getElementById("sim-engage-annu").value = numberWithCommas("0");
            }
             
          }
          calculCotise();
        });
        
        $('#sim-engage-annu').on("click", function(){ 
          var simengag = document.getElementById("sim-engage-annu");
          if(simengag.value == "0") simengag.value = "";
        })
        $('#sim-engage-annu').on("input", function(){
          
          var mtn = document.getElementById("sim-budget").value;
          console.log(mtn);
          if(mtn != null){
             var mtnc = parseInt(mtn.replaceAll(".", ""), 10);
             console.log(mtnc+" done ");
            //  if(mtnc >= 25000000 && mtnc <= 35000000){
            //     document.getElementById("sim-fond-fixe").value = 3500000;
            //  }
            //  if(mtnc >= 15000000 && mtnc <= 24900000){
            //     document.getElementById("sim-fond-fixe").value = 2500000;
            //  }
            //  if(mtnc >= 10000000 && mtnc <= 14900000){
            //     document.getElementById("sim-fond-fixe").value = 1500000;
            //  }
            //document.getElementById("sim-fond-fixe").value = numberWithCommas(mtnc*0.2);
            var vall = $('input[name=peopletype]:checked', '#radioContent').val();
            if(vall == "Individuel"){
                //document.getElementById("sim-engage-annu").value = numberWithCommas("0");
            }else{
                //document.getElementById("sim-engage-annu").value = numberWithCommas("0");
            }
             
          }
          calculCotise();
        });
        $('#sim-fond-fixe').on('change', function() { calculCotise(); });
        $('#menu-annee').on('change', function() { calculCotise(); });
        $('#ann-rentrer').on('change', function() { calculCotise(); });
        //$('#sim-engage-annu').on('change', function() { calculCotise(); });
        //$('#apporinit').on('change', function() { $(this).val($(this).val()); });
        
        
        $('#radioContent input').on('change', function() {
          var vall = $('input[name=peopletype]:checked', '#radioContent').val();
          if(vall == "Individuel"){
              document.getElementById("fgrouped").disabled = false;
              document.getElementById("sgrouped").disabled = true;
              $("#fgrouped > option:eq(0)").prop('selected', true);
          }else{
              document.getElementById("fgrouped").disabled = true;
              document.getElementById("sgrouped").disabled = false;
              $("#sgrouped > option:eq(0)").prop('selected', true);
          }
          
          var mtn = document.getElementById("sim-budget").value;
          console.log(mtn);
          if(mtn != null){
            var mtnc = parseInt(mtn.replaceAll(".", ""), 10);
            console.log(mtnc+" done ");
            document.getElementById("sim-fond-fixe").value = numberWithCommas(mtnc*0.2);
            var vall = $('input[name=peopletype]:checked', '#radioContent').val();
            if(vall == "Individuel"){
                document.getElementById("sim-engage-annu").value = numberWithCommas("0");
            }else{
                document.getElementById("sim-engage-annu").value = numberWithCommas("0");
            }
             
          }
          
          calculCotise();
        });
        
        $('#avisContent input').on('change', function() {
          calculCotise();
        });
});

window.onclick
