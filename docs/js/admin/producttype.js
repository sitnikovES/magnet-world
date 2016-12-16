/**
 * Created by es.sitnikov on 16.12.2016.
 */
$(document).ready(function(){
    tinymce.init({
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        selector: "#producttype-text",
        language : "ru",
        convert_urls : false
    });
});