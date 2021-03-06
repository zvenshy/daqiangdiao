<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="rcss">
    <meta name="description" content="商店demo">
    <meta name="author" content="zvenshy@gmail.com">
    <title>收货地址 - 大腔调</title>
<link rel="stylesheet" href="/css/myOrder.css">
</head>
<body class="sme">
    <div id="content">
        <div class="content-wrap">
            <div class="main">
                <div class="wrap">
                     <div id="list">
                        <ul id="orderAddr">
                            <a href="address?redirect_to=/orderaddr"><li id="addAddress" class="mar10">
                                <span href="#"></span>
                            </li></a>
                            <?php foreach($addressees as $addressee): ?>
                            <li class="mar10 addr">
                                <span class="fl">
                                    <p id="<?php echo $addressee->id; ?>" class="address"><?php echo $addressee->address; ?></p>
                                    <span class="name"><?php echo $addressee->name; ?></span>，<span class="phoneNumber"><?php echo $addressee->phone; ?></span>
                                </span>
                                <span class="fr <?php echo $addressee->id==$checked ? 'checked ' : ''; ?> addressChecked"></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="tips fr"><i></i>请确认无误后保存</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="wrap">
            <a class="headBack fl" href="/checkorder">
            </a>
            <h1>收货地址</h1>
            <a class="toUser fr" href="/profile"></a>
        </div>
    </header>
    <div id="modal" class="hidden">
        <div id="errorBox">
            这里是错误提示这里是错误提示这里是错误提示
            <div id="modalClose">&times</div>
        </div>

        <div id="mask"></div>
    </div>
    <script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/base.js"></script>
</body>
</html>
