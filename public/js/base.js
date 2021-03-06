$(document).ready(function () {
    //模态框
    var modal = $('#modal');
    $('#modalClose').add('#mask').on('click', function () {
        modal.hide();
    });
    //返回到上一页
    $('.headBack').on('click', function (e) {
        e.preventDefault();
        history.back();
    });
    function deal(qty, id) {
        $.post('/editcart', 
            {
                'id': id, 
                'qty': qty
            }, 
            function (data) {return console.log(data);}
        );   
    }
    //添加购物车
    (function(){
        var items = $('#product');
        if (!items.length) return;
        var need = $('span.needPrice').text()*1, //起送金额
            delivery = $('.delivery');           //起送按钮
        $('span.del').on('click', function () {
            var ts = $(this),
                number = ts.siblings('span.number'),
                num = number.text()*1,
                change = ts.siblings('span.price').text().substring(1)*1;
            if (!num) return;
            deal(num - 1, $(this).parent().attr('id'));
            number.text(num - 1);
            need += change;
        });
        $('span.price').on('click', function () {
            var ts = $(this),
                number = ts.siblings('span.number'),
                num = number.text()*1,
                change = ts.text().substring(1)*1;
            deal(num + 1, $(this).parent().attr('id'));
            number.text(num + 1);
            need -= change;
        });
    }());
    //购物车页面
    (function () {
        var cart = $('#cart');
        if (!cart.length) return;
        var items = $('#list .order'),
            rest = items.find('strong.liu'),
            num  = items.find('span.number');
        items.find('span.delNum').on('click', function () {
            var number = $(this).siblings('span.number');
            var num = number.text()*1;
            var idx = items.find('span.delNum').index(this);
            if (!num) return;
            number.text(num - 1);
            $('input[name="items[' + idx +'][qty]"').val(num - 1);
            deal(num - 1, $(this).parent().attr('id'));
        });
        items.find('span.price').on('click', function () {
            var number = $(this).siblings('span.number');
            var num = number.text()*1;
            var idx = items.find('span.price').index(this);
            if (num + 1 > rest.eq(idx).text()*1) return;
            number.text(num + 1);
            $('input[name="items[' + idx +'][qty]"').val(num + 1);
            deal(num + 1, $(this).parent().attr('id'));      
        });

        $('#now').click(function () {
            $('input[name="date"]').val('');
            $('input[name="today"]').val('true');
            $('form').eq(0).attr('method', 'GET');
            $('form').eq(0).submit();
        });
        //确认订单
        $('#sub').on('click', function (e) {
            e.preventDefault();
            $('form').eq(0).submit();
        });
        $('li.selectTime').on('click', function () {
            var offset = $(this).offset();
            $('#timepicker').removeClass('hidden');
            $('#time').datetimepicker('show')
        });
        $('#time').change(function () {
            $('input[name="today"]').val('false');
            $('form').eq(0).attr('method', 'GET');
            $('form').eq(0).submit();
        });
        $('#time').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            weekStart: 0,
            autoclose: 1,
            todayHighlight: 1,
            todayBtn: 1,
            startDate: new Date()
        });
    }());
    //付款页
    (function () {
        var checkorder = $('#checkorder');
        if (checkorder.length === 0) return;
        $('#payment').on('click', function () {
            var sub = $(this).find('.fr');
            var inp = $('input[name="payment"]');
            var bal = $('#balance').find('.fr');
            sub.addClass('checked');
            bal.removeClass('checked');
            inp.val('cash');
        });
        $('#balance').on('click', function () {
            var sub = $('#payment').find('.fr');
            var inp = $('input[name="payment"]');
            var bal = $(this).find('.fr');
            sub.removeClass('checked');
            bal.addClass('checked');
            inp.val('balance');
        });
        $('#subCheckOrder').on('click', function (e) {
            e.preventDefault();
            checkorder.submit();
        });
    }());
    //orderAddr 
    (function () {
        var orderAddr = $('#orderAddr');
        if (orderAddr.length === 0) return;
        $('li.addr').on('click', function () {
            var addrId = $(this).find('.address').attr('id');
            var par = $(this);
            $.post('/orderaddr', {
                'id': addrId
            }, function (data) {
                return !data['error'] ? 
                    par.find('.fr').addClass('checked')
                        .end().siblings('.addr').find('.fr').removeClass('checked') :
                    false;
            }, 'json');
        });
    }());

    //晒单
    (function () {
        var shai = $('#shai');
        if(shai.length === 0) return;
        if($('#scroll').length !== 0) $(document).scrollTop(parseInt(shai.css('height')));
 /*       wx.config({
            debug: 0, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: '', // 必填，公众号的唯一标识
            timestamp: , // 必填，生成签名的时间戳
            nonceStr: '', // 必填，生成签名的随机串
            signature: '',// 必填，签名，见附录1
            jsApiList: [] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        wx.chooseImage({
            success: function (res) {
                var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                console.log(localIds);
            }
        });
        wx.uploadImage({
            localId: '', // 需要上传的图片的本地ID，由chooseImage接口获得
            isShowProgressTips: 1, // 默认为1，显示进度提示
            success: function (res) {
                var serverId = res.serverId; // 返回图片的服务器端ID
            }
        });*/
        $('#img_upload').on('click', function () {
            $('#file').trigger('click');
        });
        $('#file').on('change', function () {
            var obj = $(this)[0].files[0];
            window.URL = window.URL || window.webkitURL;
            $('#before').addClass('hidden')
                .next().removeClass('hidden')
                    .children('img').attr('src', window.URL.createObjectURL(obj) );
        });
    })();
});