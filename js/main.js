$(document).ready(function(){
    

    headerTextFadein();





    
})

function headerTextFadein(){
    $("#Background_Effect").animate({
        "opacity":"0"
    },5000);
    setTimeout(function(){
        $("#headerText").fadeIn(5000);
    },3000)
    
}