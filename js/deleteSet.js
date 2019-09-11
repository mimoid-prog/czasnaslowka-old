$(document).ready(function() {   
    var set;
    var idOfSet;
    var idFromDb;    
    
    $(document).on('click','.delete', function(){
        $("#delete-set-confirm").removeClass("active");
        set = $($(this).parent()).parent();
        idOfSet = $(set).attr('id');
        idFromDb = idOfSet.slice(3);       
        
        var setPos = $("#"+idOfSet).position();
        var setH = $("#"+idOfSet).outerHeight();
        
        $("#delete-set-confirm").css('top', setPos.top+setH-3);
        
        $("#delete-set-confirm").addClass("active");
    });
    
    $("#delete-set-btn").click(function(ev) {  
        ev.preventDefault() ;     
        $.get("php/deleteSet.php", {data: idFromDb})
            .done(function(response) {
            $("#"+idOfSet).remove();
            $("#delete-set-confirm").removeClass("active");
        });
    });
    
    $("#cancel-delete-set-btn").click(function() {
        $("#delete-set-confirm").removeClass("active");   
    });
});



