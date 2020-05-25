<script src="js/jquery-1.10.2.min.js"></script> 

<input id="sortpicture" type="file" name="sortpic" />
<button id="upload">Upload</button>

<script type="text/javascript">
$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    alert(form_data);
    $.ajax({
                url: 'upload.php',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: {'file':file_data},
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response);
                }
     });
});
</script>