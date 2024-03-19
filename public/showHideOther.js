function setListenerForChange(mainer, target){
    const selectElement = $(mainer);
    // Add an event listener for changes in the select element
    selectElement.on('change', function () {
        // Get the selected value
        const selectedValue = selectElement.val();
        console.log(selectedValue);
        if(selectedValue == "Autre"){
            $(target).show();
        }else{
            $(target).hide();
        }
    });
}

$(document).ready(function () {
    // Get the select element
    setListenerForChange("#enregistre-acquereurs > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(4) > form:nth-child(2) > div:nth-child(2) > div:nth-child(2) > p:nth-child(2) > span:nth-child(1) > select:nth-child(1)", '#enregistre-acquereurs > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(1) > div:nth-child(4) > form:nth-child(2) > div:nth-child(2) > div:nth-child(3)')
    setListenerForChange("div.f-service:nth-child(5) > p:nth-child(2) > span:nth-child(1) > select:nth-child(1)", '#form1 > div:nth-child(6)')
    setListenerForChange("div.f-service:nth-child(10) > p:nth-child(2) > span:nth-child(1) > select:nth-child(1)", '#form1 > div:nth-child(11)');
    setListenerForChange("#form-register-modal > div.nyssa-multiple-fields > div:nth-child(2) > p:nth-child(2) > span > select", '#form-register-modal > div.nyssa-multiple-fields > div:nth-child(3)');
    setListenerForChange("#form-register-modal > div.nyssa-multiple-fields > div:nth-child(5) > p:nth-child(2) > span > select", '#form-register-modal > div.nyssa-multiple-fields > div:nth-child(6)');
    setListenerForChange("#form-register-modal > div.nyssa-multiple-fields > div:nth-child(10) > p:nth-child(2) > span > select", '#form-register-modal > div.nyssa-multiple-fields > div:nth-child(11)');

    
});