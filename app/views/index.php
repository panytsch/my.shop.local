<?php foreach ($categoryArray as $category => $item) {?>
    <div class="news">
        <h3><a href="" class="category__a"><?=$category?></a></h3>
        <?php foreach ($item as $article) {?>
            <div class="news__title"><a href="/article/news/?name=<?=$article?>" class="new__a"><?=$article?></a></div>
        <?php } ?>
    </div>
<?php } ?>