var yearList = $(".games-year");

var container = $("#games-container");

var currentYear = $(".games-year-selected").first().attr("year");
console.log(currentYear);

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
    container.html($("#games-"+currentYear).html())
}


GetYearGames();