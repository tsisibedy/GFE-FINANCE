$(document).ready(function () {
    $("#avancer").hide();
    $("#msgCin").hide();
    $("#msgNom").hide();
    $("#msgPrenom").hide();
    $("#test").click(function () {
        $("#search").val($("#editor-one").html());
    });
    $(".avancer").click(function () {
        $("#avancer").slideToggle(500);
        $("#news").slideToggle();
    });

    //controlle ajout cin
    $("#employerCinNew").keyup(function () {
        if (12 < $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
        if (12 == $("#employerCinNew").val().length && !isNaN($("#employerCinNew").val())) {
            $("#msgCin").hide();
        }
        if (isNaN($("#employerCinNew").val())) {
            $("#msgCin").show();
        }
        if (12 > $("#employerCinNew").val().length) {
            $("#msgCin").show();
        }
    });

    $("#employerCinNew").blur(function () {
        if (isNaN($("#employerCinNew").val())) {
            $("#employerCinNew").val("");
            $("#msgCin").show();
        }
        if (12 > $("#employerCinNew").val().length) {
            $("#msgCin").show();
            $("#employerCinNew").val("");
        }
        if (12 < $("#employerCinNew").val().length) {
            $("#employerCinNew").val("");
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


    //controlle nom
    $("#employerNomNew").keyup(function () {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        var str = $("#employerNomNew").val();
        var patt1 = /[0-9]/;
        var patt2 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if(result!=null)
        {
            $("#msgNom").show();
        }
    });

    $("#employerNomNew").blur(function () {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        var str = $("#employerNomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if(result!=null)
        {
            $("#msgNom").show();
            $("#employerNomNew").val("");
        }

    });

    $("#employerNomNew").focus(function () {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        var str = $("#employerNomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if(result!=null)
        {
            $("#msgNom").show();
        }
    });


    //controlle prenom
    $("#employerPrenomNew").keyup(function () {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        var str = $("#employerPrenomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if(result!=null)
        {
            $("#msgPrenom").show();
        }
    });

    $("#employerPrenomNew").blur(function () {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        var str = $("#employerPrenomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if(result!=null)
        {
            $("#msgPrenom").show();
            $("#employerPrenomNew").val("");
        }

    });

    $("#employerPrenomNew").focus(function () {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        var str = $("#employerPrenomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if(result!=null)
        {
            $("#msgPrenom").show();
        }
    });

});