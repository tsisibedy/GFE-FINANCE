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
            $("#employerCinNew").val('');
            $("#msgCin").show();
        }
        if (12 == $("#employerCinNew").val().length && !isNaN($("#employerCinNew").val())) {
            $("#msgCin").hide();
        }
        if (isNaN($("#employerCinNew").val())) {
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


    //controlle nom
    $("#employerNomNew").keyup(function () {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        for (var a = 0; a <= $nom.length; a++) {
            if (!isNaN($nom[a])) {
                $("#msgNom").show();
                break;
            }
        }
    });

    $("#employerNomNew").blur(function () {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        $nom = $("#employerNomNew").val();
        for (var a = 0; a <= $nom.length; a++) {
            if (!isNaN($nom[a])) {
                $("#msgNom").show();
                $("#employerNomNew").val('');
                break;
            }
        }

    });

    $("#employerNomNew").focus(function () {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        for (var a = 0; a <= $nom.length; a++) {
            if (!isNaN($nom[a])) {
                $("#msgNom").show();
                break;
            }
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
        for (var a = 0; a <= $nom.length; a++) {
            if (!isNaN($nom[a])) {
                $("#msgPrenom").show();
                break;
            }
        }
    });

    $("#employerPrenomNew").blur(function () {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        $nom = $("#employerPrenomNew").val();
        for (var a = 0; a <= $nom.length; a++) {
            if (!isNaN($nom[a])) {
                $("#msgPrenom").show();
                $("#employerPrenomNew").val('');
                break;
            }
        }

    });

    $("#employerPrenomNew").focus(function () {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        for (var a = 0; a <= $nom.length; a++) {
            if (!isNaN($nom[a])) {
                $("#msgPrenom").show();
                break;
            }
        }
    });

});