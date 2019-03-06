$(function() {

    $(".twaddress").twaddress();

    

    function get_payway() {
        var payway_radios = document.getElementsByName('payway');
           for (var i = 0; i < payway_radios.length; i++){
               if (payway_radios[i].checked){
                   return payway_radios[i].value;
               }
           }
    }

    function get_invoice() {
        var invoice_radios = document.getElementsByName('invoice');
           for (var i = 0; i < invoice_radios.length; i++){
               if (invoice_radios[i].checked){
                   return invoice_radios[i].value;
               }
           }
    }

    function get_add(id){
        var add = $('#'+id).parent().find('.address').val();
        if(add == ""){
            return add;
        }else{
            return $('#'+id).val(); 
        }
    }

    $('#receiver_ease').click(function(){
        if($("#receiver_ease").prop("checked")){
            var data;
            var check = 0;
            var sum_form = 0;
            var error = [];
            data = {
                'contact_name': $('#contact_name').val(),
                'contact_mobile': $('#contact_mobile').val(),
                'contact_add': get_add('contact_add')
            };

            $.each(data, function(key, value){
                if(value == "" || typeof value === "undefined"){
                    switch(key) {
                        case 'contact_info':
                        error.push('聯絡人姓名');
                        break;
                        case 'contact_mobile':
                        error.push('聯絡人手機');
                        break;
                        case 'contact_add':
                        error.push('聯絡人地址');
                        break;
                    }
                }else{
                    check++;
                    
                }
                sum_form++;
            });

            if(check == sum_form){
                $('#receiver_data').addClass('is-hidden');
            }else{
                $("#receiver_ease").prop('checked', false);
                alert('請填寫'+error.join("、"));
            }

        }

    });

    $('#submit_checkout').click(function(){
        var data;
        var check = 0;
        var sum_form = 0;
        var error = [];

        if($("#receiver_ease").prop("checked")){
            
            data = {
                'contact_name': $('#contact_name').val(),
                'contact_mobile': $('#contact_mobile').val(),
                'contact_eamil': $('#contact_eamil').val(),
                'contact_add': get_add('contact_add'),
                'receiver_name': $('#contact_name').val(),
                'receiver_mobile': $('#contact_mobile').val(),
                'receiver_add': get_add('contact_add'),
                'payway': get_payway(),
                'invoice': get_invoice()
            };
        }else{
            data = {
                'contact_name': $('#contact_name').val(),
                'contact_mobile': $('#contact_mobile').val(),
                'contact_eamil': $('#contact_eamil').val(),
                'contact_add': get_add('contact_add'),
                'receiver_name': $('#receiver_name').val(),
                'receiver_mobile': $('#receiver_mobile').val(),
                'receiver_add':get_add('receiver_add'),
                'payway': get_payway(),
                'invoice': get_invoice()
            };
            

        }


        $.each(data, function(key, value){
            if(value == "" || typeof value === "undefined"){
                
                switch(key) {
                    case 'contact_info':
                    error.push('聯絡人姓名');
                    break;
                    case 'contact_mobile':
                    error.push('聯絡人手機');
                    break;
                    case 'contact_eamil':
                    error.push('聯絡人電子信箱');
                    break;
                    case 'contact_add':
                    error.push('聯絡人地址');
                    break;
                    case 'receiver_name':
                    error.push('收件人姓名');
                    break;
                    case 'receiver_mobile':
                    error.push('收件人手機');
                    break;
                    case 'receiver_add':
                    error.push('收件人地址');
                    break;
                    case 'payway':
                    error.push('付款方式');
                    break;
                    case 'invoice':
                    error.push('發票方式');
                    break;
                }
            }else{
                check++;
                
            }
            sum_form++;
        });

        if(check == sum_form){
            //send_data;
            console.log(data);
        }else{
            alert('請填寫'+error.join("、"));
        }


    });
});