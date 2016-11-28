<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
if (Yii::$app->session->hasFlash('success')){
    echo Yii::$app->session->getFlash('success');
}
?>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'nazva'); ?>
<?php echo $form->field($model, 'identkod'); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'country'); ?>
<?php echo $form->field($model, 'year'); ?>
<?php echo $form->field($model, 'url'); ?>
<?php echo $form->field($model, 'director'); ?>
<?php echo $form->field($model, 'directorPhoto'); ?>
<?php echo $form->field($model, 'verificationCode'); ?>

<?php echo Html::submitButton('Submit', ['class' => 'btn btn-success']); ?>

<?php ActiveForm::end(); ?>
