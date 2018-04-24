<div class="Article">
    <h1><?=$data['title']?></h1>
        <img src="/public/upload/<?=$data['img']?>" alt="" width="300px">
    <h3><?=$data['small_description']?></h3>
    <p><?=$data['description']?></p>
    <p><?=$data['date']?></p>
<!--    <p>--><?//=$data['category']?><!--</p>-->
    <p>
        <?php foreach (mb_split('\s', $data['tag1']) as $val){ ?>
            <a href="/article/taglist?tag=<?=$val?>"><?=$val?></a>
        <?php }?>
    </p>
    <p><?=$data['views']?></p>
    <p>Right now watch except you: <span id="randomField">0</span></p>
</div>