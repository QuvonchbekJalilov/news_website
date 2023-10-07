<?php

$category = \common\models\Category::find()->all();

?>

<h1>Yangiliklar saytiga Hush kelibsiz!</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php foreach ($category as $new): ?>
                    <li class="nav-item">
                        <a class="nav-link" href=""><?= $new->name?></a>
                    </li>
                <?php endforeach; ?>


            </ul>

        </div>
    </div>
</nav>