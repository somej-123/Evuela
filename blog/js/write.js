"use strict";

$(document).ready(()=>{
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