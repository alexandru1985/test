function submitFileExcel() {

    var _token = $("input[name='_token']").val();
    var file_duel_text = $("input[name='file_duel_text']").val();

    if (file_duel_text.length > 0) {
        file_duel_text = $("input[name='file_duel_text']").val();
    } else {
        file_duel_text = 'empty_file';
    }
    var urlCheck = $('#check_extension').data('url');
    // alert(urlCheck);
    $.ajax({
        url: urlCheck,
        type: 'POST',
        data: {_token: _token, file_duel_text: file_duel_text},
        success: function (data) {
            //              $("#debug").append(data);
            if (data.error['file_duel_text'].includes('no_error')) {
                var url = $('#submitFile').data('url');
                var form_data = new FormData($("#file_duel"));
                form_data.append('file_name', $('#file_duel_text').prop('files')[0]);
                form_data.append('_token', _token);
//                alert(url);
                //                 alert(url);
                $.ajax({
                    url: url,
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': _token
                    },
                    success: function (data) {
//                       $("#debug").append(data);
                        if (data.error['check_template'].includes('no_error')) {
//                               alert('12345');
                            $('#file_duel').submit();
                        } else {
                            $("#file_duel_text_error").empty();
                            $("#file_duel_text_error").css("visibility", "visible");
//                              $("#file_duel_text_row").addClass('has-error');
                            $("#file_duel_text_error").append(data.error['check_template']);
                        }
                    }});

            } else {
//                        alert('test');
                $("#file_duel_text_error").empty();
                $("#file_duel_text_error").css("visibility", "visible");
//                        $("#file_duel_text_row").addClass('has-error');
                $("#file_duel_text_error").append(data.error['file_duel_text']);
            }
        }

    });
}

var count = 0;
function addAnotherClaim() {

    var lastId = $("#claims > div:last").attr('id').slice(3);
//    preventDefault();
    count++;

    var nrClaims = $('.textarea-text').length;

    var nextId = 'na_' + count;

    var claimNr = $(".span_claim_text").last().text();
    var newClaimNr = parseInt(claimNr) + 1;

    //alert(lenghtTextLabel);
    if (nrClaims < 100) {
        // Generate new claim and set ids to html tags
        $("#claims > div:last").clone().attr('id', 'id_' + nextId).appendTo("#claims").html();

        // $("#id_"+ nextId).css('background','red');
        $(".span_claim_text").last().attr('id', "claim_number_span_id_" + nextId).text(newClaimNr);
        $(".textarea-text").last().attr('id', "textarea_text_id_" + nextId).html('');
        $(".textarea-label").last().attr('id', "textarea_label_id_" + nextId).html('');
        $(".chars-text").last().attr('id', "chars_text_id_" + nextId).text('150');
        $(".text-above-tmp").last().attr('id', "text_above_id_" + nextId);
        $(".delete-claim").last().attr('id', "del_id_" + nextId);
        $(".chars-label").last().attr('id', "chars_label_id_" + nextId).text('30');
        $('#text_above_id_' + nextId).removeClass('text-above');
        $("#textarea_text_id_" + nextId).val('');
        $("#textarea_label_id_" + nextId).val('');
        $('#text_above_id_' + nextId).hide();
        $("#claim_msg").hide();

        $('.prod-highl-respondents').html(nrClaims + 1);
        getRateCardData(nrClaims + 1, $('#incidence').val());

    }

    // Count remaining characters on text field
    var text_max = 150;
    $('#textarea_text_id_' + nextId).keyup(function () {

        var text_length = $('#textarea_text_id_' + nextId).val().length;
        var text_remaining = text_max - text_length;
        if (text_remaining < 0) {
            text_remaining = 0
        }
        if (text_length <= 150 && text_length > 75) {
            $('#text_limit_id_' + nextId).hide();
            $('#text_above_id_' + nextId).addClass('text-above');
            $('.text-above').show();
        }
        if (text_length <= 75) {
            $('#text_above_id_' + nextId).hide();
            //           $('.text-above').show();
        }
        if (text_length > 150) {
            $('#text_limit_id_' + nextId).show();
        }
        $('#chars_text_id_' + nextId).html(text_remaining);
        //       alert( $('#chars_text_'+textareaTextId));

    });
    // Count remaining characters on label field
    var text_max_label = 30;
    $('#textarea_label_id_' + nextId).keyup(function () {

        var text_length = $('#textarea_label_id_' + nextId).val().length;
        var text_remaining = text_max_label - text_length;
        if (text_remaining < 0) {
            text_remaining = 0
        }

        $('#chars_label_id_' + nextId).html(text_remaining);

        if (text_length > text_max_label) {
            $('#label_limit_id_' + nextId).show();
        } else {
            $('#label_limit_id_' + nextId).hide();
        }
    });
    // Set applyTextDuelActions() function onclick event
    $(function () {
        applyTextDuelActions();
    });
    // Set delete claim onclick event
    $('[id^="del_"]').on('click', function () {
        var claimNr = '';
        $('.textarea-text').each(function () {
            claimNr++;
        });
        if (claimNr > 4) {

            deleteText($(this).attr('id').slice(4));
        }

        //        console.log($(this));
    });

}

function setKeyUpOnTextAreaFields() {

    var counterClaims = 0;
    $('.textarea-text').each(function () {
        counterClaims++;
        var jqObj = $(this);
        var textareaTextId = jqObj.attr('id').slice(14);
        //alert(textareaTextId);
//       charsCount($(this));

        var text_max = 150;
        $('#textarea_text_' + textareaTextId).keyup(function () {

            var text_length = $('#textarea_text_' + textareaTextId).val().length;
            var text_remaining = text_max - text_length;
            if (text_remaining < 0) {
                text_remaining = 0;
            }
            if (text_length < 150 && text_length > 75) {
                $('#text_limit_' + textareaTextId).hide();
                $('#text_above_' + textareaTextId).addClass('text-above');
                $('.text-above').show();
            }
            if (text_length <= 75) {

                $('#text_above_' + textareaTextId).hide();
//           $('.text-above').show();
            }
            $('#chars_text_' + textareaTextId).html(text_remaining);
//       alert( $('#chars_text_'+textareaTextId));

        });

    });
    $('.textarea-label').each(function () {

        var jqObj = $(this);
        var textareaLabelId = jqObj.attr('id').slice(15);
        //alert(textareaLabelId);
//       charsCount($(this));

        var text_max = 30;
        $('#textarea_label_' + textareaLabelId).keyup(function () {
            //alert(textareaLabelId);
            var text_length = $('#textarea_label_' + textareaLabelId).val().length;
            var text_remaining = text_max - text_length;
            if (text_remaining < 0) {
                text_remaining = 0
            }

            if (text_length < 30) {
                $('#label_limit_' + textareaLabelId).hide();
            }
            $('#chars_label_' + textareaLabelId).html(text_remaining);
        });

    });
}

function inputDownloadTemplate() {

    $('#one_by_one').prop('checked', false);
    $('#claims').hide();
    $('#upload_template').show();
    $('#add_another_claim').hide();
    $('#allowed_claims_text').hide();
    $('#claims_info').hide();
    $('#empty_attributes').hide();

}

function inputOneByOne() {

    $('#download_template').prop('checked', false);
    $('#claims').show();
    $('#upload_template').hide();
    $('#add_another_claim').show();
    $('#allowed_claims_text').show();
    $('#claims_info').show();

}

function loadClaimsInfo() {

    var url = $('#claims_link').data('url');
    var _token = $('#generate_token').val();
//    alert(_token);
    $.ajax({
        url: url,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': _token
        },
        success: function (data) {
            //          $("#debug").html(data);
            $("#claims_info").empty().append(data);
        }});
}

function uploadLogoDuel() {

    var form_data = new FormData($("#logo_form_duel"));
    form_data.append('file_name', $('#file_duel_logo').prop('files')[0]);
    var _token = $('#generate_token').val();

    var url = $('#submit_logo_duel').data('url');
    $.ajax(
            {url: url,
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': _token
                },
                success: function (data) {
//          $("#debug").html(data);
//             alert('12345');

                    if (data.error['file_duel_logo'].includes('no_error')) {
                        $("#logo_area").html(data.html);

                    } else {
                        $("#file_duel_logo_error").empty();
                        $("#file_duel_logo_error").css("visibility", "visible");
                        ;
                        $("#file_duel_logo_error").append(data.error['file_duel_logo']);
                    }
                }});
}

function savePairText() {

    var url = $('#pair_link').data('url');
    var text = document.getElementById("save_pair_text").value;
    var _token = $('#generate_token').val();
//    alert(text);
//    alert(url);
    $.ajax({
        url: url,
        type: 'POST',
        data: {text: text},
        headers: {
            'X-CSRF-TOKEN': _token
        },
        success: function (data) {

        }
    });
}

function getPairValue() {

    var value = document.getElementById("pair").value;
    if (value == -1) {
        $('#save_pair_text').show();
    } else {
        $('#save_pair_text').hide();
    }

}

