function saveForm(formData, url, successCallback, validateForm) {
    var error = '';

    if (validateForm && typeof validateForm === 'function') {
        error = validateForm(formData);
    }

    if (error === "") {
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            beforeSend: function () {
                $.blockUI({ 
                    message: '<h1><img src="/assets/images/busy.gif" alt="loading" /> Just a moment...</h1>' 
                });
            },
            success: function (response) {
                successCallback(response);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                $.unblockUI();
            }
        });
    } else {
       $.notify(error, {
            position: "top center",
            className: "error"
        });
    }

    return false;
}


function loadPage(url, successCallback) {
    $.ajax({
        url: url,
        beforeSend: function () {
            $.blockUI({ 
                message: '<h1><img src="/assets/images/busy.gif" alt="loading" /> Just a moment...</h1>' 
            });
        },
        success: function (response) {
            successCallback(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
        },
        complete: function () {
            $.unblockUI();
        }
    });
}


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

