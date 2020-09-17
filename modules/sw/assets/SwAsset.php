<?php

namespace app\modules\sw\assets;

use yii\web\AssetBundle;

class SwAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'theme/sw/global_assets/css/icons/icomoon/styles.css',
        'theme/sw/assets/css/bootstrap.min.css',
        'theme/sw/assets/css/core.min.css',
        'theme/sw/assets/css/components.css',
        'theme/sw/assets/css/colors.min.css',
    ];
    
    public $js = [
        // 'theme/sw/global_assets/js/core/libraries/jquery.min.js',
        'theme/sw/global_assets/js/plugins/loaders/pace.min.js',
        'theme/sw/global_assets/js/core/libraries/bootstrap.min.js',
        'theme/sw/global_assets/js/plugins/loaders/blockui.min.js',
        'theme/sw/global_assets/js/plugins/editors/ace/ace.js',
        'theme/sw/global_assets/js/plugins/visualization/d3/d3.min.js',
        'theme/sw/global_assets/js/plugins/visualization/d3/d3_tooltip.js',
        'theme/sw/global_assets/js/plugins/forms/styling/switchery.min.js',
        'theme/sw/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js',
        'theme/sw/global_assets/js/plugins/ui/moment/moment.min.js',
        'theme/sw/global_assets/js/plugins/pickers/daterangepicker.js',
        'theme/sw/global_assets/js/plugins/forms/styling/uniform.min.js',
        'theme/sw/global_assets/js/demo_pages/form_inputs.js',
        'theme/sw/plugin/ckeditor/ckeditor.js',
        'theme/sw/assets/js/app.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
