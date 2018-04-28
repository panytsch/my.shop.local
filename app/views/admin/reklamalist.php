<table class="table">
    <thead>
    <tr>
        <th>Text</th>
        <th>Price</th>
        <th>URL</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $val) { ?>
        <tr>
            <td><?=$val['text']?></td>
            <td><?=$val['price']?></td>
            <td><?=$val['url']?></td>
            <td>
                <a href="/admin/deleteBlock/?id=<?=$val['id']?>">
                    <button class="btn btn-danger" type="button">Delete</button>
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>