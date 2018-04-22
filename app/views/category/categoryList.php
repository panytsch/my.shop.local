<?php
foreach ($data as $key => $val) {
    if ($key === 'buttons') {continue;}
    ?>
    <div class="container">
        <a href="/article/news/?id=<?=$val['id']?>">
            <h2><?=$val['title']?></h2>
            <img class="img-responsive" src="/public/upload/<?=$val['img']?>" alt="Chania" width="360" height="345">
        </a>
    </div>
<?php }?>
<ul class="pagination">
    <?
    foreach ($data['buttons'] as $val){?>
        <li class="<?php if (!$val->isActive){echo 'active';} ?>">
            <a href="/article/categories/?page=<?=$val->page?>&category=<?=$data[0]['name']?>"><?=$val->text?></a></li>
    <?php }?>
</ul>