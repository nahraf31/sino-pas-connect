$(document).ready(function () {

    var galleryUpload = function () {
        $('#gallery-upload').fileupload({
            limitMultiFileUploads: true,
            sequentialUploads: 1,
            dropZone: $('#drop'),
            add: function (e, data) {
                var area = $('div.gallery #images');
                var tpl = $('<div class="holder"><div class="outer"><div class="img-nest loading"><img src="uploads/' + data.files[0].name + '" alt="img"><div class="over"><i class="fa fa-times" onclick="deleteImage(this);return false;"></i></div></div></div></div>');
                tpl.append('<p>' + data.files[0].name + '</p>');
                area.append(tpl);

                var jqXHR = data.submit();
            },
            progress: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },
            fail: function (e, data) {
            },
            done: function (e, data) {
                $('.img-nest').each(function () {
                    $(this).addClass('reveal');
                });
                ASplugins.eqHeight();
            }
        });
    };
    galleryUpload();

    var fileUpload = function () {
        $('#file-upload').fileupload({
            limitMultiFileUploads: true,
            sequentialUploads: 1,
            dropZone: $('#drop'),
            add: function (e, data) {
                var area = $('#file-upload #drop p');
                area.text(data.files[0].name);
                var jqXHR = data.submit();
            },
            progress: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
            },
            fail: function (e, data) {
            },
            done: function (e, data) {
            }
        });
    };
    fileUpload();

    profileUpload = function () {

        $('#profile-inp').change(function () {
            var preview = $("#profile-preview img");
            var input = $(event.currentTarget);
            var file = input[0].files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                image_base64 = e.target.result;
                preview.attr("src", image_base64);
            };
            reader.readAsDataURL(file);
        });
    };
    profileUpload();

});

$('#drop p').on('dragenter', function () {
    $(this).parents('#drop').addClass('entered');
});
$('#drop p').on('dragleave', function () {
    $(this).parents('#drop').removeClass('entered');
});
$('#drop p').on('drop', function () {
    $(this).parents('#drop').removeClass('entered');
});

// Prevent the default action when a file is dropped on the window
$(document).on('drop dragover', function (e) {
    e.preventDefault();
});

function deleteImage(obj) {
    $(obj).parents('.holder').remove();
}