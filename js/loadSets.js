$(document).ready(function() {
    $.get("php/loadSets.php").done(function(data){
        if(data){
            const setsObj = JSON.parse(data);   
            let sets = [];
            for(var i=0; i<setsObj.length; i++) {
                sets[i] = $.map(setsObj[i], function(el) { return el });

                    var setID = "set"+sets[i][0];
                    var nameElement = sets[i][1];
                    var imgElement = "img/flags/"+sets[i][2]+".png";
                
                $("<li id='"+setID+"'><div class='flag-and-name'><img class='flag-of-set' src='"+imgElement+"' alt='flag'><p class='name-of-set'>"+nameElement+"</p></div><div class='edit-delete-box'><button class='pure-btn ess-btn edit'><i class='fas fa-edit'></i></button> <button class='pure-btn ess-btn delete'><i class='fas fa-trash-alt'></i></button></div></li>").appendTo("#list-of-sets");
            }  
        }
    });
});