$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    fetchData();

    function fetchData() {
        $.ajax({
            type: 'GET',
            url: '/fetch-data',
            dataType: 'json',
            success: function(response) {
                $('ul').html("");
                $.each(response.galleries, function(key, item) {
                    $('ul').append('<a href="image/' + item.image_path + '" class="fancybox" data-title="{{ $gallery->title }}" data-id="{{ $gallery->id }}" data-fancybox="all">\
                            <img src="images/' + item.image_path + '" height="100%" width = "100%" alt ="">\
                            <h2 class="text-gray-700 font-bold text-5xl pb-4">' + item.title + '</h2>\
                            </a>');
                });

            }
        });
    }

    $(document).on('submit', '#img_upload', function(e) {
        e.preventDefault();
        let form = $('#img_upload')[0];
        let formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: '/galleries',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // jQuery('#img_upload').trigger("reset");
                jQuery('#img_upload').find('input').val('');

                jQuery('#demo').modal('hide');
                fetchData();

                alert(response.message);
            }
        });
    });
});