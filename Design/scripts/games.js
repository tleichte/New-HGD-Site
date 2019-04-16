var yearList = $(".games-year");

var container = $("#games-container");

var currentYear = $(".games-year-selected").first().attr("year");

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
    $(".games-game").on("click", showModal);
}


GetYearGames();


function showModal() {
    $("#games-modal").fadeIn(300);
    // $("#games-modal").show();
    $("#games-modal").removeClass("games-modal-invisible");
    $("#games-modal").addClass("games-modal-visible");
    console.log("Clicked on Game");
}

function hideModal() {
    $("#games-modal").fadeOut(300);
    $("#games-modal").removeClass("games-modal-visible");
    $("#games-modal").addClass("games-modal-invisible");
}


$(".games-modal-close").on("click", hideModal);

$("#games-modal").hide();


