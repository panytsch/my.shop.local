<a href="/admin/createarticle">
    <button type="button" class="btn btn-success">Create new Article</button>
</a>
<br>
<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Small Desc</th>
        <th>Tags</th>
        <th>Pic</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $val) {
        if ($key === 'buttons') continue;
        ?>
        <tr>
            <td><?=$val['id']?></td>
            <td><?=$val['title']?></td>
            <td><?=$val['small_description']?></td>
            <td><?=$val['tag1']?></td>
            <td><img src="/public/upload/<?=$val['img']?>" alt="Nothing" width="100px;"></td>
            <td>
                <a href="/admin/changearticle/?id=<?=$val['id']?>">
                <button type="button" class="btn">Change</button></a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>
<ul class="pagination">
    <?
    foreach ($data['buttons'] as $val){?>
            <li class="<?php if (!$val->isActive){echo 'active';} ?>"><a href="/admin/articlelist/?page=<?=$val->page?>"><?=$val->text?></a></li>
    <?php }?>
</ul>