$(document).ready(function(){
    $("#mobile_navMenuToggleBtn").on("click",function(){
        $("#mobile_navMenu").fadeToggle(1000);
    });

    $( window ).resize(function() {
        //창크기 변화 감지
        open_chatroom();
     });
})



function open_chatroom(){
    var windowWidth = $( window ).width();
    if(windowWidth > 768) {
       $("#mobile_navMenu").css("display","none");
    }
 }