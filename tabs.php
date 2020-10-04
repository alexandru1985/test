<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<script>
    $(document).ready(function(){
        var lang = ['en','ro','fr'];
        var key;
//        for (key in lang) {
//    $( "#name_"+lang[key] ).blur(function() {
//  alert( "Handler for .blur() called." +lang[key] );
//});
//        }
//        
        lang.forEach(function(entry) {
     $( "#name_"+entry ).blur(function() {
  alert( "Handler for .blur() called." +entry );
});
});
var test = $("#home").length;


//
//$( "#form" ).on( "submit focusout", function() {
//  alert( "test" );
//});

});


</script>
<body>

<div class="container">
  <h2>Dynamic Tabs</h2>
  <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        Dynamic Tabs <h2>Dynamic Tabs</h2>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
       Name En <input type="text" id="name_en" name="name_en"><br>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
       Name Ro <input type="text" id="name_ro" name="name_ro"><br>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
       Name Fr <input type="text" id="name_fr" name="name_fr"><br>
    </div>
  </div>
  
  
  <form id="form" method="post" action="#">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
      <input type="hidden" id="custId" name="custId" value>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
<?php

$subtitles[1] = 5;
$subtitles[2] = 7;
$subtitles = array_values($subtitles);

echo "<pre>";
var_dump($subtitles);
echo "<pre/>";
        