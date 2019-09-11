$(document).ready(function() {
    var whatIsClicked = "";
    var setID = "";
    var setIDdb = "";
    var wordID = 7;

    $(document).on('click','.edit',function(ev){
        ev.preventDefault();
        clearSet();
        whatIsClicked = "edit";
        $('#edit-words-box').addClass('active');
        $("#delete-set-confirm").removeClass("active");
        $(".set-errors-info").removeClass("active");
        $("#edit-words-title").text("Edytowanie zestawu");
        
        var set = $($(this).parent()).parent();
        setID = $(set).attr('id');
        setIDdb = setID.slice(3);

        $.ajax({
            type: 'POST',
            url: "php/editSet.php",
            data: {setIDdb:setIDdb},
            dataType: "json"
        })
            .done(function(response) {
            const setsObj = response;
            let setAndWords = [];
            let words = [];
            for(var i=0; i<setsObj.length; i++) {
                setAndWords[i] = $.map(setsObj[i], function(el) { return el });
                if(!i){
                    var nameElement = setAndWords[i][0];
                    var languageElement = setAndWords[i][1];
                }else {
                    var lang1 = [];
                    var lang2 = [];

                    for(var j=0; j<setAndWords[i].length; j++) {
                        words[j] = $.map(setAndWords[i][j], function(el2) { return el2 });                     
                        lang1[j] = words[j][0];
                        lang2[j] = words[j][1];              
                    }                                      
                }
            }

            $("[name='name-of-set']").val(nameElement);
            $("[name='language-of-set']").val(languageElement);

            for(var x=0; x<lang1.length; x++) {
                if(x>7) {
                    $("#words").append("<li id=word"+x+" class='additional-words'><input class='foreign-word'><input class='polish-word'></li>");
                    $("#word"+x).children(".foreign-word").val(lang1[x]);
                    $("#word"+x).children(".polish-word").val(lang2[x]);

                    if(x==8) {
                        $("#words").addClass("active");
                        $("#words").scrollTop(0);
                    }
                    
                    if(x==lang1.length-1){
                        $("#words").append("<li id=word"+x+" class='additional-words'><input class='foreign-word'><input class='polish-word'></li>");
                        wordID = x;
                    }
                }else {
                    $("#word"+x).children(".foreign-word").val(lang1[x]);
                    $("#word"+x).children(".polish-word").val(lang2[x]);
                }
            }
        })
    });  

    $("#add-new-set").click(function() {
        clearSet();
        whatIsClicked = "new";
        $("#edit-words-title").text("Tworzenie nowego zestawu");
        $("#edit-words-box").addClass('active');
        $("#delete-set-confirm").removeClass("active");
    });   

    $("#save-set").submit(function(ev) {
        ev.preventDefault();      

        var wordsToSend = [];
        var foreignWords = $(".foreign-word");
        var polishWords = $(".polish-word");
        var e = 0;
        var r = 0;

        while(e<foreignWords.length){
            if(!String.prototype.isEmpty(foreignWords[e].value) && !String.prototype.isEmpty(polishWords[e].value)){
                wordsToSend[r] = foreignWords[e].value;
                r++;
                wordsToSend[r] = polishWords[e].value;
                r++; 
            }
            e++;
        }

        $(".set-errors-info").removeClass("active");
        $(".loader").addClass("active");
        const formData = {            
            nameOfSet: $("[name='name-of-set']").val(),
            languageOfSet: $("[name='language-of-set']").val(),
            wordsOfSet: wordsToSend,
            type: whatIsClicked,
            setID: setIDdb
        };

        $.ajax({
            type: 'POST',
            url: "php/saveSet.php",
            data: {data: JSON.stringify(formData)}
        })
            .done(function(response) {
            var currentSet = JSON.parse(response);
            $(".loader").removeClass("active");
            if(currentSet.constructor === Array) { 
                $(".set-errors-info").text(currentSet[3]);
                $(".set-errors-info").addClass("active");

                var nameElement = currentSet[1];
                var setID = "set"+currentSet[0];
                var imgElement = "img/flags/"+currentSet[2]+".png";

                if(whatIsClicked=="edit"){
                    $("#"+setID+" > .flag-and-name > .flag-of-set").attr("src", imgElement);          
                    $("#"+setID+" > .flag-and-name > .name-of-set").text(nameElement);    

                    $("[name='name-of-set']").val(nameElement);
                    $("[name='language-of-set']").val(currentSet[2]);
                    for(var h=0; h<wordsOfSet.length; h++) {
                        $("[name='words-of-set']").val($("[name='words-of-set']").val()+wordsOfSet[h]);
                        if(h<wordsOfSet.length-1) {
                            $("[name='words-of-set']").val($("[name='words-of-set']").val()+"\n");
                        }
                    }
                }else {
                    $("<li id='"+setID+"'><div class='flag-and-name'><img class='flag-of-set effect7' src='"+imgElement+"' alt='flag'><p class='name-of-set'>"+nameElement+"</p></div><div class='edit-delete-box'><button class='pure-btn ess-btn edit'><i class='fas fa-edit'></i></button> <button class='pure-btn ess-btn delete'><i class='fas fa-trash-alt'></i></button></div></li>").appendTo("#list-of-sets");            
                }

            }else {
                $(".set-errors-info").text(currentSet);
                $(".set-errors-info").addClass("active");
            }
        })
    });

    $("#cancel").click(function() {
        $("#edit-words-box").removeClass("active");
    });

    $("#delete-set-btn").click(function() {
        if(whatIsClicked=="edit"){
            $("#edit-words-box").removeClass("active");
        }
    });

    String.prototype.isEmpty = function(item) {
        return (item.length === 0 || !item.trim());
    };

    $(document).on("focus",".polish-word", addNewWordsInput);
    $(document).on("focus",".foreign-word", addNewWordsInput);

    function addNewWordsInput(ev){
        if($(".words li").length < 500) {
            var wordParent =  $(this).parent().attr("id");
            if(wordParent=="word"+wordID) {
                var preWordPol = $("#word"+(wordID-1)).children(".polish-word").val();
                var preWordFor = $("#word"+(wordID-1)).children(".foreign-word").val();
                if((preWordPol && !(0 === preWordPol)) || (preWordFor && !(0 === preWordFor))){
                    if(!$("#words").hasClass("active")){
                        $("#words").addClass("active");       
                    }
                    wordID++;
                    $("#words").append("<li id=word"+wordID+" class='additional-words'><input class='foreign-word'><input class='polish-word'></li>"); 

                    if($("#words").hasClass("active")){
                        $("#words").scrollTop($("#words")[0].scrollHeight);  
                    } 
                }              
            }
        }      
    }  
    
    document.getElementById('xD').onchange = function(){
        $(".additional-words").remove();
        $(".foreign-word").val("");
        $(".polish-word").val("");
        wordID = 7; 
        
        var langg1 = [];
        var langg2 = [];
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(progressEvent){
            var lines = this.result.split('\n');
            for(var line = 0; line < lines.length; line++){
                if(line%2==0){
                    langg1.push(lines[line]);
                }else {
                    langg2.push(lines[line]);
                }
                
                if(line==lines.length-1){
                    for(var q=0; q<langg1.length; q++) {
                        if(q>7) {
                            $("#words").append("<li id=word"+q+" class='additional-words'><input class='foreign-word'><input class='polish-word'></li>");
                            $("#word"+q).children(".foreign-word").val(langg1[q]);
                            $("#word"+q).children(".polish-word").val(langg2[q]);

                            if(q==8) {
                                $("#words").addClass("active");
                                $("#words").scrollTop(0);
                            }

                            if(q==langg1.length-1){
                                $("#words").append("<li id=word"+q+" class='additional-words'><input class='foreign-word'><input class='polish-word'></li>");
                                wordID = q;
                            }
                        }else {
                            $("#word"+q).children(".foreign-word").val(langg1[q]);
                            $("#word"+q).children(".polish-word").val(langg2[q]);
                        }
                    }
                }
            }
        };
        reader.readAsText(file, 'ISO-8859-1');
    };

    function clearSet() {
        $("#edit-words-box").removeClass("active");
        $(".set-errors-info").removeClass("active");
        $("[name='name-of-set']").val("");
        $("[name='language-of-set']").val("");
        $("#words").removeClass("active");
        $(".additional-words").remove();
        $(".foreign-word").val("");
        $(".polish-word").val("");
        wordID = 7; 
    }
});

