<a href="/">Go to Home Page</a>
<br><br>
<form action="admin/login" method="post">
    <input type="email" placeholder="enter your email" name="email" required><br><br>
    <input type="password" placeholder="enter your password" name="password" required><br><br>
    <input type="password" placeholder="enter your password again" name="repassword" required><br><br>
    <button type="submit">Check</button>
</form>

<?php
if (\helpers\SessionHelper::getFlash('error',false)){
    echo "<h4>".\helpers\SessionHelper::getFlash('error')."</h4>";
}