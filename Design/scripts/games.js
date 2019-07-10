(function($) {


    $(document).ready(function() {
        var url = new URL(window.location.href);
        //var queryYear = url.searchParams.get("year");
        var queryGame = url.searchParams.get("game");
        
        if (queryGame) {
            showModal(queryGame, InitialGameCallback);
        }
        else {
            //Get the first year's game list
            var year = $(".games-year").first().attr("year");
            $(".games-year[year='"+year+"']").trigger("click");
        }
    });

function InitialGameCallback() {
    var year = $(".games-modal-year").html();
    $(".games-year[year='"+year+"']").trigger("click");
}


var yearList = $(".games-year");

var container = $("#games-container");


yearList.on("click", function() {
    //Actions to year list
    yearList.removeClass("games-year-selected");
    $(this).addClass("games-year-selected");

    //Get the games list
    GetGamesList($(this).attr("year"));

});


function GetGamesList(year) {

    //Actions to game list
    container.empty();
    container.html($("#loading").html());
    container.addClass("games-container-loading");

    //Send AJAX request
    $.ajax({
        url: games.ajaxurl,
        type: 'post',
        data: {
            action: 'ajax_gameslist',
            year: year //pass along year clicked
        },
        success: function(result) {
            //Reset container
            container.html("");
            container.removeClass("games-container-loading");
            container.html(result);

            //Reset games list clickability
            ResetGamesClick();
        },
        error: function(result) {
            alert("HTTP POST Failed!");
            console.log(result);
        }
    });
}


function ResetGamesClick() {
    $(".games-game").on("click", function() {
        var game = $(this).attr("game");
        console.log("Game Clicked: "+game);
        showModal(game);
    });
}

function GetGameModal(game, successCallback, failCallback) {
    
    $("#games-modal-content").addClass("games-modal-content-loading");
    $("#games-modal-content").html($("#loading").html());
    
    //Send AJAX request
    $.ajax({
        url: games.ajaxurl,
        type: 'post',
        data: {
            action: 'ajax_gamemodal',
            game: game //pass along year clicked
        },
        success: function(result) {
            $("#games-modal-content").removeClass("games-modal-content-loading");
            $("#games-modal-content").html(result);
            $(".games-modal-gallery-image").on("click", function() {
                ReplaceGalleryImage(this);
            });
            ReplaceGalleryImage($(".games-modal-gallery-image").first());

            var url = new URL(window.location.href);
            url.searchParams.set("game", game);
            history.replaceState(history.state, "Game Page", url);

            successCallback();
        },
        error: function(result) {
            $("#games-modal-content").removeClass("games-modal-content-loading");
            $("#games-modal-content").html("<p class='games-modal-title'>Sorry, we couldn't find that game!</p>");
            //hideModal();
            failCallback();
        }
    });
}


function showModal(game, successCallback, failCallback) {
    $("#games-modal").fadeIn(300);
    $("body").addClass("modal-open");
    $("#games-modal").removeClass("games-modal-invisible");
    $("#games-modal").addClass("games-modal-visible");

    GetGameModal(game, successCallback, failCallback);
}

function hideModal() {
    $("#games-modal").fadeOut(300);
    $("body").removeClass("modal-open");
    $("#games-modal").removeClass("games-modal-visible");
    $("#games-modal").addClass("games-modal-invisible");
    setTimeout(function () {$("#games-modal-content").html("");}, 500);

    var url = new URL(window.location.href);
    url.searchParams.delete("game");
    history.replaceState(history.state, "Game Page", url);
}


$(".games-modal-close").on("click", hideModal);

$("#games-modal").hide();


$("#games-modal").on("click", function(event) {
    if (!$(event.target).is(".games-modal-inner") && !$(event.target).closest('.games-modal-inner').length) {
        hideModal()
    }   
});

function ReplaceGalleryImage(imageClicked) {
    $(".games-modal-gallery-image").removeClass("selected");
    $(imageClicked).addClass("selected");

    var outHTML = "";
    switch($(imageClicked).attr("gallery-type")) {
        case "trailer":
            outHTML += "<div class='games-modal-trailer'>";
            outHTML += "<iframe src='https://www.youtube.com/embed/"+$(imageClicked).attr("gallery-trailer-id")+"?rel=0'";
            outHTML += "frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen";
            outHTML += "></iframe>";
            break;
        case "image":
            outHTML += "<img src='"+ $(imageClicked).attr('gallery-image-url') +"'>";
            break;
    }
    $(".games-modal-gallery-display-image").html(outHTML);
}


})( jQuery );