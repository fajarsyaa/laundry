$('.paket_crud').on('change', function() {

    if ($(this).is(':checked')) {

        $('.create-file').hide();
        $('.file-name').removeAttr('required');
        
        // $('.choose-table').show();
        // $('.choose-table').attr('required','');

    }else{

        $('.create-file').show();
        $('.file-name').attr('required','');

        // $('.choose-table').hide();
        // $('.choose-table').removeAttr('required');

    }

})