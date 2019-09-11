$(document).ready(function() {
    $.get("php/loadSets.php").done(function(data){
        if(data){
            const setsObj = JSON.parse(data);   
            let sets = [];
            for(var i=0; i<setsObj.length; i++) {
                sets[i] = $.map(setsObj[i], function(el) { return el });

                if(sets[i][2]=="angielski") {
                    var imgElement = "img/greatBritain.png";
                    var altElement = "great britain flag";
                }else if(sets[i][2]=="niemiecki") {
                    var imgElement = "img/germany.png";
                    var altElement = "germany flag";
                }else {
                    var imgElement = "img/russia.png";
                    var altElement = "russia flag";
                }
                var setID = "set"+sets[i][0];
                var nameElement = sets[i][1];

                $("<option value='"+setID+"'>"+nameElement+"</option>").appendTo("[name='sets-to-choose']");
            }  
        }
    }); 
});