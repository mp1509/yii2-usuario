<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use Da\User\Module;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var \Da\User\Module      $module
 * @var \Da\User\Model\User  $user
 * @var \Da\User\Model\Token $token
 * @var bool                 $showPassword
 */

?>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= Module::t('usuario', 'Hello', [], $user) ?>,
</p>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= Module::t('usuario', 'Your account on {0} has been created', Yii::$app->name, $user) ?>.
    <?php if ($showPassword || $module->generatePasswords): ?>
        <?= Module::t('usuario', 'We have generated a password for you', [], $user) ?>:
        <strong><?= $user->password ?></strong>
    <?php endif ?>
    <?php if ($module->allowPasswordRecovery): ?>
        <?= Yii::t('usuario', 'If you haven\'t received a password, you can reset it at') ?>: <strong><?= Html::a(Html::encode(Url::to(['/user/recovery/request'], true)), Url::to(['/user/recovery/request'], true)) ?></strong>
    <?php endif ?>

</p>

<?php if ($token !== null): ?>
    <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
        <?= Module::t('usuario', 'In order to complete your registration, please click the link below', [], $user) ?>.
    </p>
    <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
        <?= Html::a(Html::encode($token->url), $token->url); ?>
    </p>
    <p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
        <?= Module::t('usuario', 'If you cannot click the link, please try pasting the text into your browser', [], $user) ?>.
    </p>
<?php endif ?>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= Yii::t('usuario', 'You received this email because someone, possibly you or someone on your behalf, have created an account at {app_name}', ['app_name' => Yii::$app->name]) ?>.
</p>
