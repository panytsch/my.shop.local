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
<br><br>

<form class="form-inline" action="/admin/createnewcategory" method="post">
    <div class="form-group">
        <label for="pwd">Name:</label>
        <input type="text" class="form-control" id="pwd" name="category">
    </div>
    <button type="submit" class="btn btn-default">Create Category</button>
</form>