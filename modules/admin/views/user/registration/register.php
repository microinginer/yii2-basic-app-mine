<?php

use app\widgets\social\SocialConnect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-box">
    <div class="register-logo">
        <a href="<?= \yii\helpers\Url::to(['/']) ?>"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg"><?= Yii::t('app', 'Register a new membership') ?></p>

        <?php $form = ActiveForm::begin([
            'id' => 'registration-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
        ]); ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'username') ?>

        <?php if ($module->enableGeneratingPassword == false): ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        <?php endif ?>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <p>&nbsp;</p>
        <div align="center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </div>
    </div>
</div>
