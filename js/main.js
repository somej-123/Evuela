$(document).ready(function(){
    
    headerTextFadein();
    scrollEvent();

    btnEvent();




    
})

function headerTextFadein(){
    scroll_on();
    $("#Background_Effect").animate({
        "opacity":"0"
    },5000);
    setTimeout(function(){
        $("#headerText").fadeIn(5000);
    },3000)
    setTimeout(function(){
        $("#lineEffectLine").fadeIn(3000);
        $("#lineEffectLine").animate({
            "width":"25%"
        },2000);
    },2000)
    setTimeout(function(){
        // $("#lineTest").css("display","none")
        $("#lineEffectText").fadeIn(3000);
        scroll_off();
    },6000);
    
}

function scrollEvent(){
    var scroll_pos = 0;
    var scrollPec = 0;
    var lightSectionY = $("#lightSection").offset().top;
    $(document).scroll(function(el){
        if($(this).scrollTop() <= 961){
            scroll_pos = $(this).scrollTop();

            scrollPec = Math.ceil(scroll_pos / lightSectionY * 100);
            if(scrollPec < 9){
                $("#lightDiv").css({
                    "opacity":"0.0"+scrollPec
                });
            }
            else if(scrollPec < 100 &&scrollPec > 9){
                $("#lightDiv").css({
                    "opacity":"0."+scrollPec
                });
            }else{
                $("#lightDiv").css({
                    "opacity":"1"
                });
            }
            // console.log(scroll_pos);
            // console.log(scrollPec);
        }
    });
}




function btnEvent(){

    $("#lineEffectText").on("click",function(){
        var offset = $("#lightSection").offset();
        $("html").animate({scrollTop : offset.top}, 300);
    })
}

 // 스크롤 제한 ON
 function scroll_on() {
    $('html, body').css({'overflow': 'hidden', 'height': '100%'});
    $('#headerContainer').on('scroll touchmove mousewheel', function(event) {
      event.preventDefault();
      event.stopPropagation();
      return false;
    });
}

// 스크롤 제한 OFF
function scroll_off() {
    $("#headerContainer").off('scroll touchmove mousewheel');
    $('html, body').css({'overflow': 'visible', 'height': '100%'});
}