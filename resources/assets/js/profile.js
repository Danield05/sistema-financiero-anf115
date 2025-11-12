$(document).on('click', '.edit-profile', function (event) {
    event.preventDefault();
    $('#pfUserId').val(loggedInUser.id);
    $('#pfName').val(loggedInUser.name);
    $('#pfEmail').val(loggedInUser.email);
    if (loggedInUser.photo) {
        $('#edit_preview_photo').attr('src', '/img/profile/' + loggedInUser.photo);
    } else {
        $('#edit_preview_photo').attr('src', '{{asset("img/logo.png")}}');
    }
    $('#EditProfileModal').modal('show');
});

$(document).on('change', '#pfImage', function () {
    let ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $(this).val('');
        $('#editProfileValidationErrorsBox').
            html(
                'The profile image must be a file of type: jpeg, jpg, png.').
            show();
    } else {
        displayPhoto(this, '#edit_preview_photo');
    }
});

window.displayPhoto = function (input, selector) {
    let displayPreview = true
    if (input.files && input.files[0]) {
        let reader = new FileReader()
        reader.onload = function (e) {
            let image = new Image()
            image.src = e.target.result
            image.onload = function () {
                $(selector).attr('src', e.target.result)
                displayPreview = true
            }
        }
        if (displayPreview) {
            reader.readAsDataURL(input.files[0])
            $(selector).show()
        }
    }
}

$(document).on('submit', '#editProfileForm', function (event) {
    event.preventDefault();
    let userId = $('#editProfileUserId').val();
    var loadingButton = jQuery(this).find('#btnPrEditSave');
    loadingButton.button('loading');
    $.ajax({
        url: usersUrl + '/' + userId,
        type: 'post',
        data: new FormData($(this)[0]),
        processData: false,
        contentType: false,
        success: function success(result) {
            if (result.success) {
                $('#EditProfileModal').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1500);
            }
        },
        error: function error(result) {
            console.log(result);
        },
        complete: function complete() {
            loadingButton.button('reset');
        }
    });
});

$(document).on('submit', '#changePasswordForm', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#btnPrPasswordEditSave');
    loadingButton.button('loading');
    $.ajax({
        url: '/change-password',
        type: 'post',
        data: new FormData($(this)[0]),
        processData: false,
        contentType: false,
        success: function success(result) {
            if (result.success) {
                $('#changePasswordModal').modal('hide');
                alert(result.message);
                setTimeout(function () {
                    location.reload();
                }, 1500);
            } else {
                alert(result.message);
            }
        },
        error: function error(result) {
            console.log(result);
            if (result.responseJSON && result.responseJSON.errors) {
                let errors = '';
                for (let key in result.responseJSON.errors) {
                    errors += result.responseJSON.errors[key][0] + '\n';
                }
                alert(errors);
            } else {
                alert('Error al cambiar la contraseña');
            }
        },
        complete: function complete() {
            loadingButton.button('reset');
        }
    });
});
