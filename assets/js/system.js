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
        success: function (res) {
            unblockWindow();
            if (showError(res)) {
                $(element).closest("form").submit();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {            
            unblockWindow();
            alert("Request error");
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
        for (var field in errors) {
            console.log(field);
            var formGroup = $("[name='" + field + "']").first().closest(".form-group");            
            formGroup.append('<span class="help-block">'+errors[field]+'</span>');
            formGroup.addClass("has-error");
        }
    }
    return false;
}

function blockWindow() {
    $.blockUI({ message:"<h1>Aguarde</h1>", css: { 
        border: 'none', 
        padding: '15px', 
        backgroundColor: '#000', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', 
        opacity: .5, 
        color: '#fff' 
    } });
}

function unblockWindow() { 
    $.unblockUI();   
}