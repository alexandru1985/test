<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
   <script type='text/javascript'>
$(document).ready(function() {
var text_max = 150;
$('#textarea_feedback').html('limit 10 characters, remaining ' + text_max );

$('#textarea').keyup(function() {
    var text_length = $('#textarea').val().length;
    var text_remaining = text_max - text_length;

    $('#textarea_feedback').html('limit 10 characters, remaining ' +  text_remaining);
});

});
    </script>
</head>
<body>
<div style="width: 300px;">
<textarea id="textarea" rows="5" cols="40" maxlength="150" ></textarea>
<div id="textarea_feedback" style="float:right; width: 220px;"></div>
</div>
</body>
</html>
<?php
