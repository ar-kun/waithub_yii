<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="register">

  <?php $form = ActiveForm::begin(); ?>


  <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
  </div>
  <?php ActiveForm::end(); ?>

</div><!-- register -->