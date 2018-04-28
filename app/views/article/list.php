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

<?php
if (\helpers\SessionHelper::getFlash('user', false)){ ?>
<form action="/article/addcomment" method="post">
    <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Enter your comment here"></textarea>
    </div>
    <input type="hidden" value="<?=$data['id']?>" name="refer">
    <button type="submit">Send</button>
</form>
<?php } ?>

<?php
foreach ($data['comments'] as $comment) {
    if (!$comment['verified'] && $data['category'] === 'Politic') continue;
    ?>
    <div class="media">
        <div class="media-left media-top">
            <img src="/public/upload/img_avatar1.png" class="media-object" style="width:80px">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=$comment['email']?></h4>
            <p><?=$comment['comment']?></p>
            <small><?=$comment['date']?></small>
            <form action="/article/vote" method="post">
                <input type="hidden" value="1" name="action">
                <input type="hidden" value="<?=$comment['id']?>" name="id">
                <input type="hidden" value="/article/news/?id=<?=$data['id']?>" name="refer">
                <button class="btn btn-default" type="submit">Up</button>
            </form>
            <span><?=$comment['rate']?></span>
            <form action="/article/vote" method="post">
                <input type="hidden" value="0" name="action">
                <input type="hidden" value="<?=$comment['id']?>" name="id">
                <input type="hidden" value="/article/news/?id=<?=$data['id']?>" name="refer">
                <button class="btn btn-default" type="submit">Down</button>
            </form>
            </form>
        </div>
    </div>
    <hr>
<?php } ?>