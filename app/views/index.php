<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="rcss">
    <meta name="description" content="大腔调">
    <meta name="author" content="zvenshy@gmail.com">
    <title>首页 - 大腔调</title>
<link rel="stylesheet" href="/css/style.css">
</head>
<body class="sme">
    <div id="content">
        <div class="content-wrap">
            <div class="main">
                <div class="wrap">
                    <div id="banner">
                        <a href="/product/<?php echo $products[0]->id; ?>"><img src="<?php echo $products[0]->one_image_url(); ?>" alt=""></a>
                        <h2><?php echo $products[0]->title; ?></h2>
                    </div>
                    <!-- 列表 -->
                    <div id="content-list">

                        <div class="list-header overft">
                            <h2 class="fl">美好菜单</h2>
                            <span class="fr"><a href="/list">查看更多</a></span>
                        </div>
                        <div id="manyPic">
                                <div class="fl">
                                    <a href="/product/<?php echo $products[1]->id; ?>">
                                        <img src="<?php echo $products[1]->one_image_url(); ?>" alt="">
                                    </a>
                                    <a href="/product/<?php echo $products[1]->id; ?>"><span class="foodTitle"><?php echo $products[1]->title;?></span></a>
                                </div>
                            <div class="fr">
                                <a href="/product/<?php echo $products[2]->id; ?>"><img src="<?php echo $products[2]->one_image_url(); ?>" alt=""></a>
                                <a href="/product/<?php echo $products[3]->id; ?>"><img src="<?php echo $products[3]->one_image_url(); ?>" alt=""></a>
                            </div>
                        </div>

                        <div class="list-header overft">
                            <h2 class="fl">推荐</h2>
                            <span class="fr"><a href="/list">查看更多</a></span>
                        </div>
                        <ul>
                            <a href="/product/<?php echo $products[4]->id; ?>"><li>
                                <dl>
                                    <dt><img src="<?php echo $products[4]->one_image_url(); ?>" alt=""></dt>
                                    <dd class="overft">
                                        <div class="dish">
                                            <h3><?php echo $products[4]->title; ?></h3>
                                            <div class="advance">
                                                <?php if($products[4]->needReservation()): ?>
                                                <span>请提前<?php echo $products[4]->chineseReservation(); ?>天预订</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                            </li></a>
                            <a href="/product/<?php echo $products[5]->id; ?>"><li>
                                <dl>
                                    <dt><img src="<?php echo $products[5]->one_image_url(); ?>" alt=""></dt>
                                    <dd class="overft">
                                        <div class="dish">
                                            <h3><?php echo $products[5]->title; ?></h3>
                                            <div class="advance">
                                                <?php if($products[5]->needReservation()): ?>
                                                <span>请提前<?php echo $products[5]->chineseReservation(); ?>天预订</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </dd>
                                </dl>
                            </li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="foot-fixed">
        <a class="wrap" href="/cart">
            <span class="get fl"></span>
            <span class="delivery fr">￥<?php echo $minimum_amount; ?>元 起送</span>
        </a>
    </footer>
    <header>
        <div class="wrap">
            <a class="set fl" href="/list">
                <p></p>
                <p></p>
                <p></p>
            </a>
            <h1>大腔调</h1>
            <a class="toUser fr" href="/profile"></a>
        </div>
    </header>
</body>
</html>
