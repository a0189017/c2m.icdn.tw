$(function() {
    var total_pos = 4;
	var design_img = {} //存base64圖

    //旋轉視角
    $('.rotate_view').click(function(){
        var now_pos = $(this).parent().data('pos');
        var view_way = $(this).data('view');
        var next_pos;

        if(view_way == 'next'){
            next_pos = now_pos+1;
        }else{
            next_pos = now_pos-1;
        }

        if(next_pos > total_pos){
            next_pos = 1;
        }else if(next_pos < 1){
            next_pos = total_pos;
        }

        $('#view_tool').data('pos',next_pos);
        $('.preview-pos').removeClass('is-acted');
        $('#pos_'+next_pos).addClass('is-acted');
    });

	//切換工具
    $('.tool-item').click(function(){
        var tool = $(this).data('tool');
        $('.tool-item').removeClass('is-acted');
        $('.tool-box').addClass('is-hidden');
        $(this).addClass('is-acted');
        $('.tool-box[data-tool="'+tool+'"]').removeClass('is-hidden');
    });

    //設定顏色
    $('#color_toggle .style-item').click(function(){
        var color = $(this).attr('data-color');
        var font = $(this).attr('data-font');
        $('#preview_img').attr('data-color',color);
        $('#preview_img').attr('data-font',font);

        if(font == 'white'){
            $('#runfor_preview').addClass('font-white');
            $(this).parent().children().html('');
            $(this).html('<i class="material-icons">&#xE5CA;</i>');

        }else{//black
            $('#runfor_preview').removeClass('font-white');
            $(this).parent().children().html('');
            $(this).html('<i class="material-icons black">&#xE5CA;</i>');
        }

        setPdImg();
    });

    //設定文字
    $('#font_front').bind('focus',filter_time);
    $('#font_left').bind('focus',filter_time);
    $('#font_back').bind('focus',filter_time);
    $('#font_right').bind('focus',filter_time);

    function filter_time(e){  
        var target = $(e.currentTarget);
        var view = target.attr('data-view');
        var target_val = target.val();
        var time = setInterval(function(){
            target_val = check_input_val(target,target_val);
            target.val(target_val);
        }, 200);

        target.bind('blur',function(){  
            clearInterval(time); 
            target.val(target_val);
            $('#text_'+view).html(target_val);
        });  
    };  

    function check_input_val(target,current_val){
        var val = target.val();
        if (val != current_val){
            var len = val.length;
            if (len >= 9) {
                val = val.substring(0, 9);
            }
            return val;
        }else{
            return current_val;
        }
    } 

    //切換文字國旗
    $('#toggle_left_font').change(function(){
        var val = $(this).val();
        switch(val) {
            case 'text':
                $('#icon_left').addClass('is-hidden');
                $('#text_left_wrap').removeClass('is-hidden');
                $('#font_left_wrap').removeClass('is-hidden');
                $('#text_left').html('HOWARD');
                $('#font_left').val('HOWARD');
                break;
            case 'icon':
                $('#icon_left').removeClass('is-hidden');
                $('#text_left_wrap').addClass('is-hidden');
                $('#font_left_wrap').addClass('is-hidden');
                $('#text_left').html('');
                $('#font_left').val('');
                break;
            default:
                $('#icon_left').addClass('is-hidden');
                $('#text_left_wrap').addClass('is-hidden');
                $('#font_left_wrap').addClass('is-hidden');
                $('#text_left').html('');
                $('#font_left').val('');
        }
    });
    $('#toggle_right_font').change(function(){
        var val = $(this).val();
        switch(val) {
            case 'text':
                $('#icon_right').addClass('is-hidden');
                $('#text_right_wrap').removeClass('is-hidden');
                $('#font_right_wrap').removeClass('is-hidden');
                $('#text_right').html('HOWARD');
                $('#font_right').val('HOWARD');
                break;
            case 'icon':
                $('#icon_right').removeClass('is-hidden');
                $('#text_right_wrap').addClass('is-hidden');
                $('#font_right_wrap').addClass('is-hidden');
                $('#text_right').html('');
                $('#font_right').val('');
                break;
            default:
                $('#icon_right').addClass('is-hidden');
                $('#text_right_wrap').addClass('is-hidden');
                $('#font_right_wrap').addClass('is-hidden');
                $('#text_right').html('');
                $('#font_right').val('');
        }
    });

	//設定樣式
	$('#style_toggle .style-item').click(function(){
        $('#preview_img').attr('data-style',$(this).attr('data-value'));
        $(this).parent().children().removeClass('is-acted');
        $(this).addClass('is-acted');
        setPdImg();
	});

	$('#size_toggle .style-item').click(function(){
        $('#preview_img').attr('data-size',$(this).attr('data-value'));
		$(this).parent().children().removeClass('is-acted');
		$(this).addClass('is-acted');
	});

    function setPdImg(){
        var img_url = '../img/pd/runfor/';
        var style = $('#preview_img').attr('data-style');
        var color = $('#preview_img').attr('data-color');
        for (i = 1; i<total_pos+1; i++) {
            $('#pos_'+i+' .pd-img').css('background-image','url('+img_url+style+i+'_'+color+'.png)');
        }
    }

    function map_style(val){
        switch(val) {
            case 'text':
                return '文字';
                break;
            case 'icon':
                return '圖案';
                break;
            case 'none':
                return '無樣式';
                break;
        }

    }

    $('#submit').click(function(){
            $('#save_mask').removeClass('is-hidden');

    		var now_pos = 1;

    		var set_view = setInterval(function(){
    			if(now_pos<total_pos+1){
    				$('.preview-pos').removeClass('is-acted');
    				$('#pos_'+now_pos).addClass('is-acted');

    				html2canvas($("#pos_"+now_pos)[0]).then(function(canvas){
    					design_img['pos'+now_pos] = canvas.toDataURL("image/png");
    					now_pos = now_pos+1;
    				});
    			}else{
                    var color = $('#preview_img').attr('data-color');
    				var style = $('#preview_img').attr('data-style');
                    switch(style) {
                        case 'b':
                            style = '男款'
                            break;
                        case 'g':
                            style = '女款'
                            break;
                    }
                    var size = $('#preview_img').attr('data-size');
                    var text_front = $('#font_front').val();
                    var text_back = $('#font_back').val();
                    var left_style_val = $('#toggle_left_font').val();
                    var text_right = "";
                    var text_left = "";
                    if(left_style_val == 'text'){
                        design_img['text_left'] = $('#font_left').val();
                        text_left = design_img['text_left'];
                    }
                    left_style = map_style(left_style_val);

                    var right_style_val = $('#toggle_right_font').val();
                    if(right_style_val == 'text'){
                        design_img['text_right'] = $('#font_right').val();
                        text_right = design_img['text_right'];
                    }
                    right_style = map_style(right_style_val);

                    design_img['style'] = style;
                    design_img['color'] = color;
                    design_img['size'] = size;
                    design_img['text_front'] = text_front;
                    design_img['text_back'] = text_back;
                    design_img['left_style'] = left_style;
                    design_img['right_style'] = right_style;

    				clearInterval(set_view);
    				console.log(design_img);
                    $('#save_mask').addClass('is-hidden');

    				// $("<img />", {src: design_img['pos1']}).appendTo($('#test_img'));
    				// $("<img />", {src: design_img['pos2']}).appendTo($('#test_img'));
    				// $("<img />", {src: design_img['pos3']}).appendTo($('#test_img'));
    				// $("<img />", {src: design_img['pos4']}).appendTo($('#test_img'));

                    $('#checkout_size').val(size);
                    $('#checkout_color').val(color);
                    $('#checkout_style').val(style);
                    $('#checkout_left_style').val(left_style);
                    $('#checkout_right_style').val(right_style);
                    // $('#checkout_icon_flag').val(icon_flag);
                    $('#checkout_text_back').val(text_back);
                    if (right_style_val == 'text') {
                        $('#checkout_text_right').val(text_right);
                    }
                    if (left_style_val == 'text') {
                        $('#checkout_text_left').val(text_left);
                    }
                    $('#checkout_text_front').val(text_front);

                    $('#checkout_pos1').val(design_img['pos1']);
                    $('#checkout_pos2').val(design_img['pos2']);
                    $('#checkout_pos3').val(design_img['pos3']);
                    $('#checkout_pos4').val(design_img['pos4']);

                    $("#checkout").submit();

                    design_img = {};
    			}
    		}, 1000);
    });

});