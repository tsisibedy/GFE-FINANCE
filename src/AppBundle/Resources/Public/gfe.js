$(document).ready(function () {
    $("#avancer").hide();
    $("#msgCin").hide();
    $("#test").click(function () {
        $("#search").val($("#editor-one").html());
    });
    $(".avancer").click(function () {
        $("#avancer").slideToggle(500);
        $("#news").slideToggle();
    });

    $("#employerCinNew").keypress(function () {
        if (12 < $("#employerCinNew").val().length) {
            $("#employerCinNew").val('');
            $("#msgCin").show();
        }
        if (12 == $("#employerCinNew").val().length && !isNaN($("#employerCinNew").val())) {
            $("#msgCin").hide();
        }
        if(isNaN($("#employerCinNew").val())){
            $("#employerCinNew").val('');
            $("#msgCin").show();
        }
        if (12 > $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
    });

    $("#employerCinNew").blur(function () {
        if (12 > $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
        if (12 < $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
        if (12 == $("#employerCinNew").val().length && !isNaN($("#employerCinNew").val())) {
            $("#msgCin").hide();
        }
    });

    $("#employerCinNew").focus(function () {
        if (12 < $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
        if (12 > $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
        if (12 == $("#employerCinNew").val().length && !isNaN($("#employerCinNew").val())) {
            $("#msgCin").hide();
        }
    });

});