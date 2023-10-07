<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/animate.css',
        'css/bootstrap.css',
        'css/bootstrap.css.map',
        'css/media_query.css',
        'css/owl.carousel.css',
        'css/owl.theme.default.css',
        'css/style_1.css',
        'css/style_1.css.map'
    ];
    public $js = [
        'js/bootstrap.js',
        'js/jquery.steller.min.js',
        'js/jquery.waypoints.min.js',
        'js/main.js',
        'js/modernizr-3.5.0.min.js',
        'js/owl.carousel.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
