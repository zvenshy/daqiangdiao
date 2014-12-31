$(document).ready(function () {
    //file upload
    (function () {
        if ($('input.fileupload').length === 0) return;
        var template = '<tr class="template-upload fade in">'+
            '<td>'+
                '<span class="preview"><canvas width="46" height="80"></canvas></span>'+
            '</td>'+
            '<td>'+
               ' <p class="name">${fileName_}</p>  '+          
            '</td>'+
            '<td>'+
            '    <button class="btn btn-primary start">'+
            '       <span>Start</span>'+
            '    </button>'+
            '    <button class="btn btn-warning cancel">'+
            '       <span>Cancel</span>'+
            '    </button>        '+    
            '</td>'+
        '</tr>';
        var url = 'http://localhost:8080/myfileupload/upload';
        var currentData = {};
        $('input.fileupload').fileupload({autoUpload: true,
            url: url,
            dataType: 'json',
            add: function (e, data) {
               var templateImpl = $.tmpl(template,
                    {
                        "fileName_":data.files[0].name,
                        "fileSize_":(data.files[0].size/1000).toFixed(2)
                    }).appendTo( ".files:eq(" + $('input.fileupload').index(this) + ")" );
               data.content = templateImpl;
               $(".start", templateImpl).click(function () {
                    currentData.bar = templateImpl;             
                    $('<p/>').text('Uploading...').addClass("uploading").replaceAll($(this));
                    data.submit();//上传文件
               });
               $(".cancel", templateImpl).click(function () {
                    $('<p/>').text('cancel...').replaceAll($(this));
                    data.abort();//取消上传
                    $(templateImpl).remove();
               });
            },

            done: function (e, data) {
                $(".uploading", data.content).text('上传成功');
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('.bar', currentData.bar).css(
                    'width',
                    progress + '%'
                );
            }
        });
    }());
    
    //change
    (function () {
        var tbody = $('#score tbody').eq(0);
        if (tbody.length === 0) return;
        tbody.on('click', 'input.change', function (e) {
            e.preventDefault();
            var par = $(this).parent().parent();
            par.find('input').removeAttr('disabled');
            par.prev().find('input').removeAttr('disabled');
            $(this).addClass('hidden').next().removeClass('hidden');
            par.find('input.del').addClass('hidden').next().removeClass('hidden');
        });

        tbody.on('click', 'input.del', function (e) {
            e.preventDefault();
            var par = $(this).parent().parent();
            var id = par.attr('id');
            console.log(id);
            if (!id) {
                return par.prev().remove()
                    .end().remove()
            }
    /*        $.ajax({
                url: '' + id,
                type: 'DELETE'
            }).done(function (data) {
                $('#' + id).remove();
            });*/
        });

        tbody.on('click', 'input.save', function (e) {
            e.preventDefault();
            var par = $(this).parent().parent();
            par.find('input').attr('disabled', 'disabled');
            par.prev().find('input').attr('disabled', 'disabled');
            $(this).addClass('hidden').prev().removeClass('hidden').removeAttr('disabled');
            par.find('input.chanle').addClass('hidden').prev().removeClass('hidden').removeAttr('disabled');
            $.ajax({
                url: '',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'id': par.attr('id'),
                    'price': $('input[name="price"').val(),
                    'reservation_day': $('input[name="reservation_day"').val(),
                    'inventory_per_day': $('input[name="inventory_per_day"').val(),
                    'ignore_inventory': true,
                    'title': $('input[name="title"').val(),
                    'description': $('input[name="description"').val(),
                    'content': $('input[name="content"'),
                    'rank': $('input[name="rank"').val()
                }
            }).done(function (data) {
                return;
            });
        });

        tbody.on('click', 'input.chanle', function (e) {
            e.preventDefault();
            var par = $(this).parent().parent();
            par.find('input').attr('disabled', 'disabled');
            par.prev().find('input').attr('disabled', 'disabled');
            $(this).addClass('hidden')
                .prev().removeClass('hidden').removeAttr('disabled');
            par.find('input.save').addClass('hidden')
                .prev().removeClass('hidden').removeAttr('disabled');
        });

        $('#new').click(function () {
            tbody.find('tr:eq(1)').clone(true).prependTo(tbody);
            tbody.find('tr:eq(1)').clone(true).prependTo(tbody);
            tbody.find('tr:eq(0) input[type="text"]').val('');
            tbody.find('tr:eq(1)').removeAttr('id');
        });
    }());
    
    //订单浏览
    (function () {
        var newOrder = $('div.newOrder');
        if (newOrder.length === 0) return;
/*        var tmpl = '<li>' + 
                '<ul class="unstyled fl">' + 
                    '<li><span class="fl">收件人</span><span class="fr">' + ${name} + '</span></li>' + 
                    '<li><span class="fl">电话</span><span class="fr">' + ${phoneNumber} + '</span></li>' +
                    '<li><span class="fl">地址</span><span class="fr">' + ${address} + '</span></li>' +
                    '<li><span class="fl">下单日期</span><span class="fr"'> + ${time} + '</span></li>' +
                    '<li><span class="fl">送达时间</span><span class="fr">' + ${get_time} + '</span></li>' +
                '</ul>' +
                '<ul class="unstyled fr">' +
                    '<li><span class="fl">' + ${foodName} + '</span><span>' + ${order} + '</span><span class="fr">' + ${price} + '</span></li>' + 
                    '<li><span class="fl">总价</span><span class="fr">' + ${total_price} + '</span></li>' + 
                    '<li><span class="fl">在线支付</span><span class="fr">' + ${tof} + '</span></li>' +
                '</ul>' + 
                '<div class="btn-group">' +
                    '<button class="btn btn-danger cOrder" type="button">关闭</button>' +
                    '<button class="btn btn-primary rOrder" type="button">接受</button>' +
                '</div>' +
            '</li>';
*/        $('.cOrder').on('click', function () {

        });
        $('.rOrder').on('click', function () {

        });
    }());

});

