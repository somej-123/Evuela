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
        if(data.confirm == 1){//테스트

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

        // console.log(user_id);
        // console.log(user_level);
        // console.log(board_title);
        // console.log(board_category);
        // console.log(board_contents);

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
      
});


// summernote 이미지 저장

function setImgFile(files, editor){

    var imgFilecheck = false;
    var reg = /(.*?)\.(gif|jpg|png|jepg)$/; //허용할 확장자

    // 확장자 검사

    for(var i=0; i<files.length; i++){
        if(!files[i].name.match(reg)){
            // console.log("불허");
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
            // console.log(files[i]);

            var formData = new FormData();
            formData.append("files",files[i]);

            $.ajax({
                url:'./ajax/setSummernoteImgUpload.php',
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                type:'POST',
                success:function(data){
                    //alert(data);
                    console.log(data);
                    if(data.error){
                        // var dataUrl = ".."+data.url.substr(19);
                        // // console.log(dataUrl)
                        // var image = $('<img>').attr('src', '' + dataUrl); // 에디터에 img 태그로 저장을 하기 위함
                        var image = $('<img>').attr('src', '' + data.url); // 에디터에 img 태그로 저장을 하기 위함
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
    
    // var formData = new FormData();
    // var fileArr = Array.prototype.slice.call(files);
    // var filename = "";
    // var fileCnt = 0;
    // fileArr.forEach(function(f){
    //     // console.log(f);
    //     filename = f.name;
    //     if(filename.match(reg)) {
    //         formData.append('file[]', f);
    //         fileCnt++;
    //     }
    // });

    // console.log(formData);

    // if(fileCnt <= 0) {
    //     alert("파일은 gif, png, jpg 파일만 등록해 주세요.");
    //     return;
    // } else {

    // }
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