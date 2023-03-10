jQuery(function($){
    $('body').on('click', '.ct_tax_media_button', function(e){
        e.preventDefault();
        aw_uploader = wp.media({
            title: 'Custom image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('#taxonomy-image-id').val(attachment.url);
        })
        .open();
    });
});