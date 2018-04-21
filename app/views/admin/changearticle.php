<form action="/admin/updatearticle" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$data['title']?>" required>
    </div>
    <div class="form-group">
        <label for="minidesc">Mini Description:</label>
        <textarea class="form-control" rows="5" id="minidesc" name="small_description" required><?=$data['small_description']?></textarea>
    </div>
    <div class="form-group">
        <label for="desc">Mini Description:</label>
        <textarea class="form-control" rows="10" id="desc" name="description" required><?=$data['description']?></textarea>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" required name="category">
            <?php foreach ($data['category'] as $val) { ?>
                <option><?=$val?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" required class="form-control" id="tags" name="tag1" value="<?=$data['tag1']?>">
    </div>
    <div class="form-group">
        <label for="img">IMG:</label>
        <input type="file" class="form-control" id="img" name="img" accept="image/jpeg,image/png,image/gif">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>