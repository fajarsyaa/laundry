$('.name-folder').keyup(function() {
    $('.exist_folder').val('');
    $('.append-folder-name').html($(this).val());
});

$('.exist_folder').on('change', function() {
    $('.name-folder').val('');
    $('.name-folder').removeAttr('required');
    $('.append-folder-name').html($(this).val());
});