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
            console.log(data);
            $("#writeHeader_category").empty();
            $("#writeHeader_category").append("<option value=''>카테고리 선택</option>");

            console.log(data.length)
            if(data.length != null && data.length != undefined && data.length != []){
                for(let i=0; i < data.length; i++){
                    if(data[i].board_category_parents_idx == null){
                        $("#writeHeader_category").append('<option class="write_category_option" value='+data[i].board_category_idx+'>- '+data[i].board_category_name+'</option>');
                    }else{
                        $("#writeHeader_category").append('<option value='+data[i].board_category_idx+'>[ '+data[i].board_category_type_name+' ] '+data[i].board_category_name+'</option>');
                    }
                    
                }
            }else{
                console.log("??")
            }

            // var rowData = data.data;

            // $("#mainSection_categorySubDiv-main").empty();

            // // 카테고리 전체 목록
            // $("#mainSection_categorySubDiv-main").append(
            //     '<p class="category_mainTag_P category_mainSelect"><a href="javascript:selectCategory(\'main\',\'all\')">전체</a></p>'
            // );

            // // 카테고리 목록
            // for(var c=0;c<rowData.length;c++){
            //     $("#mainSection_categorySubDiv-main").append(
            //         '<p class="category_mainTag_P"><a href="javascript:selectCategory(\'main\',\''+rowData[c].board_category_name+'\')">'+rowData[c].board_category_name+'</a></p>'
            //     );
            // }

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
          
          
      });
      
});

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