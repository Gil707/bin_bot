<?php
/**
 * Created by PhpStorm.
 * User: Gil
 * Date: 02-Feb-18
 * Time: 15:42
 */


use yii\helpers\Html;


?>

<div class="trade-form">

    <?= Html::beginForm(['trade/placeorder'], 'post', ['enctype' => 'multipart/form-data']); ?>

    <div class="form-group">
        <h2>Buy/Sell BTC</h2>
        <?= Html::label('Method', null, ['class' => 'label label-default']); ?>
        <?= Html::dropDownList('side', null, [0 => 'Buy', 1 => 'Sell'], ['class' => 'form-control', 'id' => 'method_typ']); ?>
        <br>
        <?= Html::label('Price (USDT)', null, ['class' => 'label label-default']); ?>
        <?= Html::textInput('price', null, ['class' => 'form-control', 'id' => 'sellinput']); ?>
        <br>
        <?= Html::label('Amount (BTC)', null, ['class' => 'label label-default']); ?>
        <?= Html::textInput('amount', null, ['class' => 'form-control', 'id' => 'price_sellinput']); ?>
        <br>
        <?= Html::submitButton('Place', ['class' => 'btn btn-primary']) ?>
    </div>
    <?= Html::tag('h4', null, ['id' => 'sell_result']) ?>

    <?= Html::endForm(); ?>

</div>