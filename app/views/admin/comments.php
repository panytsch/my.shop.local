<table class="table">
    <thead>
    <tr>
        <th>Comment</th>
        <th>Action</th>
        <th>Verified</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $val) { ?>
        <tr <?php if (!$val['verified']){echo 'style="background-color: red"';}?>>
            <td><?=$val['comment']?></td>
            <td>
                <a href="/admin/editComment/?id=<?=$val['id']?>">
                    <button class="btn btn-warning" type="button">Edit</button>
                </a>
                <a href="/admin/deleteComment/?id=<?=$val['id']?>">
                    <button class="btn btn-danger" type="button">Delete</button>
                </a>
            </td>
            <td>
                <?php
                if ($val['verified']){
                    echo "Yes";
                } else {
                    echo "No";
                }
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>