<?php
if (!$articleList){
    echo "<h3>News with this tag not found</h3>";
    return;
}

foreach ($articleList as $val){ ?>
    <h3>
        <a href="/article/news/?id=<?=$val['id']?>">
            <?=$val['title']?>
        </a>
    </h3>
    <p>
        <?=$val['small_description']?>
    </p>
<?php } ?>