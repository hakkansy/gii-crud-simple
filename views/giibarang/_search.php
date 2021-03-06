<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GiibarangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="giibarang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?= $form->field($model, 'nama_barang') ?>

    <?= $form->field($model, 'satuan') ?>

    <?= $form->field($model, 'id_jenis') ?>

    <?php // echo $form->field($model, 'id_supllier') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'stok') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
