$(document).ready(function() {
    $(document).on("click", '#submit', '#submit', function(e) {
        e.preventDefault();
        let form = $('#img_upload')[0];
        let formData = new FormData(form);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: 'galleries',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                jQuery('#img_upload').trigger("reset");
                jQuery('#demo').modal('hide');
                window.location.reload(true);
            }
        });
    });
});