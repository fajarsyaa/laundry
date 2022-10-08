<script>
        
    $('table > tbody > tr').each(function(key, val){
        var number = $(this).children('.number_table').html();
        last_number = key+1;
    });
    $(".total-table").val(last_number);

    $('.add-column').click(function(){
        $(".total-table").val(parseInt($(".total-table").val()) + 1);
    })

    $('body').on('click','.delete-column',function(){
        $(this).parents('tr').hide();
        
        var x = $(this).parents('tr').find('input.deleted').val("true");
        var x = $(this).parents('tr').find('td > .input-table').removeAttr("required");

        $(".total-table").val(parseInt($(".total-table").val()) - 1);
    });

    $("body").on("change", ".input-null", function(){
        if($(this).is(':checked')){
            $(this).val("on")
        }else{
            $(this).val("no")
        }
    });

    $("body").on("keyup",".name_column", function(){
        $(this).val($(this).val().replace(/[,./ <>!@#$%^&*([)';?:"{}]/g, "-"));
    });
    $("body").on("keyup",".table-name", function(){
        $(this).val($(this).val().replace(/[,./ <>!@#$%^&*([)';?:"{}]/g, "-"));
    });

    $("body").on("change",".input-pri", function(){

        $("input[name='primary_key']").val($(this).parents('tr').eq(0).find(".name_column").val());
        let row = $(".input-ai").attr('checked', false);
    });
    
    $("body").on("change",".input-ai", function(){
        $("input[name='auto_increment']").val($(this).parents('tr').find(".name_column").val());
        $(this).parents('tr').eq(0).find("td").eq(4).find(".input-pri").prop('checked', true);
    });

    $("body").on("change",".input-table", function(){
        let status_null = [];
        $('table > tbody > tr').each(function(key, val){
            status_null[key] = $(val).find('td').eq(0).find(".input-table").val()+"-"+$(val).find('td').eq(5).find(".input-table").val();
        });
        $(".null-new").val(status_null.join(","));
    });

    

    // validate data
    $("body").on("change",".select-type",function(){
        let type        = $(this).val().split("-");
        let typeData    = type[0]; 
        let nameData    = type[1]; 
        let row = $(this).parents('tr').eq(0).find("td");
        

        // CHECK NILAI
        if(nameData == "TEXT" || typeData == "numeric" || typeData == "date" || nameData == "LONGTEXT"){
            if(typeData == "date" || nameData == "TEXT" || nameData == "LONGTEXT"){
                row.eq(2).find(".input-table").attr("readonly","");
                row.eq(2).find(".input-table").attr("placeholder","Tidak perlu diisi");
                row.eq(2).find(".input-table").removeAttr("required");
            }else{
                row.eq(2).find(".input-table").show();
                row.eq(2).find(".input-table").removeAttr("readonly","");
                row.eq(2).find(".input-table").removeAttr("required");
                row.eq(2).find(".input-table").attr("placeholder","Panjang Kolom");
            }
        }else{
            row.eq(2).find(".input-table").attr("required","");
        }
        
        // CHECK AI
        if(typeData != "numeric"){
            row.eq(3).find(".input-table").hide();
            row.eq(3).find(".cant-ai").show();
        }else{
            row.eq(3).find(".cant-ai").hide();
            row.eq(3).find(".input-table").show();
        }
    });

    $('.count-text').each(function(key, val){
        let countText = $(this).data('count');
        if(countText <= 30){
            let row = $(this).parents('.modal').eq(0).find('.modal-dialog').addClass('');
        }else if(countText <= 100){
            let row = $(this).parents('.modal').eq(0).find('.modal-dialog').addClass('modal-lg');
        }else if(countText > 100){
            let row = $(this).parents('.modal').eq(0).find('.modal-dialog').addClass('modal-xl');
        }
    });

</script>