<?php

use helpers\SessionHelper;

$error = SessionHelper::getFlash('error');
$success = SessionHelper::getFlash('success');

?>

<div class="container">
    <a href="">
        <h2>Image</h2>
        <img class="img-responsive" src="img_chania.jpg" alt="Chania" width="460" height="345">
    </a>
</div>
