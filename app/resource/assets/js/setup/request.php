<script>

    $('.run').click(function(element){

        $('.table-response').html("");

        
        element.preventDefault();
        
        var controllerName = $('.controller').val();
        var functionName   = $('.function').val();
        
        console.log(controllerName);
        
        var data_request = {};

        $('.data-request > tr').each(function(key, value){

            var key   = $(this).find('td').eq(0).find('input[type = text]').val();
            var value = $(this).find('td').eq(1).find('input[type = text]').val();

            data_request[key] = value;
            
        });

        $.ajax({

            type    : "POST",
            url     : "../../app/core/controller.php?controllerName="+controllerName+"&function="+functionName+"&id=",
            data    : data_request,
            dataType: 'json',

            success: function(data){

                var response = "";

                if (typeof data[0] === 'object') {

                    $.each(data[0], function(key, value){
                    
                        response += "<tr>";
                            
                            response += "<th>";
                                response += "<span style='color:orange'>"+key+"</span>";
                            response += "</th>";
                            response += "<th>";
                                response += " : ";
                            response += "</th>";
                            response += "<th>";
                                response += "<i>"+value+"</i>";
                            response += "</th>";
                        
                        response += "</tr>";
                        
                    });
                    
                }else if(Object.prototype.toString.call(data[0]) == '[object String]'){

                    response += `<span style='color:#fdcb6e'>"<span style='color:#636e72'>${data[0]}</span>"</span>`;

                }

                if (data[1] == "200") {

                    status = "<i class='mdi mdi-information-outline' style='color:white'></i> <span style='color:#f5f6fa'>Status : </span><span style='color:#0be881'>"+data[1]+"</span>";

                }else{

                    status = "<i class='mdi mdi-information-outline' style='color:white'></i> <span style='color:#f5f6fa'>Status : </span><span style='color:#ffd32a'>"+data[1]+"</span>";

                }

                if (data[2] != 0) {
                    
                    var contentAlert = data[2];
                    
                    Swal.fire(
                        'Response',
                        ''+contentAlert+'',
                    );

                }

                $('.status-response').html(status);
                
                
                $('.table-response').html("<div>"+response+"</div>");
            }
        });

    });

    $('.add-request').click(function(){
        
        var column = `<tr>`;
                column += `<td>
                                <input type="text" name="key[]" class="form-control form-control-sm">
                            </td>`;
                column += `<td>
                                <input type="text" name="value[]" class="form-control form-control-sm">
                            </td>`;
           column += `</tr>`;

        $('.data-request').append(column);

    });
</script>