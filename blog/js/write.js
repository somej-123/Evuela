"use strict";

$(document).ready(()=>{


    // 카테고리 목록 불러오기
    $.ajax({
        url:"./ajax/getCategoryListToWrite.php",
        method:"POST",
        dataType:"json",
    })
    .done((data)=>{
        // console.log(data);
        if(data.confirm == 1){

            var data = data.data;
            // console.log(data);
            $("#writeHeader_category").empty();
            $("#writeHeader_category").append("<option value=''>카테고리 선택</option>");

            // console.log(data.length)
            if(data.length != null && data.length != undefined && data.length != []){
                for(let i=0; i < data.length; i++){
                    if(data[i].board_category_parents_idx == null){
                        $("#writeHeader_category").append('<option class="write_category_option" value='+data[i].board_category_idx+'>- '+data[i].board_category_name+'</option>');
                    }else{
                        $("#writeHeader_category").append('<option value='+data[i].board_category_idx+'>[ '+data[i].board_category_type_name+' ] '+data[i].board_category_name+'</option>');
                    }
                    
                }
            }else{
                // console.log("??")
            }

        }else{
            // alert("회원수정에 실패 하였습니다\n다시 시도해주세요");
            showAlert("카테고리 목록이 존재 하지 않거나\n서버에 문제가 발생했습니다.","error");
            // location.reload(true);
        }
    })
    .fail((data)=>{
        // alert("서버에 문제가 발생했습니다.\n다시 시도해주세요.");
        showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
        return;
    })
    // 카테고리 목록 불러오기 끝


    // var modal = new bootstrap.Modal('#myModal')
    // var dropdown = new bootstrap.Dropdown('[data-bs-toggle="dropdown"]')
    // console.log("aa");


    // summernote::start

    // summernote setting::start

    $("#mainSection_Body_write_summernote").summernote({
        // height: 500,                 // set editor height
        minHeight: 500,             // set minimum height of editor
        // maxHeight: null,             // set maximum height of editor
        focus: true,                  // set focus to editable area after initializing summernote
        
        // summernote 언어
        lang: 'ko-KR', // default: 'en-US',
        placeholder: '내용을 입력해주세요',

        // summernote 툴바
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['codeview', 'help']],//, 'fullscreen'
        ],

        // 팝업 메뉴
        popover: {
            image: [
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ],
            table: [
                ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
            ],
            air: [
                ['color', ['color']],
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']]
            ]
        },

        // 콜백
        callbacks: {
            // 이미지 업로드시
            onImageUpload: function(files) {

                setImgFile(files, $(this));

            }
          }
          
          
      });

      // summernote reset
    //   $("#mainSection_Body_write_summernote").summernote('reset');

      // summernote setting::end



      // summernote submit::start


      $("#summernote_submit_btn").on("click",()=>{
        let user_id = $("#user_id").val();
        let user_level = $("#user_level").val();
        let board_title = $("#writeHeader_title").val();
        let board_category = $("#writeHeader_category").val();
        let board_contents = $('#mainSection_Body_write_summernote').summernote('code');
        let board_id = $("#board_id").val();

        if(user_id == null || user_id == "" || user_id == undefined){
            showAlert("다시 로그인하여 시도해주세요","error");
            return;
        }else if(user_level == null || user_level == "" || user_level == undefined){
            showAlert("다시 로그인하여 시도해주세요","error");
            return;
        }else if(board_title == null || board_title == ""){
            showAlert("제목을 입력해주세요","error");
            return;
        }else if(board_category == null || board_category == "" || board_category == undefined){
            showAlert("게시글의 카테고리를 지정해주세요","error");
            return;
        }else if($('#mainSection_Body_write_summernote').summernote('isEmpty')){
            showAlert("내용을 입력해주세요","error");
            return;
        }else{
            Swal.fire({
                // title: '게시글을 등록 하시겠습니까?',
                html:"<b>게시글을 등록 하시겠습니까?</b>",
                // text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '등록',
                cancelButtonText:'취소'
              }).then((result) => {
                if (result.isConfirmed) {
                // 이미지 크기 수정
                
                var imgTags = $("#mainSection_Body_writeBody img");
                var imgCntUpdates = 0;
        
                if(imgTags.length > 0){

                for(imgCntUpdates = 0; imgCntUpdates < imgTags.length; imgCntUpdates++){
                    let imgTagID = imgTags.eq(imgCntUpdates).attr("id");
                    let imgTagWidth = imgTags.eq(imgCntUpdates).css("width").replace("px","");
                    let imgTagHeight = imgTags.eq(imgCntUpdates).css("height").replace("px","");
                    
                    $.ajax({
                        url:"./ajax/updateImgSize.php",
                        data:{
                            board_img_id : imgTagID,
                            img_width : imgTagWidth,
                            img_height : imgTagHeight,
                        },
                        method:"POST",
                        dataType:"json",
                    }).done((data)=>{

                    })
                    .fail((data)=>{
                        
                    }) 
                }
                        


                // 게시글 등록
                $.ajax({
                    url:"./ajax/createBoard.php",
                    data:{
                        user_id : user_id,
                        user_level : user_level,
                        board_title : board_title,
                        board_category : board_category,
                        board_contents :board_contents,
                        board_id : board_id
                    },
                    method:"POST",
                    dataType:"json",
                })
                .done((data)=>{
                    if(data.error){
                        alert("게시글 등록을 완료하였습니다.")
                        location.href="./list";
                        return;
                    }else{
                        showAlert("게시글 등록에 실패하였습니다\n다시 시도해주세요","error");
                        return;
                    }
                })
                .fail((data)=>{
                    showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
                    return;
                })
                //   게시글 등록 끝

                    

                    
                }else{
                    // 게시글 등록
                    $.ajax({
                        url:"./ajax/createBoard.php",
                        data:{
                            user_id : user_id,
                            user_level : user_level,
                            board_title : board_title,
                            board_category : board_category,
                            board_contents :board_contents,
                            board_id : board_id
                        },
                        method:"POST",
                        dataType:"json",
                    })
                    .done((data)=>{
                        if(data.error){
                            alert("게시글 등록을 완료하였습니다.")
                            location.href="./list";
                            return;
                        }else{
                            showAlert("게시글 등록에 실패하였습니다\n다시 시도해주세요","error");
                            return;
                        }
                    })
                    .fail((data)=>{
                        showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
                        return;
                    })
                    //   게시글 등록 끝
                }

                
                }
              })
        }

        
        
      })

      // summernote submit::end

        //summernote imgDelete::start

        $(".note-remove>.note-btn").on("click",()=>{
            console.log("이미지 삭제 버튼 클릭");
        });

        
        // document.addEventListener('selectionchange', () => {
        //     console.log(document.getSelection());
        //   });


        //summernote imgDelete::end
      // summernote::end
      
    //   목록 버튼 클릭(작성 페이지)
    $("#writeToListBtn").on('click',()=>{
        location.href="./list";
    })
    //   나가기 버튼 클릭(블로그 홈 페이지)
    $("#writeToHomeBtn").on('click',()=>{
        location.href="./home";
    })
});


// summernote 이미지 저장

function setImgFile(files, editor){

    // userID 값 저장
    var userID = $("#user_id").val();
    // userLevel 값 저장
    var userLevel = $("#user_level").val();
    // boardID 값 저장
    var boardID = $("#board_id").val();

    // 이미지 파일 체크
    var imgFilecheck = false;
    // 확장자 정규식
    var reg = /(.*?)\.(gif|jpg|png|jepg)$/; //허용할 확장자

    // 확장자 검사

    for(var i=0; i<files.length; i++){
        if(!files[i].name.match(reg)){
            
            showAlert("이미지는 gif, jpg, png, jepg 파일만 업로드가 가능합니다.","error");
            imgFilecheck = false;
            return;
        }else{
            imgFilecheck = true;
        }
    }

    // console.log(imgFilecheck);

    if(imgFilecheck == true){

        for(var i=0; i<files.length; i++){

            var formData = new FormData();
            formData.append("files",files[i]);
            formData.append("user_id",userID);
            formData.append("user_level",userLevel);
            formData.append("board_id",boardID);

            $.ajax({
                url:'./ajax/setSummernoteImgUpload.php',
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                type:'POST',
                success:function(data){
                    //alert(data);
                    if(data.error){
                        // var dataUrl = ".."+data.url.substr(19);
                        // // console.log(dataUrl)
                        // var image = $('<img>').attr('src', '' + dataUrl); // 에디터에 img 태그로 저장을 하기 위함
                        var image = $('<img>').attr({'src' : data.url, 'id' : data.imgID}); // 에디터에 img 태그로 저장을 하기 위함
                        // 에디터에 img 태그로 저장을 하기 위함
                        $('#mainSection_Body_write_summernote').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
                        return;
                    }else{
                        showAlert(data.errorText, "error");
                        return;
                    }
                },
                error:function(data){
                    showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
                    return;
                }
            })
        }

    }

}

// summernote 이미지 저장 끝





// sweetAlert 사용
function showAlert(alertText,alertType,alertTitle,alertFooter){

    if(alertType == "default"){
        Swal.fire(alertText);
        return;
    }
    else if(alertType == "error"){
        Swal.fire({
            icon: 'error',
            title: alertTitle,
            text: alertText,
            footer: alertFooter
          })
          return;
    }
    else if(alertType == "success"){
        Swal.fire({
            icon: 'success',
            title: alertTitle,
            text: alertText,
            footer: alertFooter
          })
          return;
    }
    
}