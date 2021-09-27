<?php

namespace Da\User\Helper;

use yii\helpers\FileHelper;

/**
 * Helper class to use the [umpirsky/locale-list](https://github.com/umpirsky/locale-list) library
 */
class LanguageHelper
{
    const LIBRARY_SEPARATOR = '_';
    const YII_SEPARATOR = '-';

    /**
     * Returns a list of code => language to be used in dropdowns fields.
     * @return array
     */
    public static function list()
    {
        $langCode = static::getLibraryCode(\Yii::$app->language);
        $langFolder = static::findFolder(\Yii::getAlias("@vendor/umpirsky/locale-list/data"), $langCode);
        $localesFile = $langFolder.'/locales.php';
        if(!file_exists($localesFile)) {
            return [];
        }
        return require_once $localesFile;
    }

    /**
     * Returns the language code formatted as per standard of the library
     * @param string $code
     * @return string
     */
    public static function getLibraryCode($code)
    {
        return str_replace(static::YII_SEPARATOR, static::LIBRARY_SEPARATOR, $code);
    }

    /**
     * Returns the language code formatted as per standard of Yii2
     * @param string $code
     * @return string
     */
    public static function getYiiCode($code)
    {
        return str_replace(static::LIBRARY_SEPARATOR, static::YII_SEPARATOR, $code);
    }

    /**
     * The code is expected in the library standard
     * @param string $baseDir
     * @param string $code
     * @return string
     */
    protected static function findFolder($baseDir, $code)
    {
        $path = "$baseDir/$code";
        if(file_exists($path)) {
            return $path;
        }
        return "$baseDir/".explode(static::LIBRARY_SEPARATOR, $code)[0];
    }
}
