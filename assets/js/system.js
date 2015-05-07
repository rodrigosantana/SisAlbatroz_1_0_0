function validation(controller, element) {
    $(".help-block").remove();
    $(".has-error").removeClass("has-error");
    blockWindow();
    $.ajax({
        type: "POST",
        cache: false,
        url: URL + "/" + controller + "/validation",
        dataType: "json",
        data: $(element).closest("form").serialize(),
        success: function(res) {
            unblockWindow();
            if (showError(res)) {
                $(element).closest("form").submit();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            unblockWindow();
            console.log(thrownError);
            //alert("Request error");
        },
        async: true
    });
    return false;
}


function showError(res) {
    if (res.status == undefined && (res != undefined || res != "" || res != null)) {
        return true;
    }

    if (res.status == "ok") {
        return true;
    } else if (res.status == "errors") {
        var errors = res.errors;
        var focusFirst = true;
        
        for (var field in errors) {
            var formGroup;

            if ($("[name='" + field + "']").first().closest(".div-help").length > 0) {
                formGroup = $("[name='" + field + "']").first().closest(".div-help");
            } else {
                formGroup = $("[name='" + field + "']").first().closest(".form-group");
            }

            if (focusFirst) {
                $(".tab-pane").removeClass('active');
                $("[name='" + field + "']").first().closest(".tab-pane").addClass('active');
                var idTabPane = $("[name='" + field + "']").first().closest(".tab-pane").attr('id');
                
                
                if (idTabPane) {
                    var listTagA = $('.nav-tabs').find('a');
                    
                    for(var i = 0; i < listTagA.length; i++) {
                        var a = listTagA[i];
                        
                        if ($(a).attr('href') === '#'+idTabPane) {
                            $('.nav-tabs').find('li').removeClass('active');
                            $(a).parent().addClass('active');
                            break;
                        }
                    }
                }
                
                if ($("[name='" + field + "']").hasClass("select2")) {
                    $("[name='" + field + "']").select2("focus", true);                    
                } else {                
                    $("[name='" + field + "']").focus();
                }
                
                focusFirst = false;
            }

            if (formGroup) {
                formGroup.append('<span class="help-block">' + errors[field] + '</span>');
                formGroup.addClass("has-error");
            }
        }
    }
    return false;
}

function blockWindow() {
    $.blockUI({message: "<h1>Aguarde</h1>", css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }});
}

function unblockWindow() {
    $.unblockUI();
}