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
    <body>

        <div class="container" style="height: 2000px;">
            <div class="row">
                <div class="alert alert-danger"  style="position: fixed;display:none; width: 70%">
                    <a href="#" class="close">x</a>
                    <span id="alert-text"></span>
                </div>
            </div>    
            <div class="row">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur congue aliquet est id dignissim. Nulla fermentum erat quis purus molestie mattis. Sed sit amet pharetra orci, ornare pellentesque est. Nullam aliquet turpis at ipsum rhoncus, vitae eleifend augue sodales. Proin sed consectetur odio, nec pulvinar quam. Proin a augue iaculis, dignissim ligula non, tristique velit. Curabitur a eros pulvinar, molestie magna nec, placerat sapien. Suspendisse facilisis lobortis dapibus. Etiam libero lorem, consectetur in nulla eget, hendrerit pretium velit. Etiam rutrum nec eros a aliquet. Nunc nibh nunc, maximus vel ipsum eget, auctor cursus eros. Phasellus dapibus facilisis arcu sed hendrerit. Aliquam erat volutpat.

                Suspendisse eu rhoncus odio. Morbi dapibus tortor quis dolor tristique, sit amet cursus lacus gravida. Ut id magna hendrerit, elementum tortor nec, hendrerit elit. Nunc feugiat libero quis scelerisque blandit. Vivamus sodales porta ornare. Etiam in neque ante. Curabitur aliquam nulla dui, efficitur rhoncus nulla tempor nec. Integer libero eros, finibus ut dolor at, iaculis elementum velit. Phasellus mollis mollis placerat. Aenean fringilla blandit purus et iaculis. Donec semper placerat justo a finibus. Nulla ullamcorper ipsum vitae neque vehicula, ac euismod orci rutrum. Cras gravida suscipit augue, sed condimentum leo elementum at. Duis sodales dolor congue nisl pharetra, sit amet congue massa scelerisque. Etiam diam metus, condimentum ut turpis nec, lacinia semper mauris. Morbi id varius purus, id aliquam nisi.

                Fusce vehicula ipsum in metus varius, vitae posuere ante egestas. Etiam rutrum maximus gravida. Sed venenatis turpis nisl, et feugiat massa efficitur sed. Aliquam in vestibulum velit. Aliquam erat volutpat. Donec lacinia ex ut magna mattis congue. Aliquam aliquet sapien velit, ut varius tortor iaculis vitae. Aenean condimentum vel urna et ultrices. Phasellus in auctor justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec facilisis, nisi consectetur ornare rutrum, nulla mauris efficitur est, vel sollicitudin orci eros et orci. Suspendisse vulputate lobortis metus, sit amet tristique nisi scelerisque et. Etiam at nibh tincidunt, mattis tortor quis, aliquet mauris. Mauris sodales lectus eu lectus tincidunt faucibus.
            </div>    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td><button type="button" id="deactivate123"class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>Mary</td>
                        <td>Moe</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                    <tr>
                        <td>July</td>
                        <td>Dooley</td>
                        <td><button type="button" class="btn btn-danger">Deactivate</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </body>
    <script type="text/javascript">
        $(document).ready(function () {


            $('.btn').click(function (e) {
                e.preventDefault();

                var id =  $("#deactivate123").attr('id');
                $("#deactivate123").parent().parent().css( "background-color", "red" ).attr('id',id);
                var text = $("#deactivate123 > td:nth-child(1)").text();
                $("#alert-text").append("sdfsdf "+text);
                alert(text);

                $.ajax({
                    type: "POST",
                    url: "formProcess.php",

                    data: {},
                    success: function (data) {

                        $(".alert").show().fadeOut(10000);
                        
                        
                    }
                });


            });
            $('.close').click(function (e) {
                e.preventDefault();

                $(".alert").stop().fadeOut();
                $(".alert").hide();

            });



        });
    </script>

</html>
