<a href="/admin/createcategory">
    <button type="button" class="btn btn-success">Create new Article</button>
</a>
<br>
<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key => $val) {?>
        <tr>
            <td><?=$val['id']?></td>
            <td><?=$val['name']?></td>
        </tr>
    <?php }?>
    </tbody>
</table>