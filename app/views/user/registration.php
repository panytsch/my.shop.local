<form action="/user/checkreg" method="post">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-group">
        <label for="pwd">Password again:</label>
        <input type="password" class="form-control" id="pwd" name="repassword">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php
if (\helpers\SessionHelper::getFlash('error',false)){
    echo "<h4>".\helpers\SessionHelper::getFlash('error')."</h4>";
}