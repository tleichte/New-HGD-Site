(function($) {

var yearList = $(".games-year");

var container = $("#games-container");

var currentYear = $(".games-year-selected").first().attr("year");

var currentGame;

yearList.on("click", function() {
    yearList.removeClass("games-year-selected");
    $(this).addClass("games-year-selected");
    currentYear = $(this).attr("year");
    GetYearGames();
});


function GetYearGames() {
    container.empty();
    container.html($("#loading").html());
    container.addClass("games-container-loading");
    setTimeout(ReplaceGameContainer, 500);
}


function ReplaceGameContainer() {
    container.empty();
    container.removeClass("games-container-loading");
    container.html($("#games-"+currentYear).html());
    $(".games-game").on("click", function() {
        showModal()
        $("#games-modal-content").addClass("games-modal-content-loading");
        $("#games-modal-content").html($("#loading").html());
        //console.log($(this).attr("game"));
        currentGame = $(this).attr("game") || "orbit";
        setTimeout(ReplaceModalContent, 500);
    });
}

function ReplaceModalContent() {
    $("#games-modal-content").removeClass("games-modal-content-loading");
    $("#games-modal-content").html($("#game-"+currentGame).html());
    $(".games-modal-gallery-image").on("click", function() {
        ReplaceGalleryImage(this);
    });
}

GetYearGames();


function showModal() {
    $("#games-modal").fadeIn(300);
    // $("#games-modal").show();
    $("body").addClass("modal-open");
    $("#games-modal").removeClass("games-modal-invisible");
    $("#games-modal").addClass("games-modal-visible");

    console.log("Clicked on Game");
}

function hideModal() {
    $("#games-modal").fadeOut(300);
    $("body").removeClass("modal-open");
    $("#games-modal").removeClass("games-modal-visible");
    $("#games-modal").addClass("games-modal-invisible");
}


$(".games-modal-close").on("click", hideModal);

$("#games-modal").hide();


function ReplaceGalleryImage(imageClicked) {
    $(".games-modal-gallery-image").removeClass("selected");
    $(imageClicked).addClass("selected");

    var outHTML = "";
    switch($(imageClicked).attr("gallery-type")) {
        case "trailer":
            outHTML += "<div class='games-modal-trailer'>";
            outHTML += "<iframe src='https://www.youtube.com/embed/"+$(imageClicked).attr("gallery-trailer-id")+"'";
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