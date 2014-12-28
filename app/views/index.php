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
<link rel="stylesheet" href="/css/style.css">
</head>
<body class="sme">
    <div id="content">
        <div class="content-wrap">
            <div class="main">
                <div class="wrap">
                    <div id="banner">
                        <img src="<?php echo $products[0]->one_image_url(); ?>" alt="">
                        <h2><?php echo $products[0]->title; ?></h2>
                    </div>
                    <!-- 列表 -->
                    <div id="content-list">

                        <div class="list-header overft">
                            <h2 class="fl">美好菜单</h2>
                            <span class="fr">查看更多</span>
                        </div>
                        <div id="manyPic">
                                <div class="fl"><img src="<?php echo $products[1]->one_image_url(); ?>" alt=""></div>
                            <div class="fr">
                                <img src="<?php echo $products[2]->one_image_url(); ?>" alt="">
                                <img src="<?php echo $products[3]->one_image_url(); ?>" alt="">
                            </div>
                        </div>

                        <div class="list-header overft">
                            <h2 class="fl">推荐</h2>
                            <span class="fr">查看更多</span>
                        </div>
                        <ul>
                            <li>
                                <dl>
                                        <dt><img src="<?php echo $products[4]->one_image_url(); ?>" alt=""></dt>
                                    <dd class="overft">
                                        <div class="dish">
                                            <h3><?php echo $products[4]->title; ?></h3>
                                            <div class="advance">
                                                <?php if($products[4]->needReservation()): ?>
                                                <span>请提前<?php echo $products[4]->chineseReservation(); ?>天订单</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                        <dt><img src="<?php echo $products[5]->one_image_url(); ?>" alt=""></dt>
                                    <dd class="overft">
                                        <div class="dish">
                                            <h3><?php echo $products[5]->title; ?></h3>
                                            <div class="advance">
                                                <?php if($products[5]->needReservation()): ?>
                                                <span>请提前<?php echo $products[5]->chineseReservation(); ?>天订单</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="foot-fixed">
        <div class="wrap">
            <span class="get fl"></span>
            <span class="delivery fr">￥<?php echo $minimum_amount; ?>元 起送</span>
        </div>
    </footer>
    <header>
        <div class="wrap">
            <span class="set fl">
                <p></p>
                <p></p>
                <p></p>
            </span>
            <h1>首页</h1>
            <span class="toUser fr"></span>
        </div>
    </header>
</body>
</html>
