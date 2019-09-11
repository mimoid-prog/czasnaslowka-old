$(document).ready(function() {
    $(".login-btn").on('click', function() {
        $("#get-to-account-modal").addClass('active');
        $("#signup-form").removeClass("active");
        $("#forgot-password-form").removeClass("active");  
        $("#link-send").removeClass("active");
        $("#login-form").addClass("active");      
    });

    $(".signup-btn").on('click', function() {
        if($(document).width()>650) {
            $("#get-to-account-modal").addClass('active');
            $("#login-form").removeClass("active");
            $("#forgot-password-form").removeClass("active");
            $("#link-send").removeClass("active");
            $("#signup-form").addClass("active");
            $(".errors-info").text("");
        }else {
            window.location.href = "registerPage.php";
        }
    });  

    $("#forgot-password").on('click', function() {
        if($(document).width()>650) {
            $("#signup-form").removeClass("active");
            $("#login-form").removeClass("active");       
            $("#forgot-password-form").addClass("active");
            $("#link-send").removeClass("active");
            $(".errors-info").text(""); 
        }else {
            window.location.href = "forgotPasswordPage.php";
        }      
    });  

    $("#close-btn").on('click', function(){
        $("#get-to-account-modal").removeClass('active');
        $("#link-send").removeClass("active");
        $(".errors-info").text("");
        $("[name='email']").val("");
        $("[name='password']").val("");
        $("[name='confirm-password']").val("");
    }); 

    $("form").on('submit', function(ev) {
        ev.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize()
        })
            .done(function(response) {
            $("[name='email']").val("");
            $("[name='password']").val("");
            $("[name='confirm-password']").val("");

            if(response.slice(-4) == ".php") {
                window.location.href = response;
            }else if(response=="created"){
                $("#signup-form").removeClass("active");
                $("#link-send").addClass("active"); 
                $("#link-send").text("Link weryfikacyjny został wysłany na twój email. Zaloguj się na skrzynkę pocztową i aktywuj konto swoje na CzasNaSlowka.pl.")
            }else if(response=="send"){
                $("#forgot-password-form").removeClass("active");
                $("#link-send").addClass("active"); 
                $("#link-send").text("Link ze zmianą hasła został wysłany na twój email. Zaloguj się na skrzynkę pocztową i zmień swoje hasło na CzasNaSlowka.pl.");
            }else{
                $(".errors-info").text(response);
            }               
        })
    });
});