
/* global URL, base_url */

var loadFile = function (event) {
    var output = document.getElementById('change-profile-pic');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#change-profile-pic').cropper("destroy");
    var $previews = $('.preview');
    $('#change-profile-pic').cropper({
        ready: function () {
            var $clone = $(this).clone().removeClass('cropper-hidden');
            $clone.css({
                display: 'block',
                width: '100%',
                minWidth: 0,
                minHeight: 0,
                maxWidth: 'none',
                maxHeight: 'none'
            });
            $previews.css({
                width: '100%',
                overflow: 'hidden'
            }).html($clone);
        },
        crop: function (e) {
            // Custom
            // End Custom
            var imageData = $(this).cropper('getImageData');
            var croppedCanvas = $(this).cropper('getCroppedCanvas');
            $('#profile-result').html('<img src="' + croppedCanvas.toDataURL() + '" class="img-responsive">');

            $('#save-profile').click(function () {
                $('#loading').show();
                $.ajax({
                    type: 'POST',
                    url: '/admin/hoso/setProfile',
                    data: {
                        url: croppedCanvas.toDataURL(),
                        maHoSo: $('#maHoSo').val()
                    },
                    success: function (response) {
                        if (response == "success") {
                            $('#loading').html("Hình ảnh đã được cập nhật");
                            setTimeout(function () {
                                $('#loading').hide();
                                $('#change-profile').modal('hide');
                            }, 2000);
                        }

                    }
                });
            });

            var previewAspectRatio = e.width / e.height;
            $previews.each(function () {
                var $preview = $(this);
                var previewWidth = $preview.width();
                var previewHeight = previewWidth / previewAspectRatio;
                var imageScaledRatio = e.width / previewWidth;
                $preview.height(previewHeight).find('img').css({
                    width: imageData.naturalWidth / imageScaledRatio,
                    height: imageData.naturalHeight / imageScaledRatio,
                    marginLeft: -e.x / imageScaledRatio,
                    marginTop: -e.y / imageScaledRatio
                });
            });

        }

    });

};
