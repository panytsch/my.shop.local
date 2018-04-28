<form action="/admin/changeComment" method="post">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <div class="form-group">
        <label for="desc">Text:</label>
        <textarea class="form-control" rows="10" id="desc" name="comment" required><?=$data['comment']?></textarea>
    </div>
        <div class="form-group">
        <label for="img">Verified:</label>
        <input type="checkbox" class="" id="img" name="verified" <?php
        if ($data['verified']){
            echo "checked";
        }
        ?>>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>