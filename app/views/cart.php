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
    <title>商店demo</title>
<link rel="stylesheet" href="css/checkOrder.css">
</head>
<body class="sme">
    <div id="content">
        <div class="content-wrap">
            <div class="main">
                <div class="wrap">
                    
                    <div id="list">
                        <ul>

                            <li class="mar10">
                                <span class="fl">立即送达</span>
                                <span class="fr <?php echo $today ? 'checked' : ''; ?>"></span>
                            </li>
                            <li class="mar10">
                                <span class="fl">选择时间</span>
                                <span class="fr more"></span>   
                            </li>

                            <?php foreach($cart as $item): ?>
                            <li class="mar10">
                                <div class="fl">
                                    <img src="<?php echo $item->image; ?>" alt="">
                                    <div class="foodName">
                                        <h3><?php echo $item->title; ?></h3>
                                        <span class="ignore">还剩<?php echo $item->product->inventory_in($date); ?>份</span>   
                                    </div>
                                </div>
                                <div class="fr">
                                    <div class="priceBox">
                                        <span class="delNum">—</span>
                                        <span class="number"><?php echo $item->qty; ?></span>
                                        <span class="price">￥<?php echo $item->product->price; ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer class="foot-fixed">
        <div class="wrap">
            <input type="submit" value="确认订单">
        </div>
    </footer>
    <header>
        <div class="wrap">
            <span class="set fl">
                <p></p>
                <p></p>
                <p></p>
            </span>
            <h1>订单</h1>
            <span class="toUser fr"></span>
        </div>
    </header>
</body>
</html>