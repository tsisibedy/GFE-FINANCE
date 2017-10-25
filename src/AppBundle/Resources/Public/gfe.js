$(document).ready(function() {
    $("#avancer").hide();
    $("#msgCin").hide();
    $("#msgNom").hide();
    $("#msgPrenom").hide();
    $("#msgIm").hide();
    $("#msgIndice").hide();
    $("#msgContact").hide();
    $("#idInfo").hide();
    $(".hide").hide();
    $("#employerId").hide();
    $("#fileToUpload").hide();
    $("#employerId").val($("#userId").val());
    $(".hideDate").hide();
    $(".hideSexe").hide();
    $(".hideDate").val($("#single_cal4").val());
    $(".hideSexe").val($("#sexeValue").val());
    $("#test").click(function() {
        $("#public").val($("#editor-one").html());
    });
    $(".avancer").click(function() {
        $("#avancer").slideToggle(500);
        $("#news").slideToggle();
    });

    $("#single_cal4").blur(function() {
        $(".hideDate").val($("#single_cal4").val());
    });

    $("#sexeValue").change(function() {
        $(".hideSexe").val($("#sexeValue").val());
    });


    //controlle ajout cin
    $("#employerCinNew").keyup(function() {
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

    $("#employerCinNew").blur(function() {
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


    //controlle nom
    $("#employerNomNew").keyup(function() {
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

        if (result != null) {
            $("#msgNom").show();
        }
    });

    $("#employerNomNew").blur(function() {
        if (!isNaN($("#employerNomNew").val())) {
            $("#msgNom").show();
        }
        if (isNaN($("#employerNomNew").val())) {
            $("#msgNom").hide();
        }
        var str = $("#employerNomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#msgNom").show();
            $("#employerNomNew").val("");
        }

    });


    //controlle prenom
    $("#employerPrenomNew").keyup(function() {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        var str = $("#employerPrenomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#msgPrenom").show();
        }
    });

    $("#employerPrenomNew").blur(function() {
        if (!isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").show();
        }
        if (isNaN($("#employerPrenomNew").val())) {
            $("#msgPrenom").hide();
        }
        var str = $("#employerPrenomNew").val();
        var patt1 = /[0-9]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#msgPrenom").show();
            $("#employerPrenomNew").val("");
        }

    });


    //information Immatricule
    $("#informationIm").keyup(function() {
        if (isNaN($("#informationIm").val())) {
            $("#msgIm").show();
        }
        if (!isNaN($("#informationIm").val())) {
            $("#msgIm").hide();
        }
        var str = $("#informationIm").val();
        var patt1 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#msgIm").show();
        }
    });

    $("#informationIm").blur(function() {
        if (isNaN($("#informationIm").val())) {
            $("#informationIm").val('');
            $("#msgIm").show();
        }
        var str = $("#informationIm").val();
        var patt1 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#informationIm").val('');
            $("#msgIm").show();
        }
        if (result == null) {
            $("#msgIm").hide();
        }
    });


    //information indice
    $("#informationIndice").keyup(function() {
        if (isNaN($("#informationIndice").val())) {
            $("#msgIndice").show();
        }
        if (!isNaN($("#informationIndice").val())) {
            $("#msgIndice").hide();
        }
        var str = $("#informationIndice").val();
        var patt1 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#msgIndice").show();
        }
    });

    $("#informationIndice").blur(function() {
        if (isNaN($("#informationIndice").val())) {
            $("#informationIndice").val('');
            $("#msgIndice").show();
        }
        var str = $("#informationIndice").val();
        var patt1 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#informationIndice").val('');
            $("#msgIndice").show();
        }
        if (result == null) {
            $("#msgIndice").hide();
        }
    });

    //information Contact
    $("#contact").keyup(function() {
        if (isNaN($("#contact").val())) {
            $("#msgContact").show();
        }
        if (!isNaN($("#contact").val())) {
            $("#msgContact").hide();
        }
        var str = $("#contact").val();
        var patt1 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#msgContact").show();
        }
    });

    $("#contact").blur(function() {
        if (isNaN($("#contact").val())) {
            $("#contact").val('');
            $("#msgContact").show();
        }
        var str = $("#contact").val();
        var patt1 = /[a-zA-Z]/;
        var result = str.match(patt1);

        if (result != null) {
            $("#contact").val('');
            $("#msgContact").show();
        }
        if (result == null) {
            $("#msgContact").hide();
        }
    });

    $("#file").click(function(){
        $("#fileToUpload").click();
    });

});