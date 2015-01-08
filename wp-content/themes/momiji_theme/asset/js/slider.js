var itemheight = 330;
$(document).ready(function () {
    var num = 0;
    var size = $("#slide ul li").size();
    var interval;

    $("#slide .items li:eq(0) img").attr("src", $("#curr-item").val());
    $("#slide-bar ul li:eq(0)").addClass("item-hover");
    function slide() {
        if (num === size - 1 || $("#slide ul").css("margin-top") === "-1320px") {
            num = 0;
            $("#slide ul").animate({"margin-top": "0px"}, 500, function () {

            });
        } else {
            num = num + 1;
            $("#slide ul").animate({"margin-top": "-=330px"}, 2000, function () {

            });
        }
        $("#slide .items li img").attr("src", $("#prev-item").val());
        $("#slide .items li:eq(" + num + ") img").attr("src", $("#curr-item").val());
        $("#slide-bar ul li").removeClass("item-hover");
        $("#slide-bar ul li:eq("+num+")").addClass("item-hover");
    }

    interval = setInterval(slide, 6000);
    $("#slide, #slide-bar").mouseenter(function () {
        clearInterval(interval);
    });
    $("#slide, #slide-bar").mouseleave(function () {
        interval = setInterval(slide, 6000);
    });
    $("#slide .next").click(function () {
        slide();
    });
    $("#slide .prev").click(function () {
        if (num === 0 || $("#slide ul").css("margin-top") === "0px") {
            num = size - 1;
            $("#slide ul").animate({"margin-top": "-1320px"}, 500, function () {
                
            });
        } else {
            num = num - 1;
            $("#slide ul").animate({"margin-top": "+=330px"}, 2000, function () {

            });
        }
        $("#slide .items li img").attr("src", $("#prev-item").val());
        $("#slide .items li:eq(" + num + ") img").attr("src", $("#curr-item").val());
        $("#slide-bar ul li").removeClass("item-hover");
        $("#slide-bar ul li:eq("+num+")").addClass("item-hover");
    });
    $("#slide-bar ul li a").click(function(){
       return false; 
    });
    
   
});

function hoverSlide(id) {
    var margin = (1-id) * itemheight;
    $("#slide-bar ul li").removeClass("item-hover");
    $("#slide ul").animate({"margin-top": margin+"px"}, 300, function () {

    });
    $("#slide .items li img").attr("src", $("#prev-item").val());
    var index = id - 1;
    $("#slide .items li:eq("+index+") img").attr("src", $("#curr-item").val());
    $("#slide-bar ul li:eq("+index+")").addClass("item-hover");
}

