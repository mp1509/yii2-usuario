<?php

namespace Da\User\Asset;

use yii\helpers\Url;
use yii\web\View;

class TimeZoneAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@user/Asset';

    public $js = [
        'js/timezone.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    /**
     * @param \yii\web\View $view
     * @return TimeZoneAsset
     */
    public static function register($view)
    {
        if(\Yii::$app->user->isGuest || !\Yii::$app->user->identity->timezone) {
            $url = Url::to(['/user/settings/set-time-zone']);
            $view->registerJs("var userTimeZone = new $.userTimeZone('$url'); userTimeZone.sendTimeZone()");
        }
        return parent::register($view);
    }
}
