<h2>Last News</h2>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

        <div class="item active">
            <img src="/public/upload/<?=$lastestArticles[0]['img']?>" style="width:100%;">
            <div class="carousel-caption">
                <h3><a href="/article/news/?id=<?=$lastestArticles[0]['id']?>"><?=$lastestArticles[0]['title']?></a></h3>
                <p><?=$lastestArticles[0]['small_description']?></p>
            </div>
        </div>

        <div class="item">
            <img src="/public/upload/<?=$lastestArticles[1]['img']?>" style="width:100%;">
            <div class="carousel-caption">
                <h3><a href="/article/news/?id=<?=$lastestArticles[1]['id']?>"><?=$lastestArticles[1]['title']?></a></h3>
                <p><?=$lastestArticles[1]['small_description']?></p>
            </div>
        </div>

        <div class="item">
            <img src="/public/upload/<?=$lastestArticles[2]['img']?>" style="width:100%;">
            <div class="carousel-caption">
                <h3><a href="/article/news/?id=<?=$lastestArticles[2]['id']?>"><?=$lastestArticles[2]['title']?></a></h3>
                <p><?=$lastestArticles[2]['small_description']?></p>
            </div>
        </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php foreach ($categoryArray as $category => $item) {?>
    <div class="news">
        <h3><a href="/article/categories?category=<?=$category?>" class="category__a"><?=$category?></a></h3>
        <?php foreach ($item as $article) {?>
            <div class="news__title"><a href="/article/news/?id=<?=$article['id']?>" class="new__a"><?=$article['title']?></a></div>
        <?php } ?>
    </div>
<?php } ?>

<br>
<h2>Top Users</h2>
<br>

<?php
foreach ($topUsers as $user) { ?>
    <div class="">
        <h3><a href="/user/comments/?userId=<?=$user['id']?>"><?=$user['email']?></a></h3>
        <h4>Count of comments: <?=$user['count']?></h4>
    </div>
<?php } ?>

<br>
<h2>Top Themes</h2>
<br>

<?php foreach ($themes as $theme) {?>
    <div class="news">
        <h3><a href="/article/categories?category=<?=$theme['category']?>" class="category__a"><?=$theme['category']?></a></h3>
        <h4>Count of comments: <?=$theme['count']?></h4>
    </div>
<?php } ?>