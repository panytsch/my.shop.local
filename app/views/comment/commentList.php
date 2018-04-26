<?php
if (empty($data[0])){
    echo "<h2>No comments :)</h2>";
}
else{
foreach ($data as $key => $val) {
    if ($key === 'buttons') {continue;}
    ?>
    <div class="container">
        <h3><?=$val['comment']?></h3>
        <h5><?=$val['date']?></h5>
        <h4><?=$val['rate']?></h4>
    </div>
<?php }}?>
<ul class="pagination">
    <?
    foreach ($data['buttons'] as $val){?>
        <li class="<?php if (!$val->isActive){echo 'active';} ?>">
            <a href="/user/comments/?page=<?=$val->page?>&userId=<?=$data[0]['user_id']?>"><?=$val->text?></a></li>
    <?php }?>
</ul>