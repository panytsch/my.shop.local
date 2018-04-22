<?php foreach ($categoryArray as $category => $item) {?>
    <div class="news">
        <h3><a href="/article/categories?category=<?=$category?>" class="category__a"><?=$category?></a></h3>
        <?php foreach ($item as $article) {?>
            <div class="news__title"><a href="/article/news/?id=<?=$article['id']?>" class="new__a"><?=$article['title']?></a></div>
        <?php } ?>
    </div>
<?php } ?>