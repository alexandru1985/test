<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

    </head>
    <body>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02"/>
                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>

            <!--               <label class="custom-file">
                  <input type="file" id="myfile" class="custom-file-input" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                  <span class="custom-file-control"></span>
              
               </label>
            -->            <div class="test"></div>
            <table>
                <tr>
                    <th>Claim</th>
                    <th>Label</th>

                </tr>
                <tr>
                    <td class='textarea-text' id='claim_1'>Test1</td>
                    <td class='textarea-label'>Maria Anders</td>

                </tr>
                <tr>
                    <td class='textarea-text' id='claim_2'>Test12</td>
                    <td class='textarea-label'>Francisco Chang</td>

                </tr>
                <tr>
                    <td class='textarea-text' id='claim_3' >Test123</td>
                    <td class='textarea-label'>Roland Mendel</td>

                </tr>
                <tr>
                    <td class='textarea-text'  id='claim_4'>fdasf</td>
                    <td class='textarea-label'></td>

                </tr>



            </table>

        </div>
        <button id='order'> Order </button>
        <script>
//            $('#inputGroupFile02').on('change', function () {
//                //get the file name
//                var fileName = $(this).val();
//                var res = fileName.substr(12);
//                //replace the "Choose a file" label
////                $(this).append('.custom-file-label').html(res);
//                $(".test").html("");
//                $(".test").append(res);
//                return true;
//            });
            $(document).ready(function () {
                var claimEmpty = false;
                var claimNr = '';
                $("#order").click(function () {
                    $('.textarea-text').each(function () {
                        claimNr++;

                    });
                    $('.textarea-text:empty').each(function () {

                        claimEmpty = true;
                        // alert(n);                 
                    });
                    $('.textarea-label:empty').each(function () {

                        claimEmpty = true;
                        // alert(n);                 
                    });
    
                    alert(claimNr);
                    alert(claimEmpty);

                    if (claimNr < 5 && claimEmpty == true) {
                        claimNr = '';
                        alert('Minimum 4 claims filled.');
                        return false;
                    }

                    if (claimNr > 4 && claimEmpty == true) {
                        claimNr = '';
                        alert('The inputs claims are empty.');
                        return false;
                    }
                    claimNr = '';
                    var url = "url";
                    alert(url);



                });
            });



        </script>
    </body>
</html>
<?php

$arr = array ('first' => 'a', 'second' => 'b', );
$key = array_search ('b', $arr);

echo $key;
?>