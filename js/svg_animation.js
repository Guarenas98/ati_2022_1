// svg animation

var hovering = true;

console.log($("img")[0] );

$("figure").css("margin-top", "-" + $("img")[0].height.toString() + "px" );

$("#svg-foto").hover (  e => {
    if(hovering){
        $("#hover_svg").css("transform", "translateY(-10%)");
        $("#hover_svg").css("opacity", "75%");
        $("#no_hover_svg").css("opacity", "75%");
        $("#no_hover_svg").css("transform", "translateY(-25%)");
        $("#email").css("transform", "translateY(-25%)");
    }else{
        $("#hover_svg").css("opacity", "50%");
        $("#no_hover_svg").css("opacity", "50%");
        $("#hover_svg").css("transform", "translateY(-100%)");
        $("#no_hover_svg").css("transform", "translateY(-5%)");
        $("#email").css("transform", "translateY(-400%)");
    }
    hovering = !hovering;
});
