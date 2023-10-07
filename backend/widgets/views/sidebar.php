<?php
   $uri = $_SERVER['REQUEST_URI'];
   $arr = explode('/' , $uri);
   $action = $arr[1];
?>
<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="<?=\yii\helpers\Url::home()?>"> <?=  \yii\helpers\Html::img('img/logo1.png');?>
        </div>
    </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/user'])?>" class="nav-link"><i class="fas fa-share-alt"></i><span>Foydalanuvchi</span></a>
            </li>

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/news'])?>" class="nav-link"><i class="fas fa-rectangle-ad"></i><span>Yangiliklar</span></a>
            </li>

            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/tag'])?>" class="nav-link"><i class="fas fa-comment"></i><span>taglar</span></a>
            </li>
            <li class="nav-item">
                <a href="<?=\yii\helpers\Url::to(['/category'])?>" class="nav-link"><i class="fas fa-comment"></i><span>Kategoriyalar</span></a>
            </li>
            

        </ul>
    </div>
</div>