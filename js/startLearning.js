$('#start').on('click', function() {
    if($("[name='sets-to-choose']").children().length > 0) {
        $('#check-btn').unbind( "click" );
        $('#known-btn').unbind( "click" );        
        $('#unknown-btn').unbind( "click" );  
        $(window).unbind("keydown");
        $("#answers").removeClass("active");
        $(".information-box").removeClass("active");   
        $(".proper-answer").remove();
        $("#random-word").text("");
        $("#random-word").removeClass("disable");
        $("[name='answer']").val("");

        $(".give-and-see-answer-box").addClass("active");
        const setid = $("[name='sets-to-choose']").val();
        const setIDdb = setid.slice(3);
        const way = $("[name='ways']").val();

        $.ajax({
            type: 'POST',
            url: "php/getWords.php",
            data: {setIDdb:setIDdb},
            dataType: "json"
        })
            .done(function(response) {
            let words = [];
            let lang1 = [];
            let lang2 = [];

            for(var i=0; i<response.length; i++){
                words[i] = $.map(response[i], function(el) { return el });
                lang1[i] = words[i][1];
                lang2[i] = words[i][0];
            }

            /*---------------*/

            var quantity = lang1.length;
            var shuffleArr = shuffleArray(lang1, lang2); 
            $("#others-words").text("Pozostałe słówka: "+quantity);
            var answers = [];
            var x = 0;
            var correct = 0;

            $("#random-word").removeClass("active");

            var sec = 0;
            var seconds = 0;
            var minutes = 0;     
            var timer = setInterval( function(){
                seconds = ++sec%60;
                minutes = parseInt(sec/60,10);
            }, 1000);

            $("#random-word").text(shuffleArr[0][x]);

            if(way=="with-writing"){
                $("#without-writing").removeClass("active");
                $("#with-writing").addClass("active");
                $('#check-btn').on('click', checkAnswer);
            }else{
                $("#without-writing").addClass("active");
                $("#with-writing").removeClass("active");
                $('#known-btn').on('click', checkAnswer);          
                $('#unknown-btn').on('click', checkAnswer);
            }  
            
            $(window).on("keydown", checkAnswer);

            function checkAnswer(ev) {
                if(ev.type=="keydown"){
                    if(way=="with-writing"){
                        if(ev.keyCode!=13){
                            return;
                        }else{
                            ev.preventDefault();
                        }
                    }else {
                        if(ev.keyCode!=13 && ev.keyCode!=17){
                            return;
                        }else{
                            ev.preventDefault();
                        }
                    }
                }
                
                if(quantity>0){
                    if(way=="with-writing"){
                        if(ev.target.id=="check-btn" ||  ev.keyCode==13) {
                            var answer = $("[name='answer']").val();     
                            if((answer.toLowerCase())==(shuffleArr[1][x].toLowerCase())) {
                                answers[x] = 1;
                                correct++;
                            }else {
                                answers[x] = 0;
                            }
                            $("[name='answer']").val("");
                            if(quantity>1){
                                $("[name='answer']").focus();
                            }
                        }
                    }else {
                        if(ev.target.id=="known-btn" || ev.keyCode==13) {
                            answers[x] = 1;
                            correct++;
                        }else if(ev.target.id=="unknown-btn" || ev.keyCode==17){
                            answers[x] = 0;
                        }
                    }

                    var check = answers[x] ? "correct" : "incorrect";
                    $("<li class='proper-answer "+check+"'>"+shuffleArr[0][x]+" - "+shuffleArr[1][x]+"</li>").appendTo("#answers");

                    if(($("#answers li").length>=10 && $(window).width()>=1350) || ($("#answers li").length>=6 && $(window).width()<1350)) {
                        $("#answers").addClass("active");
                        $("#answers").scrollTop($("#answers")[0].scrollHeight);
                    }

                    x++;
                    quantity--;                 
                    $("#random-word").text(shuffleArr[0][x]);
                    $("#others-words").text("Pozostałe słówka: "+quantity);  

                    if(!quantity) {
                        showResult();
                    }
                }
            }

            function showResult(){
                clearInterval(timer);          

                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                if(!minutes){
                    $(".seconds").text(seconds+" sek");
                }else {
                    $(".minutes").text(minutes+" min");
                    $(".seconds").text(seconds+" sek");
                }

                $(".information-box").addClass("active");
                $("#random-word").addClass("disable");
            }

            function drawChart(){
                var data = google.visualization.arrayToDataTable([
                    ['Odpowiedź', 'Ilość (w punktach)'],
                    ['Poprawne', correct],
                    ['Niepoprawne', (answers.length-correct)]
                ]);

                var options = {
                    backgroundColor: 'transparent', 
                    colors: ['#4ba851','#db3f3f'],
                    pieSliceTextStyle: {fontSize: 15 },
                    pieSliceText: 'value-and-percentage',
                    width: 225,
                    height: 260,
                    legend: { position: 'top', alignment: 'center',  textStyle:{fontSize: 13}},
                    chartArea:{
                        width: '90%',
                        height: '70%',
                        bottom: 10
                    }
                }

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data,options);
            }

            function shuffleArray(array, array2) {
                for (let i = array.length - 1; i > 0; i--) {
                    let j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                    [array2[i], array2[j]] = [array2[j], array2[i]];
                }     
                let arrays = [array,array2]
                return arrays;
            }

        }); 
    }else {
        alert("Nie posiadasz żadnych zestawów!");
    }
});
